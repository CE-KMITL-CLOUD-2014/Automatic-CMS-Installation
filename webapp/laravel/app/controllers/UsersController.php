<?php
class UsersController extends BaseController {
	protected $layout = 'layouts.main';

	public function registerAction() {		
		$rules = array(
			'fullname' => 'required|min:4|max:32',
			'email' => 'required|between:4,64|email|unique:nf_user',
		            'username' => 'required|min:4|max:32|unique:nf_user',
		            'password' => 'required|min:6|max:32|confirmed',
		            'password_confirmation' => 'required|min:6|max:32'
		);		
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			$messages = $validator->messages();
			return Redirect::to('user/register')->withErrors($messages)->withInput();
		 } else {		            	
              		$fullname = Input::get('fullname');
              		$username = Input::get('username');
              		$email = Input::get('email');
              		$confirm_code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 16);

              		//Send email to confirm
              		$data = array('fullname' =>  $fullname , 'username' => $username, 'email' => $email, 'confirm_code' => $confirm_code);
			Mail::send('emails.user.confirm', $data, function($message) use ($email, $fullname)
			{
			    $message->to($email , $fullname) ->subject('Confirmation your account.');
			});

              		$user = new User;
              		$user->fullname= $fullname;
              		$user->username = $username;
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
		            'username' => 'required|min:4|max:32',
		            'password' => 'required|min:6|max:32'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			$messages = $validator->messages();
		            return Redirect::to('user/login')->withErrors($messages)->withInput();
		} else {		
		           $username = Input::get('username');
		           $password =  Input::get('password');
		          	if (Auth::attempt(array('username' => $username, 'password' => $password, 'status_confirm' => 1, 'status_active' => 1))) {
		          		return Redirect::to('dashboard');
			} else {
				$user = User::where('username','=',$username)->get();
				$messages = array(
					            array('โปรดตรวจสอบ username หรือ password  ')
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

	public function confirmAction($username,$confirm_code) {	
		$user = User::where('username','=',$username)->where('confirm_code','=',$confirm_code)->get();
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

	public function changepwAction() {	
		$rules = array(			
		            'password_old' => 'required|min:6|max:32',
		            'password' => 'required|min:6|max:32|confirmed',
		            'password_confirmation' => 'required|min:6|max:32'
		);	
		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()){
			$messages = $validator->messages();
		            return Redirect::to('user/profile')->withErrors($messages)->withInput();
		} else {	
			$user = Auth::user();
			$current_password = Input::get('password_old');
			if (!Hash::check($current_password, $user->password)) {
			        return Redirect::to('/user/profile')->withErrors('รหัสผ่านเดิมไม่ถูกต้อง');
			 } else {
			 	$new_password = Input::get('password');
			 	$user->password = Hash::make($new_password);
			 	$user->save();
			 	return Redirect::to('user/profile')->with('nf_changpw', 'เปลี่ยนรหัสผ่านเรียบร้อยแล้ว');
			 }
			
		}	
	}
	
}