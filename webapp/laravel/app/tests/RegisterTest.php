<?php

class RegisterTest extends TestCase {

	//(1)Test get page Register 
	public function testRequestRegisterPage()
	{	
		printf('%s%c','(1)Test get page Register',10);

		$client = static::createClient();

		// Request page GET method /user/register
		$crawler = $client->request('GET', '/user/register');
		printf('%s%c','>Request("GET", "/user/register")',10);

		// Assert a specific 200 status code
		$this->assertTrue($client->getResponse()->isOk());
		printf('%s%c','>status code is 200 (Test OK)',10);

		// Assert that the response status code is 2xx
		$this->assertTrue($client->getResponse()->isSuccessful());
		printf('%s%c','>status code is 2xx (Test OK)',10);

		// Assert a specific 404 status code
		$this->assertFalse($client->getResponse()->isNotFound());
		printf('%s%c','>status code is not 404 (Test OK)',10);
		
		$this->assertEquals('Register | Automatic CMS Installation Service', 
			$crawler->filter('title')->first()->text());
		printf('%s%c','Page = '.$crawler->filter('title')->first()->text().' (Test OK)',10);

		printf('%s%c','----------------------------------------',10);
	}

	//Test submit register
	public function testSubmitRegisterForm()
	{
		printf('%s%c','(2)Test submit register',10);

		$client = static::createClient();

		//### Submit signup form with true value ###
		printf('%s%c','### Submit signup form with true value ###',10);
		$crawler = $client->request('POST', '/user/register', array('fullname' => 'Super Man', 'email' => 'test@nf.me', 'password' => 'password', 'password_confirmation' => 'password'));
		printf('%s%c','>Request("POST", "/user/register", array(fullname, email, password, password_cf)',10);

		//follow redirect
		$crawler = $client->followRedirect();
		printf('%s%c','>RedirecTo("/user/confirm")',10);

		//Assert page equal confirm page
		$this->assertEquals(1, $crawler->filter('section#confirm')->count());
		printf('%s%c','Page = '.$crawler->filter('title')->first()->text().' (Test OK)',10);

		// --- Test form rule ---

		//### Submit signup form has fullname only ###
		printf('%s%c','### Submit signup form has fullname only ###',10);
		$crawler = $client->request('POST', '/user/register', array('fullname' => 'Super Man'));
		printf('%s%c','>Request("POST", "/user/register", array(fullname))',10);
		//follow redirect
		$crawler = $client->followRedirect();
		printf('%s%c','>RedirecTo("/user/register")',10);
		//Assert a session has error
		$this->assertSessionHasErrors();
		printf('%s%c','>Session has error (Test OK)")',10);

		//### Submit signup form has email only ###
		printf('%s%c','### Submit signup form has email only ###',10);
		$crawler = $client->request('POST', '/user/register', array('email' => 'test@nf.me'));
		printf('%s%c','>Request("POST", "/user/register", array(email))',10);
		//follow redirect
		$crawler = $client->followRedirect();
		printf('%s%c','>RedirecTo("/user/register")',10);
		//Assert a session has error
		$this->assertSessionHasErrors();
		printf('%s%c','>Session has error (Test OK)")',10);

		//### Submit signup form has password only ###
		printf('%s%c','### Submit signup form has password only ###',10);
		$crawler = $client->request('POST', '/user/register', array('password' => 'password'));
		printf('%s%c','>Request("POST", "/user/register", array(password))',10);
		//follow redirect
		$crawler = $client->followRedirect();
		printf('%s%c','>RedirecTo("/user/register")',10);
		//Assert a session has error
		$this->assertSessionHasErrors();
		printf('%s%c','>Session has error (Test OK)")',10);

		//### Submit signup form has password confirm only ###
		printf('%s%c','### Submit signup form has password confirm only ###',10);
		$crawler = $client->request('POST', '/user/register', array('password_confirmation' => 'password'));
		printf('%s%c','>Request("POST", "/user/register", array(password_confirmation))',10);
		//follow redirect
		$crawler = $client->followRedirect();
		printf('%s%c','>RedirecTo("/user/register")',10);
		//Assert a session has error
		$this->assertSessionHasErrors();
		printf('%s%c','>Session has error (Test OK)")',10);

		//### Submit signup form has email repeat ###
		printf('%s%c','### Submit signup form has email repeat ###',10);
		$crawler = $client->request('POST', '/user/register', array('fullname' => 'Super Man', 'email' => 'test@nf.me', 'password' => 'password', 'password_confirmation' => 'password'));
		printf('%s%c','>Request("POST", "/user/register", array(fullname, email, password, password_cf)) ***email repeat',10);
		//follow redirect
		$crawler = $client->followRedirect();
		printf('%s%c','>RedirecTo("/user/register")',10);
		//Assert a session has error
		$this->assertSessionHasErrors();
		printf('%s%c','>Session has error (Test OK)")',10);

		RegisterTest::submitRegisterDelete();

		printf('%s%c','----------------------------------------',10);

		
	}

