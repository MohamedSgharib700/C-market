<?php

namespace App\Http\Services;

use App\Models\Sponsor;
use Symfony\Component\HttpFoundation\Request;
use File;

class SponsorService
{
    protected $uploaderService;
    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }
    public function fillFromRequest(Request $request, $sponsor = null)
    {
        if (!$sponsor) {
            $sponsor = new Sponsor();
        }
        if (!empty($request->file('image'))) {
            $sponsor->image = $this->uploaderService->upload($request->file('image'), 'sponsors');
        }

        $sponsor->fill($request->request->all());
        
        if ($request->method()=='post') {
            $sponsor->active = $request->request->get('active', 1);
        }
        
        $sponsor->save();

        return $sponsor;
    }
}
