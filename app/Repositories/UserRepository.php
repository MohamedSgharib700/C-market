<?php

namespace App\Repositories;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;

class UserRepository
{

    /**
     * @param $request
     * @return $this|mixed
     */
    public function search(Request $request)
    {
        $users = User::orderByDesc("id")
        ->when($request->has('type'), function ($users) use ($request) {
            return $users->where('type', '=', (int) $request->get('type'));
        });
        if($request->filled('active')) {
            $users->where('active', $request->query->get('active'));
        }
        return $users;
    }
}
