<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answerset;
use App\Question;

class AnswersetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	public function store(Request $request){
		$request->validate([
			'questionset' => 'required'
		]);
		$questions = Question::getQuestionsByQuestionsetId($request->questionset);
		//to do - add a custom error field on validator reture
		//to do - "choose" options already selected so user does not need to re-click
		foreach($questions as $question) {
			$request->validate([
				'responses_'.$question->id => 'required'
			]);
		}
		$responses = $request->all();
		$user = $request->user();
		$reviewResponses = Answerset::insertAndReturnResponses($responses,$user);
        return view('answers', ['responses' => $reviewResponses]);
	}
}