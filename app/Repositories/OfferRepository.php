<?php

namespace App\Repositories;
use App\Models\Offer;
use Symfony\Component\HttpFoundation\Request;

class OfferRepository
{

    /**
     * @param $request
     * @return $this|mixed
     */
    public function search(Request $request)
    {
        $offers = Offer::query();

        if ($request->has('name') && !empty($request->get('name'))) {
            $offers->whereHas('translations', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->query->get('name') . '%');
            });
        }
        if ($request->has('active') && !empty($request->get('active'))) {
            $offers->where('active', $request->get('active')) ;
        }


        return $offers;
    }
}
