<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use App\Models\Question;
use App\Http\Services\QuestionService;
use App\Repositories\QuestionRepository;
use App\Http\Requests\Admin\QuestionRequest;
use Illuminate\Http\Request;
use View;


class QuestionController extends BaseController
{
    protected $questionService;
    protected $questionRepository;

    public function __construct(QuestionService $questionService, QuestionRepository $questionRepository)
    {
        $this->questionService = $questionService;
        $this->questionRepository = $questionRepository;
    }

    public function index()
    {
    
        $list = $this->questionRepository->search(request())->paginate(10);
        $list->appends(request()->all());

        return View::make('admin.questions.index', ['list' => $list]);
    }

    public function create()
    {
        return View::make('admin.questions.new');
    }

    public function store(QuestionRequest $request)
    {
        $this->questionService->fillFromRequest($request);
        return redirect(route('admin.questions.index'))->with('success', trans('item_added_successfully'));
    }

    public function edit(Question $question)
    {
        return View::make('admin.questions.edit', ['question' => $question]);
    }

    public function update(QuestionRequest $request, Question $question)
    {
        $this->questionService->fillFromRequest($request, $question);
        return redirect(route('admin.questions.index'))->with('success', trans('item_updated_successfully'));
    }

    public function destroy(Question $question)
    {
        //$this->uploadService->deleteFile($question->image);
        $question->delete();

        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }
}
