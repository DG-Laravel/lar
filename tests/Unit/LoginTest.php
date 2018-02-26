<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
//use PHPUnit\Framework\TestCase;
//use PHPUnit\DbUnit\TestCaseTrait;

class LoginPageTest extends TestCase
{
	use DatabaseMigrations;
    /**
     * Test that the login form exists
	 * test that the database exists
	 * test that the User table exists
     * test that a login that does not exist will not succeed
     * test that registration is successful
     * test that login with a login that does exist will be successful
     *
     * @return void
     */
	 //		$response = $this->call($method, $uri, $parameters, $files, $server, $content);
    public function testLoginPageTest()
    {
		//$user = factory(User::class)->create(['name'=>'testuser']);
		$this->get('/')
             ->assertSee('Login')
			 ->assertSee('Register');
		//$response = $this->action('GET', 'HomeController@index')->getContent();	
		//$this->assertEquals(__DIR__, $response);
		//$this->assertEquals('Hello World', $response->getContent());
    }
	
	 public function testRegisterTest()
    {
		//$user = factory(User::class)->create(['name'=>'testuser']);
		$this->get('/')
			 ->assertSee('Register');
		//$response = $this->action('GET', 'HomeController@index')->getContent();	
		//$this->assertEquals(__DIR__, $response);
		//$this->assertEquals('Hello World', $response->getContent());
    }
}
