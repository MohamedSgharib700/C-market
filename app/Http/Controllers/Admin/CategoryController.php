<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Category;
use App\Http\Services\CategoryService;
use App\Http\Services\UploaderService;
use App\Repositories\CategoryRepository;
use App\Http\Requests\Admin\CategoryRequest;

use Illuminate\Http\Request;
use View;
use File;

class CategoryController extends BaseController
{
    protected $categoryService;
    protected $categoryRepository;

    public function __construct(CategoryService $categoryService, CategoryRepository $categoryRepository,UploaderService $uploadService)
    {

        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
        $this->uploadService = $uploadService;
    }

    public function index(Request $request)
    {

        $list = $this->categoryRepository->search(request())->paginate(30);
        $list->appends(request()->all());
        return View::make('admin.categories.index', ['list' => $list]);
    }

    public function create()
    {
        return View::make('admin.categories.new');
    }

    public function store(CategoryRequest $request)
    {

        $categorys = $this->categoryService->fillFromRequest($request);
        return redirect(route('admin.categories.index'))->with('success', trans('item_added_successfully'));
    }

    public function edit(Category $category)
    {
        return View::make('admin.categories.edit', ['category' => $category]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $this->categoryService->fillFromRequest($request, $category);
        return redirect(route('admin.categories.index'))->with('success', trans('item_added_successfully'));

    }

    public function destroy(Category $category)
    {
        $this->uploadService->deleteFile($category->image);
        $category->delete();
        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }
}


