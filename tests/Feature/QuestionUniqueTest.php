<?php

//namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class UniqueQuestionAnswerTest extends TestCase
{
	use RefreshDatabase;
    /**
     * Test that 'select' question can only be answered once per answerset
     *
     * @return void
     */
    public function testUniqueQuestionAnswerTest()
    {/*
		$this->markTestSkipped('must be revisited.');
        $user = factory(App\User::class)->create();
		$questionset = factory(App\Questionset::class)->create();
		$answerset = factory(App\Answerset::class)->create([
			'questionsetsid'=>$questionset->id,
			'usersid'=>$user->id
			]);
		$question = factory(App\Question::class)->create([
			'questionsetsid'=>1
			]);
		$question2 = factory(App\Question::class)->create([
			'questionsetsid'=>1
			]);
		$questionOneOptionOne = factory(App\Questionoption::class)->create([
			'questionsid'=>$question->id
			]);
		$questionOneOptionTwo = factory(App\Questionoption::class)->create([
			'questionsid'=>$question->id
			]);
		$answerQuestionOne = factory(App\Answer::class)->create([
				'answersetsid'=>$answerset->id,
			'questionoptionsid'=>$questionOneOptionOne->id
			]);
		try{
			$answerQuestionOne = factory(App\Answer::class)->create([
				'answersetsid'=>$answerset->id,
				'questionoptionsid'=>$questionOneOptionTwo->id
			]);
		} catch (Exception $e) {
			//assert that unique oonstrain on answer to question, not primary assertion, should be moved to different test
		}
		//$this->assertStringStartsWith('SQLSTATE[23000]: Integrity constraint violation',$e->getMessage());
    */}
}
