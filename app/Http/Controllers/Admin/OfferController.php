<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Models\Brand;
use App\Models\Offer;
use App\Models\Category;
use App\Http\Services\OfferService;
use App\Http\Services\UploaderService;
use App\Repositories\OfferRepository;
use App\Http\Requests\Admin\OfferRequest;

use Illuminate\Http\Request;
use View;
use File;

class OfferController extends BaseController
{
    protected $offerService;
    protected $offerRepository;

    public function __construct(OfferService $offerService, OfferRepository $offerRepository,UploaderService $uploadService)
    {

        $this->offerService = $offerService;
        $this->offerRepository = $offerRepository;
        $this->uploadService = $uploadService;
    }

    public function index(Request $request)
    {

        $list = $this->offerRepository->search(request())->paginate(30);
        $list->appends(request()->all());
        return View::make('admin.offers.index', ['list' => $list ]);
    }

    public function create()
    {
       $categories = Category::all();
        return View::make('admin.offers.new' ,['categories' => $categories]);
    }

    public function store(OfferRequest $request)
    {

        $brand = $this->offerService->fillFromRequest($request);
        return redirect(route('admin.offers.index'))->with('success', trans('item_added_successfully'));
    }

    public function edit(Offer $offer)
    {
        $categories = Category::all();
        $category = Category::find($offer->category_id);
        $brands = $category->brands;

        return View::make('admin.offers.edit', ['offer' => $offer , 'categories' => $categories, 'brands' => $brands] );
    }

    public function update(OfferRequest $request, Offer $offer)
    {
        $this->offerService->fillFromRequest($request, $offer);
        return redirect(route('admin.offers.index'))->with('success', trans('item_added_successfully'));

    }

    public function destroy(Offer $offer)
    {
        $this->uploadService->deleteFile($offer->image);
        $offer->delete();
        return redirect()->back()->with('success', trans('item_deleted_successfully'));
    }
}


