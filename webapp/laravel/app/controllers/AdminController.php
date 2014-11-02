<?php
class AdminController extends BaseController {

	//Show all users
	public function ShowUserAction() {
		if(AdminController::checkPermission()) {
			$user_data = User::all();
			return View::make('admin/user')->with('pagetitle','Admin : User Management')->with('user_data',$user_data)->with('user_count',count($user_data));
		}
		return Redirect::to(AdminController::redirectErrorPermission());
	}

	//Show user by ID
	public function ShowUserIDAction($uid) {
		if(AdminController::checkPermission()) {
			$user_data = User::findOrFail($uid);
			$site_data = Site::with(array('domain', 'cms'))->where('nf_user_uid','=',$uid)->get();				
			return View::make('admin/user-id')->with('pagetitle',$user_data->fullname)->with('user_data',$user_data)->with('site_data',$site_data)->with('site_count',count($site_data));
		}
		return Redirect::to(AdminController::redirectErrorPermission());
	}

	//Show all sites
	public function ShowSiteAction() {
		if(AdminController::checkPermission()) {
			$site_data = Site::with(array('user' , 'domain', 'cms'))->where('step1','=',1)->where('step2','=',1)->where('step3','=',1)->where('step4','=',1)->where('step5','=',1)->where('step6','=',1)->get();
			return View::make('admin/site')->with('pagetitle','Admin : Site Management')->with('site_data',$site_data)->with('site_count',count($site_data));
		}
		return Redirect::to(AdminController::redirectErrorPermission());	
	}

	//Show site by ID
	public function ShowSiteIDAction($sid) {
		if(AdminController::checkPermission()) {
			$site_data = Site::with(array('user' , 'domain', 'cms'))->findOrFail($sid);
			$site_name = $site_data->name.'.'.$site_data->domain->name;
			$site_img = SiteController::getScreenShot($site_name,'true','true');
			return View::make('admin/site-id')->with('pagetitle',$site_name)->with('site_data',$site_data)->with('site_img',$site_img);
		}
		return Redirect::to(AdminController::redirectErrorPermission());	
	}

	//Show settings page
	public function ShowSettingAction() {
		if(AdminController::checkPermission()) {
			$setting = Setting::findOrFail(1);
			return View::make('admin/setting')->with('pagetitle','Admin : System Setting')->with('setting',$setting);
		}
		return Redirect::to(AdminController::redirectErrorPermission());	
	}

	//Update General Setting
	public function FormSettingGeneralAction() {
		if(AdminController::checkPermission()) {
			$rules = array(
				'setting_site_title' => 'required|min:4|max:64',
				'setting_max_site' => 'required|digits_between:1,2'
				);
			$validator = Validator::make(Input::all(),$rules);
			if($validator->fails()){
				$messages = $validator->messages();
				return Redirect::to('/admin/setting')->withErrors($messages)->withInput();
			} else {	
				$setting = Setting::findOrFail(1);
				$setting->max_site = Input::get('setting_max_site');
				$setting->site_title = Input::get('setting_site_title');
				$setting->save();
				return Redirect::to('/admin/setting')->with('nf_setting','บันทึกการตั้งค่า General เรียบร้อย');
			}
		}
		return Redirect::to(AdminController::redirectErrorPermission());	
	}

	//Update Cloud Service Setting
	public function FormSettingCloudAction() {
		if(AdminController::checkPermission()) {
			$rules = array(
				'setting_azure_path' => 'required|min:4|max:50',
				'setting_azure_suffix' => 'required|min:4|max:50',
				'setting_azure_location' => 'required|min:4|max:50',
				'setting_azure_ftp_suffix' => 'required|min:4|max:50',
				'setting_azure_ftp_user' => 'required|min:4|max:50',
				'setting_azure_ftp_password' => 'required|min:4|max:100'
				);
			$validator = Validator::make(Input::all(),$rules);
			if($validator->fails()){
				$messages = $validator->messages();
				return Redirect::to('/admin/setting')->withErrors($messages)->withInput();
			} else {	
				$setting = Setting::findOrFail(1);
				$setting->azure_path = Input::get('setting_azure_path');
				$setting->azure_suffix = Input::get('setting_azure_suffix');
				$setting->azure_location = Input::get('setting_azure_location');
				$setting->azure_ftp_suffix = Input::get('setting_azure_ftp_suffix');
				$setting->azure_ftp_user = Input::get('setting_azure_ftp_user');
				$setting->azure_ftp_password = Input::get('setting_azure_ftp_password');
				
				$setting->save();
				return Redirect::to('/admin/setting')->with('nf_setting','บันทึกการตั้งค่า Cloud Sevice เรียบร้อย');
			}
		}
		return Redirect::to(AdminController::redirectErrorPermission());	

	}

