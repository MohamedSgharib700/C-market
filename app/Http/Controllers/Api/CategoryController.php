<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use App\Repositories\CategoryRepository;
//use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource as CategoryResource;
use App\Models\BrandCategory;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{

    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;

    }

    public function index()
    {
        $categoriesData = $this->categoryRepository->search(request())->get();
        $categories = CategoryResource::collection($categoriesData);
        return response()->json(['result'=>$categories]);
    }

    public function brands(Request $request)
    {
        $category =Category::find($request->category);
        $brands = $category->brands ;
        return response($brands, 200)->header('Content-Type',  'application/json');
    }

}
