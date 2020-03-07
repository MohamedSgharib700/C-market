<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use App\Http\Resources\HomeSliderResource as HomeSliderResource;
use App\Models\Image;

class SettingController extends Controller
{
    
    protected $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;

    }

    public function homeSlider()
    {
        $homeSliderData = $this->settingRepository->homeSlider(request())->get();
        $homeSlider = HomeSliderResource::collection($homeSliderData);
        return response()->json(['result'=>$homeSlider]);
    }

}
