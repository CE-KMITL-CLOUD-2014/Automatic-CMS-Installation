<?php
class SiteController extends BaseController {
	//Azure Setting
	static private $AZURE_PATH = "/usr/local/bin/azure";
	//static private $AZURE_PATH = "HOME=/tmp/  /usr/local/bin/azure";
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
		$type = $_type;
		$name = $_name;
		$domain = $_domain;
		$suffix = SiteController::randomStr(6);
		$real_name = $name.'-'.$suffix;

		//check exist website
		$site = new Site;
		if(!$site->where('name', '=', $name)->count()) {
			$site->nf_user_uid = Auth::user()->uid;
			$site->nf_cms_cid = $_type;
			$site->nf_domain_did = 1;
			$site->name = $name;
			$site->mapping = $real_name;
			$site->status_active = 1;
			$site->date_create = date('Y-m-d H:i:s');
			$site->save();

			//Get last data for update
			$sid = $site->sid;
			$current_site = Site::find($sid);

			//Step 1 : create azure website
			$step1 = SiteController::createAzureSite($real_name);
			if($step1) {
				//update state				
				$current_site->step1 = 1;
				$current_site->save();
				//Step 2 : mapping domain name
				$step2 = SiteController::mappingDomain($real_name, $name, $domain);
				if($step2) {
					//update state				
					$current_site->step2 = 1;
					$current_site->save();
					echo "Step 2 : completed!<br/>";
					flush();
				}


			}
			return "done ".$sid;


		} else {
			return "Sorry : site name '$name' has been already used";
		}
	}

	private function createAzureSite($real_name) {
		shell_exec(SiteController::$AZURE_PATH.' site create --location "'.SiteController::$LOCATION.'" "'.$real_name.'" 2>&1');	
		flush();
		$output = shell_exec(SiteController::$AZURE_PATH.' site list --json "'.$real_name.'" 2>&1');
		flush();
		$site_detail = json_decode($output);		
		$site_uri = $site_detail[0]->uri;
		if(!empty($site_uri)) {
			SiteController::$SITE_FTP = SiteController::getFtpHost($site_uri);	
			shell_exec(SiteController::$AZURE_PATH.' site scale mode standard "'.$real_name.'" 2>&1');
			flush();
			return true;
		}
		return false;
	}

	private function mappingDomain($real_name, $name, $domain) {
		$site_name = $name;
		$site_create = $real_name;
		$site_full = $real_name.".azurewebsites.net";
		$site_ip = shell_exec('nslookup '.$site_full.' | tail -2 | head -1 | awk \'{print $2}\'');
		flush();

		SiteController::MakeSubdomain_Init('16', $site_name, $site_full, $site_ip);	
		flush();
		shell_exec(SiteController::$AZURE_PATH.' site domain add "'.$site_name.'.'.$domain.'" "'.$site_create.'" 2>&1');
		flush();
		return true;

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



}