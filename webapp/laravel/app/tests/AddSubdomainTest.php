<?php

class AddSubdomainTest extends TestCase {

	//DEFINE 
	static private $sitename = 'test-mapping';

	/**
	 * A basic functional test example.
	 *
	 * 
	 */

	 //Login general user
	private function loginGeneralUser()
	{
		//### Login General User###
		printf('%s%c','### Login General User ###',10);

		//Define
		$username = 'test@nfsite.me';
		$password = 'password';

		//Submit login form 'email' => 'test@nfsite.me', 'password' => 'password'
		$this->call('POST', '/user/login', array('email' => $username, 'password' => $password));
		printf('%s%c','>Request("GET", "/user/login")',10);
		printf('%s%c','Login user : '.$username.', pass : '.$password,10);
		
		//Assert a redirect
		$this->assertRedirectedTo('/site/manage');
		printf('%s%c','>RedirectedTO("/site/manage")',10);

		//follow redirect
		$this->client->followRedirect();

		// Assert a specific 200 status code (site manage page OK)
		$this->assertResponseOk();
		
		printf('%s%c','~~~~~~~~~~~~~~~~~~',10);
	}

	//Login admin user
	private function loginAdminUser()
	{
		//### Login Admin User###
		printf('%s%c','### Login ###',10);

		//Define
		$username = 'admintest@nfsite.com';
		$password = 'testadmin456123';

		//Submit login form 'email' => 'test@nfsite.me', 'password' => 'password'
		$this->call('POST', '/user/login', array('email' => $username, 'password' => $password));
		printf('%s%c','>Request("GET", "/user/login")',10);
		printf('%s%c','Login user : '.$username.', pass : '.$password,10);
		
		//Assert a redirect
		$this->assertRedirectedTo('/site/manage');
		printf('%s%c','>RedirectedTO("/site/manage")',10);

		//follow redirect
		$this->client->followRedirect();

		// Assert a specific 200 status code (site manage page OK)
		$this->assertResponseOk();

		printf('%s%c','~~~~~~~~~~~~~~~~~~',10);
	}

	//(1)Test request page without login
	public function testRequestPageWithoutLogin()
	{
		printf('%s%c','(1)Test request page without login',10);
		
		//Request page /admin/domain
		$this->call('GET', '/admin/domain');
		printf('%s%c','>Request("GET", "/admin/domain")',10);

		//Assert a redirect
		$this->assertRedirectedTo('/user/login');
		printf('%s%c','>RedirectedTO("/user/login"), (Test OK)',10);

		//follow redirect
		$this->client->followRedirect();

		// Assert a specific 200 status code (user login page OK)
		$this->assertResponseOk();

		printf('%s%c','----------------------------------------',10);
	}

	//(2)Test request page with general user
	public function testRequestPageWithGeneralUser()
	{
		printf('%s%c','(2)Test request page with general user',10);

		//Login with general user
		AddSubdomainTest::loginGeneralUser();

		printf('%s%c','### Request admin domain page ###',10);

		//Request admin domain page
		$this->call('GET', '/admin/domain');
		printf('%s%c','>Request("GET", "/admin/domain")',10);

		//Assert a redirect
		$this->assertRedirectedTo('/site/manage');
		printf('%s%c','>RedirectedTO("/site/manage")',10);

		//follow redirect
		$this->client->followRedirect();

		// Assert a specific 200 status code (site manage page OK)
		$this->assertResponseOk();

		$client = static::createClient();
		$crawler = $this->client->request('GET', '/site/manage');
		$this->assertTrue($this->client->getResponse()->isOk());

		printf('%s%c','Page = '.$crawler->filter('title')->first()->text().' (Test OK)',10);

		printf('%s%c','----------------------------------------',10);
	}

	//(3)Test request page with admin login
	public function testRequestPageWithAdminUser()
	{
		printf('%s%c','(3)Test request page with admin login',10);

		//Login with general user
		AddSubdomainTest::loginAdminUser();

		printf('%s%c','### Request admin domain page ###',10);

		$client = static::createClient();
		
		//Request admin domain page
		$crawler = $this->client->request('GET', '/admin/domain');
		printf('%s%c','>Request("GET", "/admin/domain")',10);

		// Assert a specific 200 status code (site manage page OK)
		$this->assertTrue($this->client->getResponse()->isOk());

		printf('%s%c','Page = '.$crawler->filter('title')->first()->text().' (Test OK)',10);

		printf('%s%c','----------------------------------------',10);
	}

	//(4)Test add subdomain
	public function testAddSubdomain()
	{
		printf('%s%c','(4)Test add subdomain',10);

		//Define
		$domain_name = 'test-add-subdomain.me';

		//Login with general user
		AddSubdomainTest::loginAdminUser();

		printf('%s%c','### Request admin domain page ###',10);

		$client = static::createClient();
		
		//Request admin domain page
		$crawler = $this->client->request('GET', '/admin/domain');
		printf('%s%c','>Request("GET", "/admin/domain")',10);

		// Assert a specific 200 status code (site manage page OK)
		$this->assertTrue($this->client->getResponse()->isOk());
		
		$token = $crawler->filter("form[name='addDomain'] > input[name='_token']")->attr('value');
		printf('%s%c','Get_token = '.$token,10);

		//Add domain name is not repeat
		printf('%s%c','### Test add domain name is not repeat ###',10);
		$this->call('POST', '/admin/domain/add', array('_token' => $token, 'domain_name' => $domain_name));
		printf('%s%c','>Request("POST", "/addmin/domain/add")',10);
		printf('%s%c','Domain name = '.$domain_name,10);

		//Assert add success
		$this->assertSessionHas('nf_success');
		printf('%s%c','Session has "nf_success" (Test OK)',10);

		//Add domain name is repeat
		printf('%s%c','### Test add domain name is not repeat ###',10);
		$this->call('POST', '/admin/domain/add', array('_token' => $token, 'domain_name' => $domain_name));
		printf('%s%c','>Request("POST", "/addmin/domain/add")',10);
		printf('%s%c','Domain name = '.$domain_name,10);

		//Assert add success
		$this->assertSessionHas('nf_error');
		printf('%s%c','Session has "nf_error" (Test OK)',10);

		printf('%s%c','----------------------------------------',10);
	}

}