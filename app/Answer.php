<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'answersetsid','questionoptionsid'
    ];
	
	public function answerset(){
		return $this->belongsTo('App\Answerset');
	}
	public function questionoption(){
		return $this->belongsTo('App\Questionoption');
	}
	public static function insertRows($answersetId,$responses){
		foreach($responses as $key => $responseArray){
			if(!is_array($responseArray) || strpos($key,'responses_')!==0){
				continue;
			}
			foreach($responseArray as $selectedOptionId){
				self::insert([
					'answersetsid'=>$answersetId,
					'questionoptionsid' => $selectedOptionId
				]);
			}
		}
		// return; 
	}
}
