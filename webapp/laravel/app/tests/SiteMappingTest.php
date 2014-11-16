<?php

class SiteMappingTest extends TestCase {

	//DEFINE 
	static private $sitename = 'test-mapping';

	/**
	 * A basic functional test example.
	 *
	 * 
	 */

	//Login test user
	private function loginForCreate()
	{
		//### Login ###
		printf('%s%c','### Login ###',10);
		printf('%s%c','Login user:test@nfsite.me, pass:password',10);

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
		
		printf('%s%c','Page='.$crawler->filter('title')->first()->text(),10);

		return array($crawler,$client);
	}

	//Test Install step 2 : mapping domain name
	public function testMappingDomain()
	{
		printf('%s%c','Test Install step 2 : mapping domain name',10);

		//Clear web site
		SiteMappingTest::deleteFalseSite();

		//Login username=test@nfsite.me password=password
		$loginCreate = SiteMappingTest::loginForCreate();
		$crawler = $loginCreate[0];
		$client = $loginCreate[1];
		printf('%s%c','~~~~~~~~~~~~~~~~~~',10);

		//### Create ###
		printf('%s%c','### Create ###',10);

		//Select form id=createsiteForm
		$form = $crawler->filter('form#createsiteForm')->form();
		$input = array(
				'sitetitle' => 'Test Site Mapping',
				'email' => 'test@nfsite.me',
				'username' => 'admin',
				'password' => 'password',
				'password_confirmation' => 'password',
				'sitename' => SiteMappingTest::$sitename,
				'domain_id' => '1',
				'domain_name' => 'nf.cz.cc',
				'CMS-Selected' => 'wordpress',
				'nfurl' => 'https://23.101.23.61'
		);
		printf('%s%c','>Request("POST", "/site/create", array(allValueOK)',10);

		//Submit form
		$crawler = $client->submit($form, $input);

		// Assert a specific 200 status code (submit form for create is OK)
		$this->assertResponseOk();
		printf('%s%c','>status code is 200 (Test OK)',10);
		
		//Response JSON and decode JSON
		$tempInstall = json_decode($client->getResponse()->getContent());
		printf('%s%c','Status='.$tempInstall->status.', message="'.$tempInstall->message.'", sid='.$tempInstall->params->sid,10);
		printf('%s%c','install_token='.$tempInstall->params->install_token,10);

		//Assert response status is ok
		$this->assertEquals('ok',$tempInstall->status);
		printf('%s%c','(Test OK)',10);

		printf('%s%c','~~~~~~~~~~~~~~~~~~',10);

		//### Install Step 1 : create azure website ###
		printf('%s%c','### Install Step 1 : create azure website ###',10);

		$crawler = $client->request(
				'POST', 
				'/site/install',
				array(
					'step' => 1,
					'sid' => $tempInstall->params->sid,
					'install_token' => $tempInstall->params->install_token)
		);
		printf('%s%c','>Request("POST", "/site/install", array(step1, sid)',10);

		// Assert a specific 200 status code (request install step 1 is OK)
		$this->assertResponseOk();
		printf('%s%c','>status code is 200 (Test OK)',10);

		$temp = json_decode($client->getResponse()->getContent());
		printf('%s%c','Status='.$temp->status.', message="'.$temp->message.'" (Test OK)',10);
		
		//Assert response status is ok
		$this->assertEquals('ok',$temp->status);

		printf('%s%c','~~~~~~~~~~~~~~~~~~',10);

		//### Install Step 2 : mapping domain name ###
		printf('%s%c','### Install Step 2 : mapping domain name ###',10);

		$crawler = $client->request(
				'POST', 
				'/site/install',
				array(
					'step' => 2,
					'sid' => $tempInstall->params->sid,
					'install_token' => $tempInstall->params->install_token)
		);
		printf('%s%c','>Request("POST", "/site/install", array(step2, sid)',10);

		// Assert a specific 200 status code (request install step 2 is OK)
		$this->assertResponseOk();
		printf('%s%c','>status code is 200 (Test OK)',10);

		$temp = json_decode($client->getResponse()->getContent());
		printf('%s%c','Status='.$temp->status.', message="'.$temp->message.'" (Test OK)',10);
		
		//Assert response status is ok
		$this->assertEquals('ok',$temp->status);

		printf('%s%c','~~~~~~~~~~~~~~~~~~',10);
		
		SiteMappingTest::deleteFalseSite();
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
		printf('%s%c','----------------------------------------',10);
	}

}