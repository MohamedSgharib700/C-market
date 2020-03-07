<?php

namespace App\Repositories;

use App\Models\Question;
use Symfony\Component\HttpFoundation\Request;

class QuestionRepository
{

    /**
     * @param $request
     * @return $this|mixed
     */
    public function search(Request $request)
    {
        $questions = Question::orderBy('id', 'DESC');

        if ($request->has('name') && !empty($request->get('name'))) {
            $questions->whereHas('translations', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->query->get('name') . '%');
            });
        }
        if ($request->has('active') && !empty($request->get('active'))) {
            $questions->where('active', $request->get('active')) ;
        }

        return $questions;
    }

    public function questions(Request $request)
    {
        $questions = Question::orderBy('id', 'DESC')
                    ->whereDoesntHave('answers', function ($query) {
                    $query->where('user_id', '=', request('user_id'));
        });

        return $questions;
    }
}
