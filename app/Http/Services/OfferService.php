<?php

namespace App\Http\Services;

use App\Models\Offer;
use Symfony\Component\HttpFoundation\Request;
use File;

class OfferService
{
    protected $uploaderService;

    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function fillFromRequest(Request $request, $offer = null)
    {
        if (!$offer) {
            $offer = new Offer();
        }
        $offer->fill($request->request->all());

        $offer->feature = $request->get('feature',0);

        if (!empty($request->file('image'))) {
            $offer->image = $this->uploaderService->upload($request->file('image'), 'offers');
        }
        $offer->save();

        return $offer;
    }
}
