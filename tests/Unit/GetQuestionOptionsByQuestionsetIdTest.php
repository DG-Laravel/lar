<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class GetQuestionOptionsByQuestionsetIdTest extends TestCase
{
	use RefreshDatabase;
    /**
     * Test that getQuestionOptionssByQuestionsetIdreturns array of questions if exist
     *
     * @return void
     */
    public function testGetQuestionOptionsByQuestionsetIdTest()
    {
        $user = factory(App\User::class)->create();
		$questionset = factory(App\Questionset::class)->create(['opendate'=>time()]);
		$question = factory(App\Question::class)->create([
			'questionsetsid' => $questionset->id
			]);
		$questionOption = factory(App\Questionoption::class)->create([
			'questionsid' => $question->id]);
		$questionOption2 = factory(App\Questionoption::class)->create([
			'questionsid' => $question->id]);
		
		$questionExists = App\Questionoption::getOptionsByQuestionsetId($questionset->id);
		//test that two questions were returned
		$this->assertCount(2, $questionExists);		
    }
}
