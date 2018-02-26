<?php

//namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginSuccessTest extends TestCase
{
	use RefreshDatabase;
    /**
     * Test that if questions are answered the user will see their most recent answerset on the view page.
     *
     * @return void
     */
    public function testLoginSuccessTest()
    {/*
		$this->markTestSkipped('must be revisited.');
        $user = factory(App\User::class)->create();
        $response = $this->actingAs($user)
                         ->withSession([])
                         ->get('/home');
						 
		$this->followRedirects($response)->assertSee('You are logged in!');
						 /*post('/login', [
			'email' => $user->email,
			'password' => $user->password,
			'_token' => csrf_token()])->assertRedirect('home');*/
		/*$this->visit(route('login'));
		$this->assertSee('You are logged in!');
		 Session::start();
		$response = $this->call('POST', '/login', [
			'email' => $user->email,
			'password' => $user->password,
			'_token' => csrf_token()
		]);
		$this->followRedirects($response)->assertSee('You are logged in!');
		*/
		//$this->assertEquals(200, $response->getStatusCode());
		//$this->assertEquals('auth.login', print_r($response,true));
		//$page = $this->actingAs($user)->get('/');
		//$this->assertEquals($answerset->id,$answerQuestionTwo->answersetsid);
		//$questionsetTwo = factory(App\Questionset::class)->create();
		
		//$questionOne = factory(App\Question::class)->create(['questionsetsid'=>$questionset->id]);
		//$questionTwo = factory(App\Question::class)->create(['questionsetsid'=>$questionset->id]);
		//$this->assertEquals($questionsetTwo->id,5);
		//$this->assertEquals($questionset->id,$questionOne->questionsetsid);
		//$this->assertEquals($questionsetTwo->id,$questionset->id);
		//$questionOneOptionOne = factory(App\QuestionOption::class)->make();
		//$questionOneOptionTwo = factory(App\QuestionOption::class)->make();
		/*$questionSet = factory(QuestionSet::class)->create(['name'=>'Happiness Index Questions']);
		$questionOne = facotory(Question::class)->create([
			'question'=>'How do you currently feel?'
			'questionsetsid'=>$questionSet->getId();
			'questiontype'=>'select'
			]);
		$
		$questions = factory()
		$responses = factory(ResponseSet::class)->load(['])

        $response->assertStatus(200);*/
    }
}
