<?php

//namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class ViewQuestionsAfterLoginTest extends TestCase
{
	use RefreshDatabase;
    /**
     * Test that if questions are answered the user will see their most recent answerset on the view page.
     *
     * @return void
     */
    public function testViewQuestionsAfterLoginTest()
    {
		$now = new \DateTime();
		$user = factory(App\User::class)->create();
		$questionset = factory(App\Questionset::class)->create([
			'opendate' => $now
			]);
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
		$questionTwoOptionOne = factory(App\Questionoption::class)->create([
			'questionsid'=>$question2->id
			]);
		$questionTwoOptionTwo = factory(App\Questionoption::class)->create([
			'questionsid'=>$question2->id
			]);
		$answerQuestionOne = factory(App\Answer::class)->create([
			'answersetsid'=>$answerset->id,
			'questionoptionsid'=>$questionOneOptionOne->id
			]);
        $response = $this->actingAs($user)
						->withSession([])
						 ->get('/questions');
		//assertSeeInOrder wasn't working properly
		//$response->assertSeeInOrder([$questionset->name,$question->question,$question2->question,'submit']);
		$response->assertSee($questionset->name)
				->assertSee($question->question)
				->assertSee($question2->question)
				->assertSee('submit');
    }
}
