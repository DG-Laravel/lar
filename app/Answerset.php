<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answerset extends Model
{
    protected $fillable = [
        'questionsetsid','usersid'
    ];
	
	public function questionset(){
		return $this->belongsTo('App\Questionset');
	}
	public function user(){
		return $this->belongsTo('App\User');
	}
	
	public static function insertAndReturnResponses($formValues,$user){
		$answersetId = self::insertGetId([
			'questionsetsid'=>$formValues['questionset'],
			'usersid' => $user->id
			]);
		Answer::insertRows($answersetId, $formValues);
		return self::getQuestionsAndAnswersByAnswerSetId($answersetId);
	}
	
	public static function getQuestionsAndAnswersByAnswerSetId($id){
		return self::join('questionsets' , 'questionsets.id' ,'=', 'answersets.questionsetsid')
					->join('questions' , 'questions.questionsetsid' ,'=', 'questionsets.id')
					->join('questionoptions' , 'questions.id' ,'=', 'questionoptions.questionsid')
					->join('answers' , function($join){
						$join->on('answers.questionoptionsid' ,'=', 'questionoptions.id');
						$join->on('answers.answersetsid' ,'=', 'answersets.id');
					})
					->where('answersets.id', '=', $id)
					->select('questionsets.name', 'questions.question', 'questionoptions.option')
					->get();
	}
	
	
		//$questionsAndAnswers = Answerset::getQuestionsAndAnswersByAnswerSetId($id);
}
