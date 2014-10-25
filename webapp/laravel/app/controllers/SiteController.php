<?php
class SiteController extends BaseController {
	//Azure Setting
	//static private $AZURE_PATH = "/usr/local/bin/azure";
	static private $AZURE_PATH = "HOME=/tmp/  /usr/local/bin/azure";
	static private $FTP_SUFFIX = "ftp.azurewebsites.windows.net";
	static private $FTP_USER = "cmsserver";
	static private $FTP_PW = "e7H+QJ^HV-W!PCbBbev3*w3dNDTtrqUf";	
	static private $LOCATION = "Southeast Asia";
	static private $SITE_FTP = "";
	static private $SCRIPT_NAME = "nfscript.zip";
	static private $SCRIPT_PATH= "/site/wwwroot/";

	//Check available site
	public function checkAvailable($mode = 'json') {				
		$rules = array(
			'sitename' => 'required|min:4|max:16|regex:/^[a-zA-Z0-9]+(-[a-zA-Z0-9]+)*$/',
			'domain_id' => 'required|digits_between:1,3'
			);
		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails()){
			$messages = $validator->messages();
			$error_msg = '';
			foreach($messages->all() as $error) {
				$error_msg .= $error.'<br/>';
			}
			return Response::json(array('status' => 'error', 'message' => $error_msg));
		} else {
			$name = Input::get('sitename');
			$did = Input::get('domain_id');
			$status_ok = 'สามารถใช้ชื่อเว็บไซต์นี้ได้';
			$status_error = 'ขออภัย ชื่อเว็บไซต์นี้ถูกใช้งานแล้ว';
			$domain_count = SiteController::countExistSite($name, $did);
			if($domain_count == 0) {
				return Response::json(array('status' => 'ok', 'message' =>$status_ok));
			} 
			return Response::json(array('status' => 'error', 'message' => $status_error));
		}
	} 

	private function countExistSite($name, $did) {
		return Site::where('name','=',$name)->where('nf_domain_did','=',$did)->count();
	}
	

	//Site creation
	public function createAction($_type=null, $_name=null, $_domain=null) {
		$rules = array(
			'sitename' => 'required|min:4|max:16|regex:/^[a-zA-Z0-9]+(-[a-zA-Z0-9]+)*$/',
			'sitetitle' => 'required|min:4|max:32',
			'domain_id' => 'required|digits_between:1,3',
			'email' => 'required|between:4,64|email',
			'CMS-Selected' => 'required|min:4|max:12',
			'username' => 'required|min:4|max:16',
			'password' => 'required|min:6|max:32|confirmed',
			'password_confirmation' => 'required|min:6|max:32'
		);
		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails()){
			$messages = $validator->messages();
			$error_msg = '';
			foreach($messages->all() as $error) {
				$error_msg .= $error.'<br/>';
			}
			return Response::json(array('status' => 'error', 'message' => $error_msg));
			//return Redirect::to('site/create')->withErrors($messages)->withInput();
		} else {
			$name = Input::get('sitename');
			$did = Input::get('domain_id');
			$domain_count = SiteController::countExistSite($name, $did);
			if($domain_count != 0) {
				$messages = 'ชื่อเว็บไซต์ถูกใช้งานแล้ว';
				return Response::json(array('status' => 'error', 'message' => $messages));
			} 
			return Response::json(array('status' => 'ok', 'message' => ''));
		}
		//check auth	
		/*if(Auth::check()) {
			$type = (int) $_type;
			$name = $_name;
			$domain = (int) $_domain;
			$suffix = SiteController::randomStr(6);
			$real_name = $name.'-'.$suffix;
			$site_full = $real_name.".azurewebsites.net";

			//site config
			$site_config = array(
				'site_name' => 'Hello Oppa',
				'site_username' => 'admin',
				'site_password' => '159753',
				'site_email' => 'admin@nfsite.me'
			);

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

							//Step 4 : create AmazonRDS mySQL database
							$step4 = SiteController::createAmazonRDS($type, $name);
							if($step4) {
								$current_site->step4 = 1;
								$current_site->save();
								echo "Step 4 : completed!<br/>";
								ob_flush();

								//Step 5 : install CMS
								$step5 = SiteController::installCMS($type, $name, $domain, $site_config);
								if($step5) {
									$current_site->step5 = 1;
									$current_site->save();
									echo "Step 5 : completed!<br/>";
									ob_flush();

									//Step 6 : delete script
									$step6 = SiteController::deleteScript($type, $real_name);
									if($step6) {
										$current_site->step6 = 1;
										$current_site->save();
										echo "Step 6 : completed!<br/>";
										ob_flush();
									} else {
										echo "Step6 : error!</br>";
									}
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
		}*/
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
		$script_name = SiteController::$SCRIPT_NAME;
		$script_path = SiteController::$SCRIPT_PATH;
		$server_cms_file = $script_path.$script_name;
		$local_cms_file = $cms->url;
		$server_upzip_file = $script_path.'unzip.php';
		$local_unzip_file = 'https://nfcmsservice.blob.core.windows.net/cms-scripts/unzip.php';
		$server_file_default = $script_path.'hostingstart.html';
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

		//Delete azure default
		ftp_delete($conn_id, $server_file_default);	

		//Close FTP connection
		ftp_close($conn_id);

		//Unzip script		
		$result = SiteController::url_get_contents('http://'.$site_full.'/unzip.php?filename='.$script_name);
			
		return true;
	}	

	//Step4 : create AmazonRDS mySQL database
	private function createAmazonRDS($type, $name) {
		$cms = Cms::findOrFail($type);
		if($cms->type == 'wordpress' || $cms->type == 'joomla' || $cms->type == 'drupal') {
			shell_exec('mysql -u'.$cms->db_username.' -p"'.$cms->db_password.'" -h '.$cms->db_host.' -e "create database \`'.$name.'\`";');
			return true;
		} 
		return false;		
	}

	//Step5 : install CMS
	private function installCMS($type, $name, $did, $site_config) {
		$cms = Cms::findOrFail($type);
		$param = array(
			'did' => $did,
			'db_name' => $name,
			'db_host' => $cms->db_host,
			'db_username' => $cms->db_username,
			'db_password' => $cms->db_password,
			'site_name' => $site_config['site_name'],
			'site_username' => $site_config['site_username'],
			'site_password' => $site_config['site_password'],
			'site_email' => $site_config['site_email']
		);
		//Wordpress
		if($cms->type == 'wordpress') {
			SiteController::installWordpress($param);
			return true;
		} else if($cms->type == 'joomla') {
			SiteController::installJoomla($param);
			return true;
		} else if($cms->type == 'drupal') {
			SiteController::installDrupal($param);
			return true;
		}
		return false;
	}

	//CMS Installation
	//---wordpress
	private function installWordpress($param) {
		$domain = Domain::findOrFail($param['did']);
		$domain_name = $domain->name;
		$subdomain = 'http://'.$param['db_name'].'.'.$domain_name;		

		//Database Config
		$url_db_config = $subdomain.'/wp-admin/setup-config.php?step=2';
		$db_config = array(
			'dbname' => $param['db_name'],
			'uname' => $param['db_username'],
			'pwd' => $param['db_password'],
			'dbhost' => $param['db_host'],
			'prefix' => 'wp_'
		);
		SiteController::callPostMethod($url_db_config, $db_config);

		//Site Config
		$url_site_config = $subdomain.'/wp-admin/install.php?step=2';
		$site_config = array(
			'weblog_title' => $param['site_name'],
			'user_name' => $param['site_username'],
			'admin_password' => $param['site_password'],
			'admin_password2' => $param['site_password'],
			'admin_email' => $param['site_email'],
			'blog_public' => 1
		);
		SiteController::callPostMethod($url_site_config, $site_config);

		
	}

	//---joomla
	private function installJoomla($param) {
		$domain = Domain::findOrFail($param['did']);
		$domain_name = $domain->name;
		$subdomain = $param['db_name'].'.'.$domain_name;
		$url = 'http://'.$subdomain.'/nf_install.php';

		$data = array(
			'db_username' => $param['db_username'],
			'db_host' => $param['db_host'],
			'db_password' => $param['db_password'],
			'db_name' => $param['db_name'],
			'db_prefix' => 'jl_',

			'site_name' => $param['site_name'],
			'site_email' => $param['site_email'],
			'site_username' => $param['site_username'],
			'site_password' => $param['site_password']
		);		
		SiteController::callPostMethod($url, $data);
	}

	//---drupal
	private function installDrupal($param) {
		$domain = Domain::findOrFail($param['did']);
		$domain_name = $domain->name;
		$subdomain = $param['db_name'].'.'.$domain_name;
		$url = 'http://'.$subdomain.'/nf_install.php';

		$data = array(
			'db_type' => 'mysql',
			'username' => $param['db_username'],
			'host' => $param['db_host'],
			'password' => $param['db_password'],
			'database' => $param['db_name'],
			'db_prefix' => 'dp_',

			'site_name' => $param['site_name'],
			'site_mail' => $param['site_email'],
			'site_username' => $param['site_username'],
			'site_pw' => $param['site_password']
		);		
		SiteController::callPostMethod($url, $data);
	}

	//Step 6 delete install file and script
	private function deleteScript($cmstype, $real_name) {
		$cms = Cms::findOrFail($cmstype);
		$script_name = SiteController::$SCRIPT_NAME;
		$script_path = SiteController::$SCRIPT_PATH;
		$server_cms_file = $script_path.$script_name;
		$server_upzip_file = $script_path.'unzip.php';
		$server_install_file = $script_path.'nf_install.php';

		$conn_id = ftp_connect(SiteController::$SITE_FTP);
		$ftp_user = $real_name.'\\';
		$ftp_user .= SiteController::$FTP_USER;
		$login_result = ftp_login($conn_id,$ftp_user,SiteController::$FTP_PW);
		// turn passive mode on
		ftp_pasv($conn_id, true);		

		//Delete CMS
		ftp_delete($conn_id, $server_cms_file);

		//Delete unzip script
		ftp_delete($conn_id, $server_upzip_file);

		//Delete install script
		if($cms->type == "joomla" || $cms->type == "drupal")
			ftp_delete($conn_id, $server_install_file);

		//Close FTP connection
		ftp_close($conn_id);
			
		return true;
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

	private function getFtpHost($uri) {
		$split = explode('.',$uri);
		$result = str_replace("https://","",$split[0]);
		$result .= '.'.SiteController::$FTP_SUFFIX;
		return $result;
	}

	private function callPostMethod($url, $data) {
		// use key 'http' even if you send the request to https://...
		$options = array(
			'http' => array(
				'timeout' => 3600,
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($data),
			),
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
	}

	private function url_get_contents($Url) {
		if (!function_exists('curl_init')){ 
			die('CURL is not installed!');
		}
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $Url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,0); 
	   	curl_setopt($ch, CURLOPT_TIMEOUT, 400); //timeout in seconds
	 	$output = curl_exec($ch);
	 	curl_close($ch);
		return $output;
	}	

} //end of class