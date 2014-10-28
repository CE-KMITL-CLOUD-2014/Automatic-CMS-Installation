<?php
class SiteController extends BaseController {
	//Azure Setting
	//static private $AZURE_PATH = "/usr/local/bin/azure";
	static private $AZURE_PATH = "HOME=/tmp/  /usr/local/bin/azure";
	static private $AZURE_SUFFIX = "azurewebsites.net";
	static private $FTP_SUFFIX = "ftp.azurewebsites.windows.net";
	static private $FTP_USER = "cmsserver";
	static private $FTP_PW = "e7H+QJ^HV-W!PCbBbev3*w3dNDTtrqUf";	
	static private $LOCATION = "Southeast Asia";
	static private $SITE_FTP = "";
	static private $SCRIPT_NAME = "nfscript.zip";
	static private $SCRIPT_PATH= "/site/wwwroot/";

	//Check available site
	public function checkAvailable() {				
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
		} else {
			//check data from DB
			$name = Input::get('sitename');
			$did = Input::get('domain_id');
			$cms_type = Input::get('CMS-Selected');
			$cms_data = Cms::where('type','=',$cms_type)->get();
			$cms_exist = count($cms_data);
			$site_exist = SiteController::countExistSite($name, $did);
			$domain_exist = Domain::where('did', '=', $did)->count();

			if(Auth::check()) {
				if(!$site_exist && $cms_exist && $domain_exist) {
					//Define data
					$suffix = SiteController::randomStr(5);
					$real_name = $name.'-'.$suffix;
					$install_token = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 32);
					$uid = Auth::user()->uid;
					$cid = $cms_data[0]->cid;
					//Add data into DB
					$site = new Site;
					$site->nf_user_uid = $uid;
					$site->nf_cms_cid = $cid;
					$site->nf_domain_did = $did;
					$site->name = $name;
					$site->mapping = $real_name;
					$site->status_active = 1;
					$site->date_create = date('Y-m-d H:i:s');
					$site->install_token = $install_token;
					$site->site_title = Input::get('sitetitle');
					$site->site_username = Input::get('username');
					$site->site_password = Input::get('password');
					$site->site_email = Input::get('email');
					$site->save();


					//Get id of recently site insertion
					$sid = $site->sid;

					$params = array(
						'sid' => $sid,
						'install_token' => $install_token
					);

					return Response::json(array('status' => 'ok', 'message' => '', 'params' => $params));
				} else if($site_exist) {
					return Response::json(array('status' => 'error', 'message' => 'ชื่อเว็บไซต์ถูกใช้งานแล้ว'));
				} else if(!$cms_exist) {
					return Response::json(array('status' => 'error', 'message' => 'ไม่พบชนิด CMS'));
				} else if(!$domain_exist) {
					return Response::json(array('status' => 'error', 'message' => 'ไม่พบโดเมนเนมในระบบ'));
				} else {
					return Response::json(array('status' => 'error', 'message' => 'มีบางอย่างผิดพลาด โปรดลองใหม่อีกครั้ง'));
				}
			} else {
				return Response::json(array('status' => 'error', 'message' => 'กรุณาเข้าสู่ระบบ'));
			}

		}
	}

	public function installSite() {
		$step = Input::get('step');
		$sid = Input::get('sid');
		$install_token = Input::get('install_token');	

		if(!empty($step) && !empty($sid) && !empty($install_token)) {
			$chk_install = Site::where('step'.$step,'=','0')->where('sid','=',$sid)->where('install_token','=',$install_token)->count();
			if($chk_install == 1) {
				//Get current site for update
				$current_site = Site::findOrFail($sid);				
				$type = $current_site->nf_cms_cid;
				$name  = $current_site->name;
				$domain = $current_site->nf_domain_did;
				$real_name  = $current_site->mapping;
				$site_full = $real_name.'.'.SiteController::$AZURE_SUFFIX;
				$site_ftp_server = $current_site->site_ftp_server;

				//site config
				$site_config = array(
					'site_title' => $current_site->site_title,
					'site_username' => $current_site->site_username,
					'site_password' => $current_site->site_password,
					'site_email' => $current_site->site_email
				);

				if($step == 1) {
					//Step 1 : create azure website
					$chk_step = SiteController::createAzureSite($real_name);
					if($chk_step) {
						//update state				
						$current_site->step1 = 1;
						$current_site->site_ftp_server = SiteController::$SITE_FTP;
						$current_site->save();
						return Response::json(array('status' => 'ok', 'message' => 'กำลังจดทะเบียนชื่อเว็บไซต์'));
					} else {
						return Response::json(array('status' => 'error', 'message' => 'ไม่สามารถสร้างเว็บไซต์ได้'));
					}
				} else if($step == 2) {
					//Step 2 : mapping domain name
					$chk_step = SiteController::mappingDomain($real_name, $name, $site_full, $domain);
					if($chk_step) {
						//update state				
						$current_site->step2 = 1;
						$current_site->save();
						return Response::json(array('status' => 'ok', 'message' => 'กำลังอัพโหลด CMS'));
					} else {
						return Response::json(array('status' => 'error', 'message' => 'ไม่สามารถจดทะเบียนเว็บไซต์ได้'));
					}
				} else if($step == 3) {
					//Step 3 : upload CMS from blob storage to azure website
					$chk_step = SiteController::uploadScript($type, $real_name, $site_full, $site_ftp_server);
					if($chk_step) {
						//update state				
						$current_site->step3 = 1;
						$current_site->save();
						return Response::json(array('status' => 'ok', 'message' => 'กำลังสร้างฐานข้อมูล'));
					} else {
						return Response::json(array('status' => 'error', 'message' => 'ไม่สามารถอัพโหลด CMSได้'));
					}
				} else if($step == 4) {
					//Step 4 : create AmazonRDS mySQL database
					$chk_step = SiteController::createAmazonRDS($type, $name, $domain);
					if($chk_step) {
						//update state				
						$current_site->step4 = 1;
						$current_site->save();
						return Response::json(array('status' => 'ok', 'message' => 'กำลังติดตั้ง CMS'));
					} else {
						return Response::json(array('status' => 'error', 'message' => 'ไม่สามารถสร้างฐานข้อมูลได้'));
					}
				} else if($step == 5) {
					//Step 5 : install CMS
					$chk_step = SiteController::installCMS($type, $name, $domain, $site_config);
					if($chk_step) {
						//update state				
						$current_site->step5 = 1;
						$tmp_pw = $current_site->site_password;
						$current_site->site_password = Hash::make($tmp_pw);
						$current_site->save();
						return Response::json(array('status' => 'ok', 'message' => 'กำลังลบไฟล์ติดตั้ง CMS'));
					} else {
						return Response::json(array('status' => 'error', 'message' => 'ไม่สามารถติดตั้ง CMSได้'));
					}
				} else if($step == 6) {
					//Step 6 : delete script
					$chk_step = SiteController::deleteScript($type, $real_name, $site_ftp_server);
					if($chk_step) {
						//update state				
						$current_site->step6 = 1;
						$current_site->save();
						return Response::json(array('status' => 'ok', 'message' => 'การสร้างเว็บไซต์เสร็จสมบูรณ์'));
					} else {
						return Response::json(array('status' => 'error', 'message' => 'ไม่สามารถลบไฟล์ติดตั้ง CMSได้'));
					}
				} else {
					return Response::json(array('status' => 'error', 'message' => 'ขั้นตอนการติดตั้งไม่ถูกต้อง'));
				}

			} else {
				return Response::json(array('status' => 'error', 'message' => 'ไม่พบรายการเว็บไซต์ที่ต้องการติดตั้ง'));
			}
		} else {
			return Response::json(array('status' => 'error', 'message' => 'มีบางอย่างผิดพลาด โปรดลองใหม่อีกครั้ง'));

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

		$make_subdomain = SiteController::MakeSubdomain_Init($domain_mapid, $site_name, $site_full, $site_ip);
		if($make_subdomain)	{
			shell_exec(SiteController::$AZURE_PATH.' site domain add "'.$site_name.'.'.$domain_name.'" "'.$site_create.'" 2>&1');
			ob_flush();
			$output = shell_exec(SiteController::$AZURE_PATH.' site domain list '.$site_create.' --json  2>&1');
			ob_flush();
			$site_mapping = json_decode($output);
			if(count($site_mapping) > 1 && ($site_mapping[0] == $site_new)) {
				return true;
			}
		}
		return false;

	}

	//Step3 : upload CMS script
	private function uploadScript($cmstype, $real_name, $site_full, $site_ftp_server) {
		$cms = Cms::findOrFail($cmstype);
		$script_name = SiteController::$SCRIPT_NAME;
		$script_path = SiteController::$SCRIPT_PATH;
		$server_cms_file = $script_path.$script_name;
		$local_cms_file = $cms->url;
		$server_upzip_file = $script_path.'unzip.php';
		$local_unzip_file = 'https://nfcmsservice.blob.core.windows.net/cms-scripts/unzip.php';
		$server_file_default = $script_path.'hostingstart.html';
		$conn_id = ftp_connect($site_ftp_server);
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
	private function createAmazonRDS($type, $name, $did) {
		$db_name = $name.'-'.$did;
		$cms = Cms::findOrFail($type);
		if($cms->type == 'wordpress' || $cms->type == 'joomla' || $cms->type == 'drupal') {
			shell_exec('mysql -u'.$cms->db_username.' -p"'.$cms->db_password.'" -h '.$cms->db_host.' -e "create database \`'.$db_name.'\`";');
			return true;
		} 
		return false;		
	}

	//Step5 : install CMS
	private function installCMS($type, $name, $did, $site_config) {
		$cms = Cms::findOrFail($type);
		$db_name = $name.'-'.$did;
		$param = array(
			'did' => $did,
			'db_name' => $db_name,
			'db_host' => $cms->db_host,
			'db_username' => $cms->db_username,
			'db_password' => $cms->db_password,
			'site_name' => $name,
			'site_title' => $site_config['site_title'],
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
		$subdomain = 'http://'.$param['site_name'].'.'.$domain_name;		

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
			'weblog_title' => $param['site_title'],
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
		$subdomain = $param['site_name'].'.'.$domain_name;
		$url = 'http://'.$subdomain.'/nf_install.php';

		$data = array(
			'db_username' => $param['db_username'],
			'db_host' => $param['db_host'],
			'db_password' => $param['db_password'],
			'db_name' => $param['db_name'],
			'db_prefix' => 'jl_',

			'site_name' => $param['site_title'],
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
		$subdomain = $param['site_name'].'.'.$domain_name;
		$url = 'http://'.$subdomain.'/nf_install.php';

		$data = array(
			'db_type' => 'mysql',
			'username' => $param['db_username'],
			'host' => $param['db_host'],
			'password' => $param['db_password'],
			'database' => $param['db_name'],
			'db_prefix' => 'dp_',

			'site_name' => $param['site_title'],
			'site_mail' => $param['site_email'],
			'site_username' => $param['site_username'],
			'site_pw' => $param['site_password']
		);		
		SiteController::callPostMethod($url, $data);
	}

	//Step 6 delete install file and script
	private function deleteScript($cmstype, $real_name, $site_ftp_server) {
		$cms = Cms::findOrFail($cmstype);
		$script_name = SiteController::$SCRIPT_NAME;
		$script_path = SiteController::$SCRIPT_PATH;
		$server_cms_file = $script_path.$script_name;
		$server_upzip_file = $script_path.'unzip.php';
		$server_install_file = $script_path.'nf_install.php';

		$conn_id = ftp_connect($site_ftp_server);
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


	//Delete Website
	public function deleteAction($sid) {
		if(Auth::check()) {
			$uid = Auth::user()->uid;
			$count_site = Site::where('sid','=',$sid)->where('nf_user_uid','=',$uid)->count();
			if($count_site == 1) {
				$del_status = SiteController::confirmDeleteSite($sid);
				if($del_status) {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	private function confirmDeleteSite($sid) {
		$site = Site::findOrFail($sid);

		//delete azure website
		if($site->step1 == 1) {
			shell_exec(SiteController::$AZURE_PATH.' site delete -q "'.$site->mapping.'" 2>&1');
		}

		//delete mapping domain
		if($site->step2 == 1) {
			$domain = Domain::findOrFail($site->nf_domain_did);
			$domain_mapid = $domain->mapid;

			$del_subdomain = SiteController::MakeSubdomain_Init($domain_mapid, $site->name, null, null , "DEL");
		}

		//delete mysql database
		if($site->step4 == 1) {
			$db_name = $site->name.'-'.$site->nf_domain_did;
			$cms = Cms::findOrFail($site->nf_cms_cid);			
			shell_exec('mysql -u'.$cms->db_username.' -p"'.$cms->db_password.'" -h '.$cms->db_host.' -e "delete database \`'.$db_name.'\`";');
		}

		//delete the row from nfsite database
		$site->delete();

		return true;

	}




	//Manage subdomain
	private  function MakeSubdomain_Init($i, $subdomain, $site_url, $site_ip, $mode = "ADD") {
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

			if($mode == "ADD") {
				if(SiteController::MakeSubdomain_AddRecord($ch, $mainurl, $i, "A", $subdomain, $site_url, $site_ip) && SiteController::MakeSubdomain_AddRecord($ch, $mainurl, $i, "CNAME", $subdomain, $site_url, $site_ip))  {
					SiteController::MakeSubdomain_Commit($ch, $mainurl);
					curl_close($ch);
					return true;
				} else {
					curl_close($ch);
					return false;
				}	
			} else if($mode == "DEL") {
				if(SiteController::MakeSubdomain_DelRecord($ch, $mainurl, $i, 'A', $subdomain) && SiteController::MakeSubdomain_DelRecord($ch, $mainurl, $i, 'CNAME', $subdomain)) {
					SiteController::MakeSubdomain_Commit($ch, $mainurl);
					curl_close($ch);
					return true;
				} else {
					curl_close($ch);
					return false;
				}
			} else {
				return false;
			}	
		} else {
			return false;
		}
	}

	private function MakeSubdomain_AddRecord($ch, $mainurl, $i, $newtype, $subdomain, $site_url, $site_ip) {	
		// Data Setup
		$url = $mainurl."/src/nf_add_domain.php?i=".$i;
		if($newtype == "A") {
			$postdata = "newhost=".$subdomain."&newtype=".$newtype."&newdestination=".$site_ip."&zoneid=".$i;
		} else if($newtype == "CNAME") {
			$postdata = "newhost=awverify.".$subdomain."&newtype=".$newtype."&newdestination=awverify.".$site_url."&zoneid=".$i;
		} else {
			return 'error';
		}			

		//Set A Record
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata); 
		curl_setopt ($ch, CURLOPT_POST, 1); 
		$data = curl_exec($ch);
		
		//Get result
		$result = json_decode($data);
		
		if($result->status == 'ok')
			return true;
		return false;
	}

	private function MakeSubdomain_DelRecord($ch, $mainurl, $i, $deltype, $subdomain) {	
		// Data Setup
		$url = $mainurl."/src/nf_del_domain.php?i=".$i;
		if($deltype == "A") {
			$postdata = "delhost=".$subdomain."&deltype=".$deltype."&zoneid=".$i;
		} else if($deltype == "CNAME") {
			$postdata = "delhost=awverify.".$subdomain."&deltype=".$deltype."&zoneid=".$i;
		} else {
			return 'error';
		}			

		//Set A Record
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata); 
		curl_setopt ($ch, CURLOPT_POST, 1); 
		$data = curl_exec($ch);
		
		//Get result
		$result = json_decode($data);
		
		if($result->status == 'ok')
			return true;
		return false;
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