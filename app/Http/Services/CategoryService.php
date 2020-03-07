<?php

namespace App\Http\Services;

use App\Models\Category;
use Symfony\Component\HttpFoundation\Request;
use File;

class CategoryService
{
    protected $uploaderService;

    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function fillFromRequest(Request $request, $category = null)
    {
        if (!$category) {
            $category = new Category();
        }
        $category->fill($request->request->all());

        if (!empty($request->file('image'))) {
            $category->image = $this->uploaderService->upload($request->file('image'), 'categorys');
        }
        $category->save();

        return $category;
    }
}
