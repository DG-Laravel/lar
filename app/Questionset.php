<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionset extends Model
{
    protected $fillable = [
        'name','opendate','closedate'
    ];
	
	public function questions(){
		return $this->hasMany('App\Question');
	}
	public function answerSet(){
		return $this->belongsTo('App\Answerset');
	}
	
	public static function getOpenQuestionset(){
		return self::whereNull('closedate')->whereNotNull('opendate')->first();
	}
}
