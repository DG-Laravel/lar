<?php

//namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class ViewAnswersPageTest extends TestCase
{
	use RefreshDatabase;
    /**
     * Test that if questions are answered the user will see their most recent answerset on the view page.
     *
     * @return void
     */
    public function testViewAnswersPageTest()
    {
        $user = factory(App\User::class)->create();
		$questionset = factory(App\Questionset::class)->create();
		$question = factory(App\Question::class)->create([
			'questionsetsid'=>$questionset->id
			]);
		$question2 = factory(App\Question::class)->create([
			'questionsetsid'=>$questionset->id
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
		$page = $this->actingAs($user)
					->withSession([])
					->withHeaders([
							'X-Header' => 'Value',
					])->json('POST', '/answers', [
						'questionset' => $questionset->id,
						'responses_'.$question->id => [$questionOneOptionOne->id],
						'responses_'.$question2->id => [$questionTwoOptionTwo->id]]);
		$page
            ->assertSeeText($questionTwoOptionTwo->option);
    }
}
