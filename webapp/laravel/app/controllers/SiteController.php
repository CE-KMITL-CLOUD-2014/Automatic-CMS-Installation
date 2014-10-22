<?php
class SiteController extends BaseController {
	//Azure Setting
	//static private $AZURE_PATH = "/usr/local/bin/azure";
	static private $AZURE_PATH = "HOME=/tmp/  /usr/local/bin/azure";
	static private $FTP_SUFFIX = "ftp.azurewebsites.windows.net";
	static private $FTP_USER = "cmsserver";
	static private $FTP_PW = "e7H+QJ^HV-W!PCbBbev3*w3dNDTtrqUf";
	static private $DB_HOST = "dh96f1a9t7.database.windows.net";
	static private $DB_USER = "CMS-South-Asia-Server";
	static private $DB_PW = "LazPe%Zg3MqjHVs*z4=bJX(W#-Br3eGRMg/m";
	static private $LOCATION = "Southeast Asia";
	static private $SITE_FTP = "";

	//Site creation
	public function createAction($_type=null, $_name=null, $_domain=null) {
		//check auth	
		if(Auth::check()) {
			$type = (int) $_type;
			$name = $_name;
			$domain = (int) $_domain;
			$suffix = SiteController::randomStr(6);
			$real_name = $name.'-'.$suffix;
			$site_full = $real_name.".azurewebsites.net";

			//check exist website , CMS , domain
			$site = new Site;
			$site_exist = $site->where('name', '=', $name)->count();
			$cms_exist = Cms::where('cid', '=', $type)->count();
			$domain_exist = Domain::where('did', '=', $domain)->count();
			if(!$site_exist && $cms_exist && $domain_exist) {
				$site->nf_user_uid = Auth::user()->uid;
				$site->nf_cms_cid = $type;
				$site->nf_domain_did = $domain;
				$site->name = $name;
				$site->mapping = $real_name;
				$site->status_active = 1;
				$site->date_create = date('Y-m-d H:i:s');
				$site->save();

				//Get last data for update
				$sid = $site->sid;
				$current_site = Site::findOrFail($sid);

				//Step 1 : create azure website
				$step1 = SiteController::createAzureSite($real_name);
				if($step1) {
					//update state				
					$current_site->step1 = 1;
					$current_site->save();
					echo "Step 1 : completed!</br>";
					ob_flush();
					//Step 2 : mapping domain name
					$step2 = SiteController::mappingDomain($real_name, $name, $site_full, $domain);
					if($step2) {
						//update state				
						$current_site->step2 = 1;
						$current_site->save();
						echo "Step 2 : completed!<br/>";
						ob_flush();

						//Step 3 : upload CMS from blob storage to azure website
						$step3 = SiteController::uploadScript($type, $real_name, $site_full);
						if($step3) {
							$current_site->step3 = 1;
							$current_site->save();
							echo "Step 3 : completed!<br/>";
							ob_flush();

							//Step 4 : create Azure SQL database
							$step4 = SiteController::createAzureSQL($real_name);
							if($step4) {
								$current_site->step4 = 1;
								$current_site->save();
								echo "Step 4 : completed!<br/>";
								ob_flush();

								//Step 5 : install CMS
								$step5 = SiteController::installCMS($type, $real_name,$name,$domain);
								if($step5) {
									$current_site->step5 = 1;
									$current_site->save();
									echo "Step 5 : completed!<br/>";
									ob_flush();
								} else {
									echo "Step5 : error!</br>";
								}
							} else {
								echo "Step4 : error!</br>";
							}

						} else {
							echo "Step3 : error!</br>";
						}
					} else {
						echo "Step2 : error!</br>";
					}
				} else {
					echo "Step 1 : error!<br/>";
				}
				return "Done";

			} else {
				if($site_exist)
					return "Sorry : site name '$name' has been already used";
				else if(!$cms_exist)
					return "Error : not found the CMS script";
				else if(!$domain_exist)
					return "Error : not found domain name";
				else
					return "Error : something went wrong";
			}
		} else {
			return "Error : you must login to access this section";
		}
	}

	//Step1 : create azure website
	private function createAzureSite($real_name) {
		shell_exec(SiteController::$AZURE_PATH.' site create --location "'.SiteController::$LOCATION.'" "'.$real_name.'" 2>&1');	
		ob_flush();
		$output = shell_exec(SiteController::$AZURE_PATH.' site list --json "'.$real_name.'" 2>&1');
		ob_flush();
		$site_detail = json_decode($output);	
		if(count($site_detail) > 0)  {	
			$site_uri = $site_detail[0]->uri;
			if(!empty($site_uri)) {
				SiteController::$SITE_FTP = SiteController::getFtpHost($site_uri);	
				shell_exec(SiteController::$AZURE_PATH.' site scale mode standard "'.$real_name.'" 2>&1');
				ob_flush();
				return true;
			}
		}
		return false;
	}

