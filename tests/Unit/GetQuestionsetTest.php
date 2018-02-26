<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class GetQuestionsetTest extends TestCase
{
	use RefreshDatabase;
    /**
     * Test that getOpenQuestionset returns if question set exists
     *
     * @return void
     */
    public function testGetQuestionsetTest()
    {
        $user = factory(App\User::class)->create();
		$questionset = factory(App\Questionset::class)->create(['opendate'=>time()]);
		$question = factory(App\Question::class)->create([
			'questionsetsid'=>$questionset->id
			]);
		$questionExists = App\Questionset::getOpenQuestionset();
		
		$this->assertEquals($questionset->name,$questionExists->name);
		
    }
}
