<?php

namespace App\Http\Controllers;

use App\Questionnaire;

class SurveyController extends Controller
{
    public function show(Questionnaire $questionnaire)
    {
        $questionnaire->load('questions.answers');
        return view('survey.show', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire)
    {

        $data = request()->validate([
            'responses.*.answer_id' => 'required',
            'responses.*.question_id' => 'required',
            'responses.*.questionnaire_id' => 'required',
            'survey.name' => 'required|min:5',
            'survey.email' => 'required|email',
        ]);

        $survey = $questionnaire->surveys()->create($data['survey']);
        $survey->responses()->createMany($data['responses']);

        return view('/thankyou');

    }
}