<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionset;
use App\Question;

class QuestionsController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$questionSet = Questionset::getOpenQuestionSet();
		$questions = Question::getQuestionAndOptionsByQuestionsetId($questionSet->id);
        return view('questions', ['questionset' => $questionSet, 'questions' => $questions]);
    }
}
