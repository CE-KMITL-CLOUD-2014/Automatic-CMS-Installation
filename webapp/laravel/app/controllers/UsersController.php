<?php
class UsersController extends BaseController {
	protected $layout = 'layouts.main';

	public function registerAction() {
		$msg = array(
		            'username.required' => 'username ไม่สามารถเป็นค่าว่างได้',
		            'password.required' => 'password ไม่สามารถเป็นค่าว่างได้',
		            'username.min' => 'username ต้องไม่ต่ำกว่า :min ตัวอักษร',
		            'password.min' => 'password ต้องไม่ต่ำกว่า :min ตัวอักษร',
		 );
		$rules = array(
		            'username' => 'required|min:4',
		            'password' => 'required|min:4'
		);
		if (Input::server("REQUEST_METHOD") == "POST"){
			$validator = Validator::make(Input::all(),$rules,$msg);
			if($validator->fails()){
		                $messages = $validator->messages();
		                return Redirect::to('user/register')->withErrors($messages)->withInput();
		            } else {
		            	$username = Input::get('username');
              			$password = Input::get('password');
              			$dt = date('Y-m-d H:i:s');
        				

              			$user = new Users;
              			$user->username = $username;
              			$user->password = $password;
              			$user->email = "sdsd@ds.com";
              			$user->fullname= "sd";
              			$user->date_register = $dt;
              			$user->save();



		            	return 'sdds';
		            }
		}
	}
}