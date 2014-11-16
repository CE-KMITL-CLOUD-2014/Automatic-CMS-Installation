<?php

class SiteCreateTest extends TestCase {

	//DEFINE 
	static private $sitename = 'test-site-create';

	/**
	 * A basic functional test example.
	 *
	 * 
	 */
	
	//Login test user
	public function loginForCreate()
	{
		//Login
		printf('%s%c','### Login test user ###',10);

		//Submit login form 'email' => 'test@nfsite.me', 'password' => 'password'
		$this->call('POST', '/user/login', array('email' => 'test@nfsite.me', 'password' => 'password'));
		printf('%s%c','>Request("POST", "/user/login", array(test@nfsite.me, password)',10);

		//Assert a redirect
		$this->assertRedirectedTo('/site/manage');
		printf('%s%c','>RedirecTo("/site/manage"); (Test OK)',10);

		//follow redirect
		$this->client->followRedirect();

		// Assert a specific 200 status code (site manage page OK)
		$this->assertResponseOk();
		printf('%s%c','>status code is 200 (Test OK)',10);

		$client = static::createClient();

		//follow redirect
		$crawler = $client->request('GET', '/site/create');
		printf('%s%c','>Request("GET", "/site/create")',10);

		//Assert get site create page is OK
		$this->assertTrue($this->client->getResponse()->isOk());
		printf('%s%c','>status code is 200 (Test OK)',10);
		
		printf('%s%c','Login user:test@nfsite.me, pass:password',10);
		printf('%s%c','Page='.$crawler->filter('title')->first()->text(),10);

		return array($crawler,$client);
	}
	
	//(1)Test request site create page without login
	public function testRequestSiteCreatePageUnlogin()
	{
		printf('%s%c','(1)testRequestSiteCreatePageUnlogin',10);
		//Request site create page
		$response = $this->call('GET', '/site/create');
		printf('%s%c','>Request("GET", "/site/create")',10);

		//Assert redirected to /user/login, not login
		$this->assertRedirectedTo('/user/login');
		printf('%s%c','>RedirecTo("/user/login"); (Test OK)',10);

		//follow redirect to user login
		$crawler = $this->client->followRedirect();
		printf('%s%c','Page='.$crawler->filter('title')->first()->text(),10);

		// Assert a specific 200 status code (user login page OK)
		$this->assertResponseOk();
		printf('%s%c','>status code is 200 (Test OK)',10);
		
		printf('%s%c','----------------------------------------',10);
	}
	
	//(2)Test request site create page with login
	public function testRequestSiteCreatePageLogin()
	{
		printf('%s%c','(2)testRequestSiteCreatePageLogin',10);

		//Login username=test@nfsite.me password=password
		SiteCreateTest::loginForCreate();

		printf('%s%c','----------------------------------------',10);
	}
	
	//(3)Test checking site name that nobody use
	public function testSitenameCheckNobodyUse()
	{
		printf('%s%c','(3)testSitenameCheckNobodyUse',10);
		
		//Login username=test@nfsite.me password=password
		$loginCreate = SiteCreateTest::loginForCreate();
		$crawler = $loginCreate[0];
		
		$token = $crawler->filter("input[name='_token']")->attr('value');
		printf('%s%c','sitename = nobody-sitename.nf.cz.cc',10);

		$crawler = $this->client->request('POST', '/site/check',array('_token' => $token,'sitename' => 'nobody-sitename','domain_id' => '1',));
		printf('%s%c','>Request("POST", "/site/check", array(sitename, domain_id)',10);

		$temp = json_decode($this->client->getResponse()->getContent());

		$this->assertEquals('ok',$temp->status);
		printf('%s%c','Status='.$temp->status.', Message="'.$temp->message.'" (Test OK)',10);
		
		printf('%s%c','----------------------------------------',10);
	}
	
