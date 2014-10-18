<?php
class UsersController extends BaseController {
	protected $layout = 'layouts.main';

	public function registerAction() {		
		$rules = array(
			'fullname' => 'required|min:4|max:32',
			'email' => 'required|between:4,64|email|unique:nf_user',
		            'username' => 'required|min:4|max:32|unique:nf_user',
		            'password' => 'required|min:6|max:32|confirmed',
		            'password_confirmation' => 'required|min:4|max:32'
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


              		$user = new User;
              		$user->fullname= $fullname;
              		$user->username = $username;
              		$user->password = Hash::make(Input::get('password'));
              		$user->email = $email;           			
              		$user->date_register = date('Y-m-d H:i:s');
              		$user->status_active = 1;
              		$user->status_confirm = 0;
              		$user->confirm_code = $confirm_code;
              		$user->save(); 

              		//Send email to confirm
              		$data = array('fullname' =>  $fullname , 'username' => $username, 'email' => $email, 'confirm_code' => $confirm_code);
			Mail::send('emails.user.confirm', $data, function($message) use ($email, $fullname)
			{
			    $message->to($email , $fullname) ->subject('Confirmation your account.');
			});


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
		          		return Redirect::to('user/main');
			} else {
				$user = User::where('username','=',$username)->get();
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

				} else {
					$messages = array(
					            array('โปรดตรวจสอบ username หรือ password  ')
					 );
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
		//return count($user);
		//return "username : ".$username." code : ".$confirm_code;
		//return Redirect::to('/');
	}
	
}