<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Brand;
use App\Models\Category;
use App\Http\Services\BrandService;
use App\Http\Services\UploaderService;
use App\Repositories\BrandRepository;
use App\Http\Requests\Admin\BrandRequest;
use Illuminate\Http\Request;
use View;
use File;

class BrandController extends BaseController
{
    protected $brandService;
    protected $brandRepository;

    public function __construct(BrandService $brandService, BrandRepository $brandRepository,UploaderService $uploadService)
    {

        $this->brandService = $brandService;
        $this->brandRepository = $brandRepository;
        $this->uploadService = $uploadService;
    }

    public function index(Request $request)
    {

        $list = $this->brandRepository->search(request())->paginate(30);
        $list->appends(request()->all());
        return View::make('admin.brands.index', ['list' => $list ]);
    }

    public function create()
    {
        $categories = Category::all();
        return View::make('admin.brands.new',compact('categories'));
    }

    public function store(BrandRequest $request)
    {

        $brand = $this->brandService->fillFromRequest($request);
        return redirect(route('admin.brands.index'))->with('success', trans('item_added_successfully'));
    }

    public function edit(Brand $brand)
    {

        $categories = Category::all();
        return View::make('admin.brands.edit', ['brand' => $brand, 'categories' => $categories] );
    }

    public function update(BrandRequest $request, Brand $brand)
    {
        $this->brandService->fillFromRequest($request, $brand);
        return redirect(route('admin.brands.index'))->with('success', trans('item_added_successfully'));

    }

    public function destroy(Brand $brand)
    {
        $this->uploadService->deleteFile($brand->image);
        $brand->delete();
        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }
}


