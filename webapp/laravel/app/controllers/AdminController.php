<?php
class AdminController extends BaseController {

	public function ShowUserAction() {
		if(Auth::check()) {
			if(Auth::user()->role == 1) {
				$user_data = User::all();
				return View::make('admin/user')->with('pagetitle','Admin Manage Users')->with('user_data',$user_data)->with('user_count',count($user_data));
			} else {
				return Redirect::to('/site/manage');
			}
		} else {
			return Redirect::to('/user/login');
		}		
	}

	public function ShowSiteAction() {
		if(Auth::check()) {
			if(Auth::user()->role == 1) {
				$site_data = Site::with(array('user' , 'domain', 'cms'))->get();
				return View::make('admin/site')->with('pagetitle','Admin Manage Sites')->with('site_data',$site_data)->with('site_count',count($site_data));
			} else {
				return Redirect::to('/site/manage');
			}
		} else {
			return Redirect::to('/user/login');
		}		
	}

	public function ShowSettingAction() {
		if(Auth::check()) {
			if(Auth::user()->role == 1) {
				$setting = Setting::findOrFail(1);
				return View::make('admin/setting')->with('pagetitle','Admin Settings')->with('setting',$setting);
			} else {
				return Redirect::to('/site/manage');
			}
		} else {
			return Redirect::to('/user/login');
		}		
	}

	public function FormSettingAction() {
		if(Auth::check()) {
			if(Auth::user()->role == 1) {
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
			} else {
				return Redirect::to('/site/manage');
			}
		} else {
			return Redirect::to('/user/login');
		}
	}
}