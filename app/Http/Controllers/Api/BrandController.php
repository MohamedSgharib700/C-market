<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use App\Repositories\BrandRepository;
use Illuminate\Http\Request;
use App\Http\Resources\BrandResource as BrandResource;
use App\Models\Brand;

class BrandController extends Controller
{
    
    protected $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;

    }

    public function index()
    {
        $brandsData = $this->brandRepository->search(request())->get();
        $brands = BrandResource::collection($brandsData);
        return response()->json(['result'=>$brands]);
    }
    public function latestBrands()
    {
        $brandsData = $this->brandRepository->latestBrands(request())->limit(4)->get();
        $brands = BrandResource::collection($brandsData);
        return response()->json(['result'=>$brands]);
    }
}
