<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Api\AnswerRequest;
use App\Http\Services\QuestionService;
use App\Http\Resources\QuestionResource as QuestionResource;
use App\Models\Question;

class QuestionController extends Controller
{
    
    protected $questionRepository;
    protected $questionService;

    public function __construct(QuestionService $questionService, QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
        $this->questionService = $questionService;

    }

    public function index()
    {
        $questionsData = $this->questionRepository->questions(request())->get();
        $questions = QuestionResource::collection($questionsData);
        return response()->json(['result'=>$questions]);
    }
    public function answer(AnswerRequest $request)
    {
        $string =(object)"تم إرسال رسالتك بنجاح";
        $this->questionService->fillAnswer($request);
        return response()->json(['result'=>$string]);
    }
}
