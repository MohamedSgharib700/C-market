<?php

namespace App\Repositories;
use App\Models\Image;
use Symfony\Component\HttpFoundation\Request;

class ImageRepository
{

    /**
     * @param $request
     * @return $this|mixed
     */
    public function search(Request $request)
    {
        $images = Image::where('active', '=', '1')->orderBy('id', 'DESC');

        if ($request->has('name') && !empty($request->get('name'))) {
            $images->whereHas('translations', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->query->get('name') . '%');
            });
        }
        if ($request->has('active') && !empty($request->get('active'))) {
            $images->where('active', $request->get('active')) ;
        }


        return $images;
    }
}