	//Update DNS Zone Setting
	public function FormSettingDnsZoneAction() {
		if(AdminController::checkPermission()) {
			$rules = array(
				'setting_refresh' => 'required|min:4|max:10',
				'setting_retry' => 'required|min:4|max:10',
				'setting_expire' => 'required|min:4|max:10',
				'setting_ttl' => 'required|min:4|max:10',
				'setting_ns1' => 'required|min:4|max:64',
				'setting_ns2' => 'required|min:4|max:64',
				'setting_www' => 'required|min:4|max:64'
				);
			$validator = Validator::make(Input::all(),$rules);
			if($validator->fails()){
				$messages = $validator->messages();
				return Redirect::to('/admin/setting')->withErrors($messages)->withInput();
			} else {	
				$setting = Setting::findOrFail(1);
				$setting->refresh = Input::get('setting_refresh');
				$setting->retry = Input::get('setting_retry');
				$setting->expire = Input::get('setting_expire');
				$setting->ttl = Input::get('setting_ttl');
				$setting->ns1 = Input::get('setting_ns1');
				$setting->ns2 = Input::get('setting_ns2');
				$setting->www = Input::get('setting_www');
				$setting->save();
				return Redirect::to('/admin/setting')->with('nf_setting','บันทึกการตั้งค่า DNS Zone เรียบร้อย');
			}
		}
		return Redirect::to(AdminController::redirectErrorPermission());	

	}

	//Update DNS Server Setting
	public function FormSettingDnsServerAction() {
		if(AdminController::checkPermission()) {
			$rules = array(
				'setting_dns_username' => 'required|min:4|max:50',
				'setting_dns_password' => 'required|min:4|max:50',
				'setting_dns_mainurl' => 'required|min:4|max:50',
				'setting_dns_ua' => 'required|min:4|max:255'
				);
			$validator = Validator::make(Input::all(),$rules);
			if($validator->fails()){
				$messages = $validator->messages();
				return Redirect::to('/admin/setting')->withErrors($messages)->withInput();
			} else {	
				$setting = Setting::findOrFail(1);
				$setting->dns_username = Input::get('setting_dns_username');
				$setting->dns_password = Input::get('setting_dns_password');
				$setting->dns_mainurl = Input::get('setting_dns_mainurl');
				$setting->dns_ua = Input::get('setting_dns_ua');
				
				$setting->save();
				return Redirect::to('/admin/setting')->with('nf_setting','บันทึกการตั้งค่า DNS Server เรียบร้อย');
			}
		}
		return Redirect::to(AdminController::redirectErrorPermission());	

	}

	//Update Screenshot Setting
	public function FormSettingScreenshotAction() {
		if(AdminController::checkPermission()) {
			$rules = array(
				'setting_ss_pubkey' => 'required|min:4|max:255',
				'setting_ss_seckey' => 'required|min:4|max:255',
				'setting_ss_width' => 'required',
				'setting_ss_height' => 'required'
				);
			$validator = Validator::make(Input::all(),$rules);
			if($validator->fails()){
				$messages = $validator->messages();
				return Redirect::to('/admin/setting')->withErrors($messages)->withInput();
			} else {	
				$setting = Setting::findOrFail(1);
				$setting->ss_pubkey = Input::get('setting_ss_pubkey');
				$setting->ss_seckey = Input::get('setting_ss_seckey');
				$setting->ss_width = Input::get('setting_ss_width');
				$setting->ss_height = Input::get('setting_ss_height');
				
				$setting->save();
				return Redirect::to('/admin/setting')->with('nf_setting','บันทึกการตั้งค่า Screenshot API เรียบร้อย');
			}
		}
		return Redirect::to(AdminController::redirectErrorPermission());	

	}

	

	//Show domain names
	public function ShowDomainAction() {
		if(AdminController::checkPermission()) {
			$domain_data = Domain::all();
			return View::make('admin/domain')->with('pagetitle','Admin : Domain Management')->with('domain_data',$domain_data)->with('domain_count',count($domain_data));
		}
		return Redirect::to(AdminController::redirectErrorPermission());
	}

	//Hide domain by ID
	public function HideDomainIDAction($did) {
		if(AdminController::checkPermission()) {
			$domain = Domain::findOrFail($did);
			$domain_name = $domain->name;
			$domain->status_active = 0;
			$domain->save();

			return Redirect::back()->with('nf_success',$domain_name.' ถูกซ่อนเรียบร้อยแล้ว');			
		}
		return Redirect::to(AdminController::redirectErrorPermission());	
	}

	//Show domain by ID
	public function ShowDomainIDAction($did) {
		if(AdminController::checkPermission()) {
			$domain = Domain::findOrFail($did);
			$domain_name = $domain->name;
			$domain->status_active = 1;
			$domain->save();

			return Redirect::back()->with('nf_success',$domain_name.' ถูกแสดงเรียบร้อยแล้ว');			
		}
		return Redirect::to(AdminController::redirectErrorPermission());	
	}

	//Add new domain name
	public function AddAction() {
		if(AdminController::checkPermission()) {
			$rules = array(
				'domain_name' => 'required|min:4|max:64'
				);
			$validator = Validator::make(Input::all(),$rules);
			if($validator->fails()){
				$messages = $validator->messages();
				return Redirect::back()->withErrors($messages)->withInput();
			} else {	
				$domain_name = Input::get('domain_name');
				if(SiteController::MakeSubdomain_Init('no', $domain_name, 'new', 'new', 'NEW')) {
					return Redirect::back()->with('nf_success','เพิ่มโดเมน '.$domain_name .' แล้ว');	
				}
				return Redirect::back()->with('nf_error','ไม่สามารถเพิ่ม '.$domain_name .' ได้');				
			}					
		}
		return Redirect::to(AdminController::redirectErrorPermission());	
	}

	//Check admin permission
	private function checkPermission() {
		if(Auth::check()) {
			if(Auth::user()->role == 1) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}	
	}

	//Redirect if not admin
	private function redirectErrorPermission() {
		if(Auth::check()) {
			return '/site/manage';
		} else {
			return '/user/login';
		}
	}
}