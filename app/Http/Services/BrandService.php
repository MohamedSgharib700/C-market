<?php

namespace App\Http\Services;

use App\Models\Brand;
use Symfony\Component\HttpFoundation\Request;
use File;

class BrandService
{
    protected $uploaderService;

    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function fillFromRequest(Request $request, $brand = null)
    {
        if (!$brand) {
            $brand = new Brand();
        }
        $brand->fill($request->request->all());

        if (!empty($request->file('image'))) {
            $brand->image = $this->uploaderService->upload($request->file('image'), 'brands');
        }


        $brand->save();

        if (!empty($request->has('category_id'))) {
            $brand->categories()->sync($request->input("category_id"));
        }

        return $brand;
    }
}
