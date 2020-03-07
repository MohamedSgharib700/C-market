<?php

namespace App\Http\Services;

use App\Models\Setting;
use Symfony\Component\HttpFoundation\Request;
use File;
use App\Http\Services\UploaderService ;
class SettingService
{
    protected $uploaderService;

    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function fillFromRequest(Request $request, $setting = null)
    {
        if (!$setting) {
            $setting = new Setting();
        }
        if (!empty($request->file('image'))) {
            $setting->image = $this->uploaderService->upload($request->file('image'), 'settings');
        }

        $setting->fill($request->request->all());
        
        if ($request->method() == 'post') {
            $setting->active = $request->request->get('active', 1);
        }
        
        $setting->save();

        return $setting;
    }
}
