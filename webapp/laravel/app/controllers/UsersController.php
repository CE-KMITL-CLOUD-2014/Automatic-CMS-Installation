<?php
class UsersController extends BaseController {
	
	public function registerAction() {		
		$rules = array(
			'fullname' => 'required|min:4|max:32',
			'email' => 'required|between:4,64|email|unique:nf_user',
			'password' => 'required|min:6|max:32|confirmed',
			'password_confirmation' => 'required|min:6|max:32'
			);		
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			$messages = $validator->messages();
			return Redirect::to('user/register')->withErrors($messages)->withInput();
		} else {		            	
			$fullname = Input::get('fullname');
			$email = Input::get('email');
			$confirm_code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 32);

              		//Send email to confirm
			$data = array('fullname' =>  $fullname , 'email' => $email, 'confirm_code' => $confirm_code);
			Mail::send('emails.user.confirm', $data, function($message) use ($email, $fullname)
			{
				$message->to($email , $fullname) ->subject('Confirm your account.');
			});

			$user = new User;
			$user->fullname= $fullname;
			$user->password = Hash::make(Input::get('password'));
			$user->email = $email;           			
			$user->date_register = date('Y-m-d H:i:s');
			$user->status_active = 1;
			$user->status_confirm = 0;
			$user->role = 0;
			$user->confirm_code = $confirm_code;
			$user->save(); 

			return  Redirect::to('user/confirm')->with('nf_confirm_email',$email );
		}
		
	}

	public function loginAction() {		
		$rules = array(
			'email' => 'required|between:4,64|email',
			'password' => 'required|min:6|max:32'
			);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			$messages = $validator->messages();
			return Redirect::to('user/login')->withErrors($messages)->withInput();
		} else {		
			$email = Input::get('email');
			$password =  Input::get('password');
			if (Auth::attempt(array('email' => $email, 'password' => $password, 'status_confirm' => 1, 'status_active' => 1))) {
				return Redirect::to('site/manage');
			} else {
				$user = User::where('email','=',$email)->get();
				$messages = array(
					array('โปรดตรวจสอบ email หรือ password  ')
					);
				if(count($user)) {
					if($user[0]->status_confirm == 0) {
						$messages = array(
							array('กรุณาทำการยืนยัน Email ก่อนใช้บริการ')
							);

					} else if($user[0]->status_active == 0) {
						$messages = array(
							array('บัญชีของคุณถูกระงับการใช้งาน')
							);
					}

				}
				return Redirect::to('user/login')->withErrors($messages)->withInput();
			}		                 	
		}

	}

	public function logoutAction() {	
		Auth::logout();
		return Redirect::to('/');
	}

	public function confirmAction($confirm_code) {	
		$user = User::where('confirm_code','=',$confirm_code)->get();
		if(count($user)) {
			if($user[0]->status_confirm == 1) {
				return Redirect::to('user/login')->with('nf_confirm','บัญชีนี้ถูกยืนยันแล้ว');
			} else {
				$update = User::find($user[0]->uid);
				$update->status_confirm = 1;
				$update->save();
				return Redirect::to('user/login')->with('nf_confirm','ยืนยันอีเมล์เสร็จสมบูรณ์');
			}

		} else {
			return Redirect::to('/');
		}		
	}

	//Delete User
	public function deleteAction($uid) {
		if(Auth::check()) {
			if(Auth::user()->role == 1) {
				$user_data = User::findOrFail($uid);
				$user_name = $user_data->fullname;

				UsersController::confirmDeleteUser($uid);
				return Redirect::to('/admin/user')->with('nf_success',$user_name.' ถูกลบเรียบร้อยแล้ว');
				
			} else {
				return Redirect::to('/site/manage');
			}
		} else {
			return Redirect::to('/user/login');
		}
	}

	private function confirmDeleteUser($uid) {
		$user = User::findOrFail($uid);
		$site = Site::where('nf_user_uid','=',$uid)->get();
		$site_count = count($site);

		if($site_count > 0) {
			for($i=0;$i<$site_count;$i++) {
				SiteController::confirmDeleteSite($site[$i]->sid);
				ob_flush();
			}
		}

		$user->delete();
		
	}

	//Ban User
	public function banAction($uid) {
		if(Auth::check()) {
			if(Auth::user()->role == 1) {
				$user_data = User::findOrFail($uid);
				$user_name = $user_data->fullname;

				if($user_data->status_active == 1) {
					UsersController::confirmBanUser($uid);
					return Redirect::back()->with('nf_success',$user_name.' ถูกแบนเรียบร้อยแล้ว');
				} else {
					return Redirect::back()->with('nf_error',$user_name.' ถูกแบนอยู่แล้ว');
				}
			} else {
				return Redirect::to('/site/manage');
			}
		} else {
			return Redirect::to('/user/login');
		}
	}

	private function confirmBanUser($uid) {
		$user = User::findOrFail($uid);
		$site = Site::where('nf_user_uid','=',$uid)->get();
		$site_count = count($site);

		if($site_count > 0) {
			for($i=0;$i<$site_count;$i++) {
				SiteController::confirmBlockSite($site[$i]->sid);
				ob_flush();
			}
		}

		$user->status_active = 0;
		$user->save();
		
	}

	//Unban User
	public function unbanAction($uid) {
		if(Auth::check()) {
			if(Auth::user()->role == 1) {
				$user_data = User::findOrFail($uid);
				$user_name = $user_data->fullname;

				if($user_data->status_active == 0) {
					UsersController::confirmUnbanUser($uid);
					return Redirect::back()->with('nf_success',$user_name.' ถูกปลดแบนเรียบร้อยแล้ว');
				} else {
					return Redirect::back()->with('nf_error',$user_name.' ไม่ได้ถูกแบน');
				}
			} else {
				return Redirect::to('/site/manage');
			}
		} else {
			return Redirect::to('/user/login');
		}
	}

	private function confirmUnbanUser($uid) {
		$user = User::findOrFail($uid);
		$site = Site::where('nf_user_uid','=',$uid)->get();
		$site_count = count($site);

		if($site_count > 0) {
			for($i=0;$i<$site_count;$i++) {
				SiteController::confirmUnblockSite($site[$i]->sid);
				ob_flush();
			}
		}		

		$user->status_active = 1;
		$user->save();
		
	}			
}