	//Test confirmation is not confirm
	public function testSubmitRegisterNotConfirm()
	{
		printf('%s%c','(3)Test confirmation is not confirm',10);

		$client = static::createClient();

		//Submit signup form
		printf('%s%c','### Submit signup form with true value ###',10);
		$crawler = $client->request('POST', '/user/register', array('fullname' => 'Super Man', 'email' => 'test@nf.me', 'password' => 'password', 'password_confirmation' => 'password'));
		printf('%s%c','Name:Super Man, Username:test@nf.me, Password:password',10);
		printf('%s%c','>Request("POST", "/user/register", array(fullname, email, password, password_cf)',10);

		//follow redirect
		$crawler = $client->followRedirect();
		printf('%s%c','>RedirecTo("/user/confirm")',10);

		//Assert page equal confirm page
		$this->assertEquals(1, $crawler->filter('section#confirm')->count());
		printf('%s%c','Page = '.$crawler->filter('title')->first()->text().' (Test OK)',10);

		//### Check user test@nfme is not confirm yet ###
		printf('%s%c','### Check user test@nfme is not confirm yet ###',10);
		$user = User::where('email','=','test@nf.me')->get();

		//Assert a status is not confirm
		$this->assertEquals(0,$user[0]->status_confirm);
		printf('%s%c','>DB::User("email" = "test@nf.me") == 0 ; (Test OK)',10);

		RegisterTest::submitRegisterDelete();

		printf('%s%c','----------------------------------------',10);

	}

	//Test confirm code
	public function testSubmitRegisterConfirmCode()
	{
		printf('%s%c','(4)Test confirm code',10);

		$client = static::createClient();

		//Submit signup form
		printf('%s%c','### Submit signup form with true value ###',10);
		$crawler = $client->request('POST', '/user/register', array('fullname' => 'Super Man', 'email' => 'test@nf.me', 'password' => 'password', 'password_confirmation' => 'password'));
		printf('%s%c','Name:Super Man, Username:test@nf.me, Password:password',10);
		printf('%s%c','>Request("POST", "/user/register", array(fullname, email, password, password_cf)',10);

		//follow redirect
		$crawler = $client->followRedirect();
		printf('%s%c','>RedirecTo("/user/confirm")',10);

		//Assert page equal confirm page
		$this->assertEquals(1, $crawler->filter('section#confirm')->count());
		printf('%s%c','Page = '.$crawler->filter('title')->first()->text().' (Test OK)',10);

		//### Check confirm code of user test#nf.me ###
		printf('%s%c','### Check confirm code of user test#nf.me ###',10);
		$user = User::where('email','=','test@nf.me')->get();

		// Request page GET method /user/register
		$crawler = $client->request('GET','/user/confirm/'.$user[0]->confirm_code);
		printf('%s%c','>Request("POST", "/user/confirm/'.$user[0]->confirm_code.'"',10);

		//follow redirect
		$crawler = $client->followRedirect();
		printf('%s%c','>RedirecTo("/user/login")',10);

		// Assert a specific 200 status code
		$this->assertTrue($client->getResponse()->isOk());
		printf('%s%c','>status code is 200 (Test OK)',10);
		
		//Assert a session has nf_confirm
		$this->assertSessionHas('nf_confirm');
		printf('%s%c','>Session has "nf_confirm" (Test OK)")',10);

		$user = User::where('email','=','test@nf.me')->get();
		
		//Assert a status_confirm equal 1
		$this->assertEquals(1,$user[0]->status_confirm);
		printf('%s%c','status_confirm == 1 ; (Test OK)")',10);

		RegisterTest::submitRegisterDelete();

		printf('%s%c','----------------------------------------',10);
	}

	//Delete user for test
	private function submitRegisterDelete()
	{
		printf('%s%c','### Delete user for test ###',10);

		$user = User::where('email','=','test@nf.me')->get();
		$user[0]->delete();

		printf('%s%c','>user:test@nf.me was delete',10);
	}

}
