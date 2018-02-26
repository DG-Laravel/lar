<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class GetQuestionsByQuestionsetIdTest extends TestCase
{
	use RefreshDatabase;
    /**
     * Test that getQuestionsByQuestionset returns array of questions if exist
     *
     * @return void
     */
    public function testGetQuestionsByQuestionsetIdTest()
    {
        $user = factory(App\User::class)->create();
		$questionset = factory(App\Questionset::class)->create(['opendate'=>time()]);
		$question = factory(App\Question::class)->create([
			'questionsetsid'=>$questionset->id
			]);
		$question2 = factory(App\Question::class)->create([
			'questionsetsid'=>$questionset->id
			]);
		
		$questionExists = App\Question::getQuestionsByQuestionsetId($questionset->id);
		//test that two questions were returned
		$this->assertCount(2, $questionExists);		
    }
}