	//Step2 : domain mapping
	private function mappingDomain($real_name, $name, $site_full, $did) {
		$site_name = $name;
		$site_create = $real_name;		

		$domain = Domain::findOrFail($did);
		$domain_name = $domain->name;
		$domain_mapid = $domain->mapid;
		$site_new = $site_name.".".$domain_name;

		$site_ip = shell_exec('nslookup '.$site_full.' | tail -2 | head -1 | awk \'{print $2}\'');
		SiteController::MakeSubdomain_Init($domain_mapid, $site_name, $site_full, $site_ip);	
		shell_exec(SiteController::$AZURE_PATH.' site domain add "'.$site_name.'.'.$domain_name.'" "'.$site_create.'" 2>&1');
		ob_flush();
		$output = shell_exec(SiteController::$AZURE_PATH.' site domain list '.$site_create.' --json  2>&1');
		ob_flush();
		$site_mapping = json_decode($output);
		if(count($site_mapping) > 1 && ($site_mapping[0] == $site_new)) {
			return true;
		}
		return false;

	}

	//Step3 : upload CMS script
	private function uploadScript($cmstype, $real_name, $site_full) {
		$cms = Cms::findOrFail($cmstype);
		$script_name = "nfscript.zip";
		$server_cms_file = '/site/wwwroot/'.$script_name;
		$local_cms_file = $cms->url;
		$server_upzip_file = '/site/wwwroot/unzip.php';
		$local_unzip_file = 'https://nfcmsservice.blob.core.windows.net/cms-scripts/unzip.php';
		$server_file_default = '/site/wwwroot/hostingstart.html';
		$conn_id = ftp_connect(SiteController::$SITE_FTP);
		$ftp_user = $real_name.'\\';
		$ftp_user .= SiteController::$FTP_USER;
		$login_result = ftp_login($conn_id,$ftp_user,SiteController::$FTP_PW);
		// turn passive mode on
		ftp_pasv($conn_id, true);

		//Upload CMS
		if(!ftp_put($conn_id, $server_cms_file, $local_cms_file, FTP_BINARY)) {
			return false;
		}

		//Upload unzip.php
		if(!ftp_put($conn_id, $server_upzip_file, $local_unzip_file, FTP_BINARY)) {
			return false;
		}

		//Unzip script
		$result = file_get_contents('http://'.$site_full.'/unzip.php?filename='.$script_name);

		//Delete CMS
		ftp_delete($conn_id, $server_cms_file);

		//Delete unzip script
		ftp_delete($conn_id, $server_upzip_file);

		//Delete azure default
		ftp_delete($conn_id, $server_file_default);		
		return true;
	}

	//Step4 : create Azure SQL database
	private function createAzureSQL($site_create) {
		$DB_SERVER = SiteController::findDBServer(SiteController::$DB_HOST);
		shell_exec(SiteController::$AZURE_PATH.' sql db create "'.$DB_SERVER.'" "'.$site_create.'" "'.SiteController::$DB_USER.'" "'.SiteController::$DB_PW.'" --location "'.SiteController::$LOCATION.'" --edition basic --maxSizeInGB 1 2>&1');
		ob_flush();
		$output = shell_exec(SiteController::$AZURE_PATH.' sql db show --json "'.$DB_SERVER.'" "'.$site_create.'" "'.SiteController::$DB_USER.'" "'.SiteController::$DB_PW.'" 2>&1');	
		ob_flush();
		$db_detail = json_decode($output);
		if(!empty($db_detail->Name)) {
			return true;
		}
		return false;
	}

	//Step5 : install CMS
	private function installCMS($cmstype, $site_create,$name,$did) {
		$cms = Cms::findOrFail($cmstype);
		//Wordpress
		if($cms->cid == 1) {
			SiteController::installWordpress($site_create,$name,$did);
			return true;

		}
		return false;
	}