	//(4)Test checking sit name that has use
	public function testSitenameCheckHasUse()
	{
		printf('%s%c','(4)testSitenameCheckHasUse',10);
		
		//Login username=test@nfsite.me password=password
		$loginCreate = SiteCreateTest::loginForCreate();
		$crawler = $loginCreate[0];
		
		//Get siteName token
		$token = $crawler->filter("form[name='siteName'] > input[name='_token']")->attr('value');
		printf('%s%c','sitename = test-wp-01.nf.cz.cc',10);

		//Request sitename JSON
		$crawler = $this->client->request('POST', '/site/check',array('_token' => $token,'sitename' => 'test-wp-01','domain_id' => '1',));
		printf('%s%c','>Request("POST", "/site/check", array(repeat-sitename, domain_id)',10);

		//Get status site name is JSON object
		$temp = json_decode($this->client->getResponse()->getContent());
		
		//Assert status equals error
		$this->assertEquals('error',$temp->status);
		printf('%s%c','Status='.$temp->status.', Message="'.$temp->message.'" (Test OK)',10);
		
		printf('%s%c','----------------------------------------',10);
	}

	//(5)Test site form
	public function testSiteform()
	{
		printf('%s%c','(5)testSiteform',10);

		//Clear error create website
		SiteCreateTest::deleteFalseSite();
		
		//Login username=test@nfsite.me password=password
		$loginCreate = SiteCreateTest::loginForCreate();
		$crawler = $loginCreate[0];
		
		// ### Check site name ###
		printf('%s%c','### Check site name ###',10);
		$tokenSName = $crawler->filter("form[name='siteName'] > input[name='_token']")->attr('value');

		$this->client->request(
			'POST', 
			'/site/check',
			array('_token' => $tokenSName,'sitename' => SiteCreateTest::$sitename,'domain_id' => '1',)
			);
		printf('%s%c','>Request("POST", "/site/check", array(sitename, domain_id)',10);
		printf('%s%c','sitename="'.SiteCreateTest::$sitename.'.nf.cz.cc"',10);

		$temp = json_decode($this->client->getResponse()->getContent());

		$this->assertEquals('ok',$temp->status);
		printf('%s%c','Status='.$temp->status.', message="'.$temp->message.'"',10);
		
		// ### Check site setting ###
		printf('%s%c','### Check site setting ###',10);
		$tokenCreateS = $crawler->filter("form[name='createSite'] > input[name='_token']")->attr('value');

		// --- Test No site title ---
		printf('%s%c','--- Test No site title ---',10);
		$this->client->request(
			'POST', 
			'/site/create',
			array(
				'_token' => $tokenCreateS,
				'sitetitle' => '',
				'email' => 'test@nfsite.me',
				'username' => 'admin',
				'password' => 'password',
				'password_confirmation' => 'password',
				'sitename' => SiteCreateTest::$sitename,
				'domain_id' => '1',
				'domain_name' => 'nf.cz.cc',
				'CMS-Selected' => 'wordpress',
				'nfurl' => 'https://23.101.23.61')
			);
		printf('%s%c','>Request("POST", "/site/create", array(noSiteTitle)',10);

		$temp = json_decode($this->client->getResponse()->getContent());
		printf('%s%c','Status='.$temp->status.', message="'.$temp->message.'" (Test OK)',10);

		$this->assertEquals('error',$temp->status);

		// --- Test No email ---
		printf('%s%c','--- Test No email ---',10);
		$this->client->request(
			'POST', 
			'/site/create',
			array(
				'_token' => $tokenCreateS,
				'sitetitle' => 'Test Form',
				'email' => '',
				'username' => 'admin',
				'password' => 'password',
				'password_confirmation' => 'password',
				'sitename' => SiteCreateTest::$sitename,
				'domain_id' => '1',
				'domain_name' => 'nf.cz.cc',
				'CMS-Selected' => 'wordpress',
				'nfurl' => 'https://23.101.23.61')
			);
		printf('%s%c','>Request("POST", "/site/create", array(noEmail)',10);

		$temp = json_decode($this->client->getResponse()->getContent());
		printf('%s%c','Status='.$temp->status.', message="'.$temp->message.'" (Test OK)',10);

		$this->assertEquals('error',$temp->status);

		// --- Test No username ---
		printf('%s%c','--- Test No username ---',10);
		$this->client->request(
			'POST', 
			'/site/create',
			array(
				'_token' => $tokenCreateS,
				'sitetitle' => 'Test Form',
				'email' => 'test@nfsite.me',
				'username' => '',
				'password' => 'password',
				'password_confirmation' => 'password',
				'sitename' => SiteCreateTest::$sitename,
				'domain_id' => '1',
				'domain_name' => 'nf.cz.cc',
				'CMS-Selected' => 'wordpress',
				'nfurl' => 'https://23.101.23.61')
			);
		printf('%s%c','>Request("POST", "/site/create", array(noUsername)',10);

		$temp = json_decode($this->client->getResponse()->getContent());
		printf('%s%c','Status='.$temp->status.', message="'.$temp->message.'" (Test OK)',10);

		$this->assertEquals('error',$temp->status);

		// --- Test No password ---
		printf('%s%c','--- Test No password ---',10);
		$this->client->request(
			'POST', 
			'/site/create',
			array(
				'_token' => $tokenCreateS,
				'sitetitle' => 'Test Form',
				'email' => 'test@nfsite.me',
				'username' => 'admin',
				'password' => '',
				'password_confirmation' => 'password',
				'sitename' => SiteCreateTest::$sitename,
				'domain_id' => '1',
				'domain_name' => 'nf.cz.cc',
				'CMS-Selected' => 'wordpress',
				'nfurl' => 'https://23.101.23.61')
			);
		printf('%s%c','>Request("POST", "/site/create", array(noPassword)',10);

		$temp = json_decode($this->client->getResponse()->getContent());
		printf('%s%c','Status='.$temp->status.', message="'.$temp->message.'" (Test OK)',10);

		$this->assertEquals('error',$temp->status);

		// --- Test No password_confirmation ---
		printf('%s%c','--- Test No password_confirmation ---',10);
		$this->client->request(
			'POST', 
			'/site/create',
			array(
				'_token' => $tokenCreateS,
				'sitetitle' => 'Test Form',
				'email' => 'test@nfsite.me',
				'username' => 'admin',
				'password' => 'password',
				'password_confirmation' => '',
				'sitename' => SiteCreateTest::$sitename,
				'domain_id' => '1',
				'domain_name' => 'nf.cz.cc',
				'CMS-Selected' => 'wordpress',
				'nfurl' => 'https://23.101.23.61')
			);
		printf('%s%c','>Request("POST", "/site/create", array(noPassword_confirm)',10);

		$temp = json_decode($this->client->getResponse()->getContent());
		printf('%s%c','Status='.$temp->status.', message="'.$temp->message.'" (Test OK)',10);

		$this->assertEquals('error',$temp->status);
		
		// --- All value OK ---
		printf('%s%c','--- All value OK ---',10);
		$this->client->request(
			'POST', 
			'/site/create',
			array(
				'_token' => $tokenCreateS,
				'sitetitle' => 'Test Form',
				'email' => 'test@nfsite.me',
				'username' => 'admin',
				'password' => 'password',
				'password_confirmation' => 'password',
				'sitename' => SiteCreateTest::$sitename,
				'domain_id' => '1',
				'domain_name' => 'nf.cz.cc',
				'CMS-Selected' => 'wordpress',
				'nfurl' => 'https://23.101.23.61')
			);
		printf('%s%c','>Request("POST", "/site/create", array(allValueOK)',10);

		$temp = json_decode($this->client->getResponse()->getContent());

		printf('%s%c','Status='.$status=$temp->status.', message="'.$temp->message.'", sid='.$temp->params->sid,10);
		printf('%s%c','install_token='.$temp->params->install_token,10);

		$this->assertEquals('ok',$temp->status);
		printf('%s%c','(Test OK)',10);
		
		printf('%s%c','----------------------------------------',10);

		//Delete test web for test create web site
		SiteCreateTest::deleteFalseSite();
	}

