<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use App\Models\Sponsor;
use App\Http\Services\SponsorService;
use App\Http\Services\UploaderService;
use App\Repositories\SponsorRepository;
use App\Http\Requests\Admin\SponsorRequest;
use Illuminate\Http\Request;
use View;
use File;

class SponsorController extends BaseController
{
    protected $sponsorService;
    protected $uploadService;
    protected $sponsorRepository;

    public function __construct(SponsorService $sponsorService, SponsorRepository $sponsorRepository, UploaderService $uploadService)
    {
        $this->sponsorService = $sponsorService;
        $this->sponsorRepository = $sponsorRepository;
        $this->uploadService = $uploadService;
    }

    public function index()
    {
    
        $list = $this->sponsorRepository->search(request())->paginate(10);
        $list->appends(request()->all());

        return View::make('admin.sponsors.index', ['list' => $list]);
    }

    public function create()
    {
        return View::make('admin.sponsors.new');
    }

    public function store(SponsorRequest $request)
    {
        $this->sponsorService->fillFromRequest($request);
        return redirect(route('admin.sponsors.index'))->with('success', trans('item_added_successfully'));
    }

    public function edit(Sponsor $sponsor)
    {
        return View::make('admin.sponsors.edit', ['sponsor' => $sponsor]);
    }

    public function update(SponsorRequest $request, Sponsor $sponsor)
    {
        $this->sponsorService->fillFromRequest($request, $sponsor);
        return redirect(route('admin.sponsors.index'))->with('success', trans('item_updated_successfully'));
    }

    public function destroy(Sponsor $sponsor)
    {
        $this->uploadService->deleteFile($sponsor->image);
        $sponsor->delete();

        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }
}
