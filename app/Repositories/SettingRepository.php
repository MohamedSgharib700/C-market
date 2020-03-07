<?php

namespace App\Repositories;

use App\Models\Image;
use App\Models\Setting;

use Symfony\Component\HttpFoundation\Request;

class SettingRepository
{

    /**
     * @param $request
     * @return $this|mixed
     */

    public function homeSlider(Request $request)
    {
        $images = Image::orderBy('id', 'DESC');
        if ($request->has('active') && !empty($request->get('active'))) {
            $images->where('active', $request->get('active')) ;
        }


        return $images;
    }

    public function search(Request $request)
    {
        $settings = Setting::orderBy('id', 'DESC');

        if ($request->has('name') && !empty($request->get('name'))) {
            $settings->whereHas('translations', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->query->get('name') . '%');
            });
        }
        if ($request->has('active') && !empty($request->get('active'))) {
            $settings->where('active', $request->get('active')) ;
        }

        return $settings;
    }

}
