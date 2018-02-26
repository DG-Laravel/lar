<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question','questionsetsid','questiontype'
    ];
	
	public function questionset(){
		return $this->belongsTo('App\Questionset');
	}
	public function answer(){
		return $this->hasManyThrough('App\Answer','App\Questionoption');
	}
	
	public static function getQuestionsByQuestionsetId($questionsetId){
		return self::where('questionsetsid',$questionsetId)->get();
	}
	
	public static function getQuestionAndOptionsByQuestionsetId($questionsetId){
		$questions = self::getQuestionsByQuestionsetId($questionsetId);
		$questionOptions = Questionoption::getOptionsByQuestionsetId($questionsetId);
		//pretty sure there is a way to do this with a touch function, above
		foreach($questions as $key=>$question){
			$passQuestions[$key]['question'] = $question->question;
			$passQuestions[$key]['questiontype'] = $question->questiontype;
			$passQuestions[$key]['id'] = $question->id;
			foreach($questionOptions as $optionKey=>$option){
				if($option->questionsid == $question->id){
					$passQuestions[$key]['options'][$optionKey]['option'] = $option->option;
					$passQuestions[$key]['options'][$optionKey]['id'] = $option->id;
				}
			}
		}
		return $passQuestions;
	}
}