	//CMS Installation
	private function installWordpress($site_create,$name,$did) {
		$domain = Domain::findOrFail($did);
		$domain_name = $domain->name;
		$subdomain = $name.'.'.$domain_name;
		$url = 'http://'.$subdomain.'/wp-content/mu-plugins/wp-db-abstraction/setup-config.php?step=2';
		$data = array('dbname' => $site_create, 'uname' => SiteController::$DB_USER, 'pwd' => SiteController::$DB_PW, 'dbhost' => SiteController::$DB_HOST, 'dbtype' => 'pdo_sqlsrv', 'prefix' => 'wp_');

		// use key 'http' even if you send the request to https://...
		$options = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($data),
			),
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
	}


	//Manage subdomain
	private  function MakeSubdomain_Init($i, $subdomain, $site_url, $site_ip) {
		if(!empty($i) && !empty($subdomain) && !empty($site_url) && !empty($site_ip)) {
			// BindDNS Setting
			$username = "admin"; 
			$password = "admin123456"; 
			$mainurl = "http://nfsite.me/dns";
			$url = $mainurl."/src/main.php"; 
			$cookie = "nfcookie.txt";
			$useragent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; de; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3 (FM Scene 4.6.1)";
			$postdata = "username=".$username."&password=".$password.""; 

			// Login to BindDNS
			$ch = curl_init(); 
			curl_setopt ($ch, CURLOPT_URL, $url); 
			curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
			curl_setopt ($ch, CURLOPT_USERAGENT, $useragent); 
			curl_setopt ($ch, CURLOPT_TIMEOUT, 60); 
			curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1); 
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt ($ch, CURLOPT_COOKIEJAR, $cookie); 
			curl_setopt ($ch, CURLOPT_COOKIEFILE, $cookie);
			curl_setopt ($ch, CURLOPT_REFERER, $url); 
			curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata); 		//send username and password to auth
			curl_setopt ($ch, CURLOPT_POST, 1); 
			$result = curl_exec ($ch); 
			SiteController::MakeSubdomain_AddRecord($ch, $mainurl, $i, "A", $subdomain, $site_url, $site_ip);
			SiteController::MakeSubdomain_AddRecord($ch, $mainurl, $i, "CNAME", $subdomain, $site_url, $site_ip);
			SiteController::MakeSubdomain_Commit($ch, $mainurl);
			//echo $result;
			curl_close($ch);
		} else {
			echo "Fatal Error.";
			return 0;
		}
	}

	private function MakeSubdomain_AddRecord($ch, $mainurl, $i, $newtype, $subdomain, $site_url, $site_ip) {	
		// Data Setup
		$url = $mainurl."/src/record.php?i=".$i;
		if($newtype == "A") {
			$postdata = "newhost=".$subdomain."&newtype=".$newtype."&newdestination=".$site_ip;
		} else if($newtype == "CNAME") {
			$postdata = "newhost=awverify.".$subdomain."&newtype=".$newtype."&newdestination=awverify.".$site_url;
		} else {
			echo "Fatal Error.";
			exit();
		}

		// Get current DNS records
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_POST, 0); 
		$data = curl_exec($ch);

		// Read HTML Forms
		$html = new Htmldom();
		$html->load($data);
		$query_string = "";
		foreach($html->find('input[name]') as $ret ) {
			if($ret->name != "newhost" && $ret->name != "newdestination" && strpos($ret->name,'delete') === false) {
				$query_string .= urlencode($ret->name)."=".$ret->value."&";
			//echo $ret->name."=".$ret->value."<br/>";
			}
		}
		foreach($html->find('select') as $ret ) {
			if($ret->name != "newtype") {
				$query_string .= urlencode($ret->name)."=".$ret->find('option[selected]', 0)->value."&";
			}
		//echo $ret->name."=".$ret->find('option[selected]', 0)->value."<br/>";	
		}

		//Set A Record
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $query_string.$postdata); 
		curl_setopt ($ch, CURLOPT_POST, 1); 
		$data = curl_exec($ch);
		//echo $data;
	}

	private function MakeSubdomain_Commit($ch, $mainurl) {
		$url = $mainurl."/src/commit.php";
		//Commit
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_POST, 0); 
		$data = curl_exec($ch);
	}
	

	//Misc
	private function randomStr($num) {
		$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
		$result = '';
		for ($i = 0; $i < $num-1; $i++)
			$result .= $characters[mt_rand(0, 35)];
		$result .= $characters[mt_rand(0, 25)];
		return $result;
	}

	private function findDBServer($DB_HOST) {
		$tmp = explode('.', $DB_HOST);
		return $tmp[0];
	}

	private function getFtpHost($uri) {
		$split = explode('.',$uri);
		$result = str_replace("https://","",$split[0]);
		$result .= '.'.SiteController::$FTP_SUFFIX;
		return $result;
	}

} //end of class