	//(6)Install step 1 : create azure website
	public function testCreateWebsite()
	{
		printf('%s%c','(6)testCreateWebsite',10);

		//Login username=test@nfsite.me password=password
		$loginCreate = SiteCreateTest::loginForCreate();
		$crawler = $loginCreate[0];
		$client = $loginCreate[1];

		// ### Submit site name ###
		printf('%s%c','### Submit site name ###',10);
		$tokenSName = $crawler->filter("form[name='siteName'] > input[name='_token']")->attr('value');

		$this->client->request(
			'POST', 
			'/site/check',
			array('_token' => $tokenSName,'sitename' => SiteCreateTest::$sitename,'domain_id' => '1',)
			);
		printf('%s%c','>Request("POST", "/site/check", array(sitename, domain_id)',10);
		printf('%s%c','sitename="'.SiteCreateTest::$sitename.'.nf.cz.cc"',10);

		$temp = json_decode($this->client->getResponse()->getContent());

		$this->assertEquals('ok',$temp->status);
		printf('%s%c','Status='.$temp->status.', message="'.$temp->message.'"',10);
		
		// ### Submit site setting ###
		printf('%s%c','### Submit site setting ###',10);
		$tokenCreateS = $crawler->filter("form[name='createSite'] > input[name='_token']")->attr('value');

		$this->client->request(
			'POST', 
			'/site/create',
			array(
				'_token' => $tokenCreateS,
				'sitetitle' => 'Test Form',
				'email' => 'test@nfsite.me',
				'username' => 'admin',
				'password' => 'password',
				'password_confirmation' => 'password',
				'sitename' => SiteCreateTest::$sitename,
				'domain_id' => '1',
				'domain_name' => 'nf.cz.cc',
				'CMS-Selected' => 'wordpress',
				'nfurl' => 'https://23.101.23.61')
			);
		printf('%s%c','>Request("POST", "/site/create", array(allValueOK)',10);

		$temp = json_decode($this->client->getResponse()->getContent());
		
		printf('%s%c','Status='.$temp->status.', message="'.$temp->message.'"',10);
		printf('%s%c','sid='.$temp->params->sid.', install_token='.$temp->params->install_token,10);
		
		//Install Step 1 : create azure website
		if($temp->status=='ok')
		{
			printf('%s%c','### Install Step1 : create azure website ###',10);
			$this->client->request(
				'POST', 
				'/site/install',
				array(
					'step' => 1,
					'sid' => $temp->params->sid,
					'install_token' => $temp->params->install_token)
			);
			printf('%s%c','>Request("POST", "/site/install", array(step1, sid)',10);

			$temp = json_decode($this->client->getResponse()->getContent());

			printf('%s%c','Status='.$temp->status.', message="'.$temp->message.'"',10);

			$this->assertEquals('ok',$temp->status);
			printf('%s%c','>status code is 200 (Test OK)',10);
		}
		
		printf('%s%c','----------------------------------------',10);

		//Delete test web for test create web site
		SiteCreateTest::deleteFalseSite();
	}

