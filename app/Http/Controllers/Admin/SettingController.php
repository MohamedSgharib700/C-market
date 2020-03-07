<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use App\Models\Setting;
use App\Http\Services\SettingService;
use App\Repositories\SettingRepository;
use App\Http\Requests\Admin\SettingRequest;
use Illuminate\Http\Request;
use View;
use App\Http\Services\UploaderService ;


class SettingController extends BaseController
{
    public $settingService;
    protected $settingRepository;
    public $uploaderService ;
    public function __construct(SettingService $settingService, SettingRepository $settingRepository, UploaderService $uploaderService)
    {
        $this->settingService = $settingService;
        $this->settingRepository = $settingRepository;
        $this->uploaderService = $uploaderService;

    }

    public function index()
    {
    
        $list = $this->settingRepository->search(request())->paginate(10);
        $list->appends(request()->all());

        return View::make('admin.settings.index', ['list' => $list]);
    }

    public function create()
    {
        return View::make('admin.settings.new');
    }

    public function store(SettingRequest $request)
    {
        $this->settingService->fillFromRequest($request);
        return redirect(route('admin.settings.index'))->with('success', trans('item_added_successfully'));
    }

    public function edit(Setting $setting)
    {
        return View::make('admin.settings.edit', ['setting' => $setting]);
    }

    public function update(SettingRequest $request, Setting $setting)
    {
        $this->settingService->fillFromRequest($request, $setting);
        return redirect(route('admin.settings.index'))->with('success', trans('item_updated_successfully'));
    }

    public function destroy(Setting $setting)
    {
        $this->uploaderService->deleteFile($setting->image);
        $setting->delete();

        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }
}
