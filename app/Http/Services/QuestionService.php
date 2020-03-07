<?php

namespace App\Http\Services;

use App\Models\Question;
use App\Models\Answer;
use Symfony\Component\HttpFoundation\Request;


class QuestionService
{

    public function fillFromRequest(Request $request, $question = null)
    {
        if (!$question) {
            $question = new Question();
        }

        $question->fill($request->request->all());
        
        if ($request->method()=='post') {
            $question->active = $request->request->get('active', 1);
        }
        
        $question->save();
        return $question;
    }

    public function fillAnswer(Request $request, $answer = null)
    {
        if (!$answer) {
            $answer = new Answer();
        }
        $answer->fill($request->request->all());
        $answer->save();
        return $answer;
    }
}
