<?php
class AdminController extends BaseController {

	//Show all users
	public function ShowUserAction() {
		if(AdminController::checkPermission()) {
			$user_data = User::all();
			return View::make('admin/user')->with('pagetitle','Admin Manage Users')->with('user_data',$user_data)->with('user_count',count($user_data));
		}
		return Redirect::to(AdminController::redirectErrorPermission());
	}

	//Show user by ID
	public function ShowUserIDAction($uid) {
		if(AdminController::checkPermission()) {
			$user_data = User::findOrFail($uid);
			$site_data = Site::with(array('domain', 'cms'))->where('nf_user_uid','=',$uid)->get();				
			return View::make('admin/user-id')->with('pagetitle',$user_data->fullname)->with('user_data',$user_data)->with('site_data',$site_data);
		}
		return Redirect::to(AdminController::redirectErrorPermission());
	}

	//Show all sites
	public function ShowSiteAction() {
		if(AdminController::checkPermission()) {
			$site_data = Site::with(array('user' , 'domain', 'cms'))->where('step1','=',1)->where('step2','=',1)->where('step3','=',1)->where('step4','=',1)->where('step5','=',1)->where('step6','=',1)->get();
			return View::make('admin/site')->with('pagetitle','Admin Manage Sites')->with('site_data',$site_data)->with('site_count',count($site_data));
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
			return View::make('admin/setting')->with('pagetitle','Admin Settings')->with('setting',$setting);
		}
		return Redirect::to(AdminController::redirectErrorPermission());	
	}

	//Update settings page
	public function FormSettingAction() {
		if(AdminController::checkPermission()) {
			$rules = array(
				'setting_max_site' => 'required|digits_between:1,2'
				);
			$validator = Validator::make(Input::all(),$rules);
			if($validator->fails()){
				$messages = $validator->messages();
				return Redirect::to('/admin/setting')->withErrors($messages)->withInput();
			} else {	
				$setting = Setting::findOrFail(1);
				$setting->max_site = Input::get('setting_max_site');
				$setting->save();
				return Redirect::to('/admin/setting')->with('nf_setting','บันทึกการตั้งค่าเรียบร้อย');
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