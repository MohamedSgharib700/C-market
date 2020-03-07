<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use App\Repositories\SponsorRepository;
use Illuminate\Http\Request;
use App\Http\Resources\SponsorResource as SponsorResource;
use App\Models\Sponsor;

class SponsorController extends Controller
{
    
    protected $sponsorRepository;

    public function __construct(SponsorRepository $sponsorRepository)
    {
        $this->sponsorRepository = $sponsorRepository;

    }

    public function index()
    {
        $sponsorsData = $this->sponsorRepository->search(request())->get();
        $sponsors = SponsorResource::collection($sponsorsData);
        return response()->json(['result'=>$sponsors]);
    }

}
