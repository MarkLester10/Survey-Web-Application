<?php

namespace App\Http\Controllers;

use App\Questionnaire;

class QuestionnaireController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('questionnaire.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|min:5',
            'purpose' => 'required|max:50',
        ]);

        $questionnaire = auth()->user()->questionnaires()->create($data);
        return view('questionnaire.show', compact('questionnaire'));
    }

    public function show(Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.answers.responses'); //lazy loading

        return view('questionnaire.show', compact('questionnaire'));
    }

    public function destroy(Questionnaire $questionnaire)
    {

        $questionnaire->questions()->delete();
        $questionnaire->surveys()->delete();
        $questionnaire->responses()->delete();
        $questionnaire->delete();
        return redirect('/home')->with('success', 'Questionnaire Deleted Successfully.');
    }
}