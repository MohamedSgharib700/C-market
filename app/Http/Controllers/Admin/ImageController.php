<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Image;
use App\Http\Services\ImageService;
use App\Http\Services\UploaderService;
use App\Repositories\ImageRepository;
use App\Http\Requests\Admin\ImageRequest;

use Illuminate\Http\Request;
use View;
use File;

class ImageController extends BaseController
{
    protected $imageService;
    protected $imageRepository;

    public function __construct(ImageService $imageService, ImageRepository $imageRepository,UploaderService $uploadService)
    {

        $this->imageService = $imageService;
        $this->imageRepository = $imageRepository;
        $this->uploadService = $uploadService;
    }

    public function index(Request $request)
    {

        $list = $this->imageRepository->search(request())->paginate(30);
        $list->appends(request()->all());
        return View::make('admin.images.index', ['list' => $list]);
    }

    public function create()
    {
        return View::make('admin.images.new');
    }

    public function store(ImageRequest $request)
    {

        $images = $this->imageService->fillFromRequest($request);
        return redirect(route('admin.images.index'))->with('success', trans('item_added_successfully'));
    }

    public function edit(Image $image)
    {
        return View::make('admin.images.edit', ['image' => $image]);
    }

    public function update(ImageRequest $request, Image $image)
    {
        $this->imageService->fillFromRequest($request, $image);
        return redirect(route('admin.images.index'))->with('success', trans('item_added_successfully'));

    }

    public function destroy(Image $image)
    {
        $this->uploadService->deleteFile($image->image);
        $image->delete();
        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }
}


