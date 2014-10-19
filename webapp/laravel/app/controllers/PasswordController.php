<?php
class PasswordController extends BaseController {
	public function forget() {		
		switch ($response = Password::remind(Input::only('email') , function($message, $user) {
			$message->subject('Reset your password');
		}))
		{
			case Password::INVALID_USER:
			return Redirect::back()->with('error', Lang::get($response));
			case Password::REMINDER_SENT:
			return Redirect::back()->with('sent', Lang::get($response));
			default:
			return Redirect::to('/');
		}

	}

	public function reset($token) {
		$credentials = array('email' => Input::get('email'), 'password' => Input::get('password'), 'password_confirmation' => Input::get('password_confirmation'), 'token' => Input::get('token'));

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);
			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Redirect::back()->with('error', Lang::get($response));
			case Password::PASSWORD_RESET:
				return Redirect::to('user/login')->with('nf_confirm', 'กำหนดรหัสผ่านใหม่เรียบร้อยแล้ว');
		}
	}

	public function change() {	
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