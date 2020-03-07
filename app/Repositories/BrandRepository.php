<?php

namespace App\Repositories;
use App\Models\Brand;
use Symfony\Component\HttpFoundation\Request;

class BrandRepository
{

    /**
     * @param $request
     * @return $this|mixed
     */
    public function search(Request $request)
    {


        $brands = Brand::orderBy('id', 'DESC');

        if ($request->has('name') && !empty($request->get('name'))) {
            $brands->whereHas('translations', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->query->get('name') . '%');
            });
        }
        if ($request->has('active') && !empty($request->get('active'))) {
            $brands->where('active', $request->get('active')) ;
        }

        if ($request->has('category_id') && !empty($request->get('category_id'))) {
            $brands->whereHas('categories', function ($query) {
                $query->where('category_id', '=', request('category_id'));
            });
        }

        return $brands;
    }

    public function latestBrands(Request $request)
    {
        $brands = Brand::where('active', '=', '1')->orderBy('created_at', 'DESC');
        return $brands;
    }
}
