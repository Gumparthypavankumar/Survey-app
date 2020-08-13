<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use App\Question;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');// this makes every method inside controller reqires the authorization for any action to perform
    }
    public function create()
    {
        return view('questionnaire.create');
    }
    public function store()
    {
        $data =  request()->validate([
            'title' => ['required','min:5'],
            'purpose' => 'required'
        ]);

        $questionnaire = auth()->user()->questionnaires()->create($data);// while using relationships use -> for calling any method like create :: is to be used when it is a model like Questionnaire::create() otherwise you will get non static method call error
        return redirect()->route('showQuestionnaire',[$questionnaire->id]);
    }
    public function show(Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.answers');// this is called lazy loading where we loading relationships and then redirecting to the show view to give the correct information
        
        $questions = $questionnaire->questions()->latest()->get();

        return view('questionnaire.show',compact('questionnaire','questions'));
    }
}
