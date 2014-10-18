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

		if (Input::server("REQUEST_METHOD") == "GET"){
			$user = unserialize(serialize(Session::get('nfuser')));
			if(empty($user)) {
	                                   return View::make('users/register')->with('pagetitle','Register');
			} else {
				return Redirect::to('user/main');
			}
		}else if (Input::server("REQUEST_METHOD") == "POST"){
			$validator = Validator::make(Input::all(),$rules);
			if($validator->fails()){
		                $messages = $validator->messages();
		                return Redirect::to('user/register')->withErrors($messages)->withInput();
		            } else {		            	
              			$user = new Users;
              			$user->fullname= Input::get('fullname');
              			$user->username = Input::get('username');
              			$user->password = Hash::make(Input::get('password'));
              			$user->email = Input::get('email');              			
              			$user->date_register = date('Y-m-d H:i:s');
              			$user->save();              			

		            	return View::make('users/login')->with('pagetitle','Login')->with('register_flag','true');	
		            }
		} else {
			return View::make('index')->with('pagetitle','Home');
		}
	}

	public function loginAction() {		
		$rules = array(
		            'username' => 'required|min:4|max:32',
		            'password' => 'required|min:6|max:32'
		);

		if (Input::server("REQUEST_METHOD") == "GET"){
			$user = unserialize(serialize(Session::get('nfuser')));
			if(empty($user)) {
	                                    return View::make('users/login')->with('pagetitle','Login');
			} else {
				return Redirect::to('user/main');
			}	
		} else if (Input::server("REQUEST_METHOD") == "POST"){
			$validator = Validator::make(Input::all(),$rules);
			if($validator->fails()){
		                $messages = $validator->messages();
		                return Redirect::to('user/login')->withErrors($messages)->withInput();
		            } else {		
		            	$username = Input::get('username');
		            	$password =  Input::get('password');
		            	$user = Users::where('username','=',$username)->get();
		            	if(count($user)>0 && Hash::check($password, $user[0]->password)) {
		            			 Session::put('nfuser',$user);
		            			 return Redirect::to('user/main');
		            	} else {
		            		$messages = array(
				                   array('Please check your username or password ')
				 	);
		            		return Redirect::to('user/login')->withErrors($messages)->withInput();
	            		}
	            		return "Error";		            	
		            }
		} else {
			return View::make('index')->with('pagetitle','Home');
		}		
	}

	public function logoutAction() {	
		Session::flush();
		return Redirect::to('/');
	}

	public function mainAction() {	
		$user = unserialize(serialize(Session::get('nfuser')));
		if(empty($user)) {
                                    return Redirect::to('user/login');
		} else {
			return View::make('users/main')->with('user',$user)->with('pagetitle','Member : '.$user[0]->username);
		}
	}
}