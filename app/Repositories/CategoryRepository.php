<?php

namespace App\Repositories;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Request;

class CategoryRepository
{

    /**
     * @param $request
     * @return $this|mixed
     */
    public function search(Request $request)
    {
        $categories = Category::orderBy('id', 'DESC');

        if ($request->has('name') && !empty($request->get('name'))) {
            $categories->whereHas('translations', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->query->get('name') . '%');
            });
        }
        if ($request->has('active') && !empty($request->get('active'))) {
            $categories->where('active', $request->get('active')) ;
        }


        return $categories;
    }
}
