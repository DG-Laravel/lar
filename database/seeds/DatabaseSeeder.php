<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$now = new \DateTime();
		$questionsetId = DB::table('questionsets')->insertGetId([
			'name'=>'Emotional Index',
			'opendate'=>$now
			]);
		$question1 = DB::table('questions')->insertGetId([
			'question'=>'How do you currently feel?',
			'questionsetsid'=>$questionsetId,
			'questiontype'=>'radio'
			]);
		$question2 = DB::table('questions')->insertGetId([
			'question'=>'How much TV did you watch in the past 24 hours?',
			'questionsetsid'=>$questionsetId,
			'questiontype'=>'radio'
			]);
		$question3 = DB::table('questions')->insertGetId([
			'question'=>'How much time did you spend on the internet in the past 24 hours?',
			'questionsetsid'=>$questionsetId,
			'questiontype'=>'radio'
			]);
		$question4 = DB::table('questions')->insertGetId([
			'question'=>'Which of these emotions have you felt in the past 24 hours? (check as many as apply)',//Fear, anger, disgust, happiness, sadness and surprise
			'questionsetsid'=>$questionsetId,
			'questiontype'=>'checkbox'
			]);
		$question5 = DB::table('questions')->insertGetId([
			'question'=>'Is life generally getting better or generally getting worse?',
			'questionsetsid'=>$questionsetId,
			'questiontype'=>'radio'
			]);
		DB::table('questionoptions')->insert([
			['option'=>'Happy','questionsid'=>$question1],
			['option'=>'Sad','questionsid'=>$question1],
			['option'=>'Afraid','questionsid'=>$question1],
			['option'=>'Angry','questionsid'=>$question1],
			['option'=>'Disgusted','questionsid'=>$question1],
			['option'=>'Surprised','questionsid'=>$question1],
			['option'=>'Apathetic','questionsid'=>$question1],
			
			['option'=>'None','questionsid'=>$question2],
			['option'=>'Less than 1 hour','questionsid'=>$question2],
			['option'=>'1 to 3 hours','questionsid'=>$question2],
			['option'=>'3 to 5 hours','questionsid'=>$question2],
			['option'=>'6 or more hours','questionsid'=>$question2],
			
			['option'=>'None','questionsid'=>$question3],
			['option'=>'Less than 1 hour','questionsid'=>$question3],
			['option'=>'1 to 3 hours','questionsid'=>$question3],
			['option'=>'3 to 5 hours','questionsid'=>$question3],
			['option'=>'6 or more hours','questionsid'=>$question3],
			
			['option'=>'Happiness','questionsid'=>$question4],
			['option'=>'Saddness','questionsid'=>$question4],
			['option'=>'Fear','questionsid'=>$question4],
			['option'=>'Anger','questionsid'=>$question4],
			['option'=>'Disgust','questionsid'=>$question4],
			['option'=>'Surprise','questionsid'=>$question4],
			['option'=>'None of the above','questionsid'=>$question4],
			
			['option'=>'Better','questionsid'=>$question5],
			['option'=>'Worse','questionsid'=>$question5]
			]);
    }
}
