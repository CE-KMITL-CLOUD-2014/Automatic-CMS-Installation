<?php

class LoginTest extends TestCase {

	//(1)Test get page Login
	public function testRequestLoginPage()
	{
		printf('%s%c','(1)Test get page Login',10);

		$client = static::createClient();

		// Request page GET method /user/register
		$crawler = $client->request('GET', '/user/login');
		printf('%s%c','>Request("GET", "/user/login")',10);

		// Assert a specific 200 status code
		$this->assertTrue($client->getResponse()->isOk());
		printf('%s%c','>status code is 200 (Test OK)',10);

		// Assert that the response status code is 2xx
		$this->assertTrue($client->getResponse()->isSuccessful());
		printf('%s%c','>status code is 2xx (Test OK)',10);

		// Assert a specific 404 status code
		$this->assertFalse($client->getResponse()->isNotFound());
		printf('%s%c','>status code is not 404 (Test OK)',10);

		$this->assertEquals('Login | Automatic CMS Installation Service', 
			$crawler->filter('title')->first()->text());
		printf('%s%c','Page = '.$crawler->filter('title')->first()->text().' (Test OK)',10);
		
		printf('%s%c','----------------------------------------',10);
	}

	//(2)Test login by true Username and Password
	public function testSubmitLoginTrueUP()
	{
		printf('%s%c','(2)Test login by true Username and Password',10);

		//Submit signup form
		$this->call('POST', '/user/login', array('email' => 'test@nfsite.me', 'password' => 'password'));
		printf('%s%c','>Request("POST", "/user/login", array(test@nfsite.me, password)',10);
		
		//follow redirect
		$this->assertRedirectedTo('/site/manage');
		printf('%s%c','>RedirecTo("/site/manage"); (Test OK)',10);

		//follow redirect
		$this->client->followRedirect();

		// Assert a specific 200 status code (site manage page OK)
		$this->assertResponseOk();
		printf('%s%c','>status code is 200 (Test OK)',10);
		
		printf('%s%c','----------------------------------------',10);
	}

	//(3)Test login by false Username
	public function testSubmitLoginFalseU()
	{
		printf('%s%c','(3)Test login by false Username',10);

		//Submit signup form
		$this->call('POST', '/user/login', array('email' => 'false@email.me', 'password' => 'password'));
		printf('%s%c','>Request("POST", "/user/login", array(false@email.me, password)',10);

		//follow redirect
		$this->assertRedirectedTo('/user/login');
		printf('%s%c','>RedirecTo("/user/login"); (Test OK)',10);

		//Assert a session has error username false
		$this->assertSessionHasErrors();
		printf('%s%c','>Session has error (Test OK)',10);
		
		printf('%s%c','----------------------------------------',10);
	}

	//(4)Test login by false Password
	public function testSubmitLoginFalseP()
	{
		printf('%s%c','(4)Test login by false Password',10);

		//Submit signup form
		$this->call('POST', '/user/login', array('email' => 'test@nfsite.me', 'password' => 'failspassword'));
		printf('%s%c','>Request("POST", "/user/login", array(test@nfsite.me, failspassword)',10);

		//follow redirect
		$this->assertRedirectedTo('/user/login');
		printf('%s%c','>RedirecTo("/user/login"); (Test OK)',10);

		//Assert a session has error password false
		$this->assertSessionHasErrors();
		printf('%s%c','>Session has error (Test OK)',10);
		
		printf('%s%c','----------------------------------------',10);
	}
}