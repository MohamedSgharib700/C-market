<?php

namespace App\Http\Services;

use App\Models\Image;
use Symfony\Component\HttpFoundation\Request;
use File;

class ImageService
{
    protected $uploaderService;

    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function fillFromRequest(Request $request, $image = null)
    {
        if (!$image) {
            $image = new Image();
        }

        $image->fill($request->request->all());

        if (!empty($request->file('image'))) {
            foreach ($request->file('image') as $value) {
                $image = new Image();
                $image->image = $this->uploaderService->upload($value, 'images');
                $image->save();
            }

        }



        return $image;
    }
}