	//Method clear web site
	private function deleteFalseSite()
	{
		printf('%s%c','### Clear test web site ###',10);
		$site = Site::all();
		$count_data = 0;

		for($i=0;$i<count($site);$i++) {
			$sid = $site[$i]->sid;
			$step = $site[$i]->step1.$site[$i]->step2.$site[$i]->step3.$site[$i]->step4.$site[$i]->step5.$site[$i]->step6;

			if($step != '111111') {
				$count_data++;
				//print_r($site[$i]);
				printf('%s%c','sid:'.$site[$i]->sid.', sitename:'.$site[$i]->name,10);
				printf('%s%c','step:'
					.$site[$i]->step1
					.$site[$i]->step2
					.$site[$i]->step3
					.$site[$i]->step4
					.$site[$i]->step5
					.$site[$i]->step6.', token:'.$site[$i]->install_token,10);
				printf('%s%c','~~~~~~~~~~~~~~~~~~',10);
				SiteController::confirmDeleteSite($sid);
				//ob_flush();
				/*$data[] = array(
				'sid' => $sid,
				'step' => $step,
				'diff' => $diff
				);*/
			}
		}

		if($count_data == 0) {
			printf('%s%c','There are not any sites to delete.',10);
		} else {
			printf('%s%c','There are '.$count_data.' sites having been deleted.',10);
		}
		printf('%s%c','~~~~~~~~~~~~~~~~~~',10);
	}
}