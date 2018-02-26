<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App;
//use App\Question;
//use App\Questionset;
//use App\Questionoption;
//use App\Answerset;	

class QuestionsVisibleTest extends DuskTestCase
{
    /**
     * test that after login, if quetions exist, they will be seen.
     *
     * @return void
     */
    public function testQuestionsVisibleTest()
    {
        $this->browse(function (Browser $browser) {
			$user = factory(App\User::class)->create();
			$questionset = factory(App\Questionset::class)->create();
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
			$browser->loginAs($user)
							 ->visit('/questions')
							 ->assertSee($questionset->name)
							 ->assertSee($question->question)
							 ->assertSee($question2->question)
							 ->assertSee('submit');
        });
    }
}
