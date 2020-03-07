<?php

namespace App\Repositories;

use App\Models\Sponsor;
use Symfony\Component\HttpFoundation\Request;

class SponsorRepository
{

    /**
     * @param $request
     * @return $this|mixed
     */
    public function search(Request $request)
    {
        $sponsors = Sponsor::orderBy('id', 'DESC');

        if ($request->has('name') && !empty($request->get('name'))) {
            $sponsors->whereHas('translations', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->query->get('name') . '%');
            });
        }
        if ($request->has('active') && !empty($request->get('active'))) {
            $sponsors->where('active', $request->get('active')) ;
        }

        return $sponsors;
    }

}
