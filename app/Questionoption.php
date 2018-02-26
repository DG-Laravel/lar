<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionoption extends Model
{
    protected $fillable = [
        'option','questionid','deactivateddate'
    ];
	
	public function question(){
		return $this->belongsTo('App\Question');
	}
	public function answer(){
		return $this->hasMany('App\Answer');
	}
	
	public static function getOptionsByQuestionsetId($questionSetId){
		return self::whereExists(function ($query) {
                $query->select('id')
                      ->from('questions')
                      ->whereRaw('questions.id = questionoptions.questionsid');
            })->get();
	}
}
