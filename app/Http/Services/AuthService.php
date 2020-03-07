<?php

namespace App\Http\Services;

use App\Models\User;
use App\Constants\UserTypes;
use Symfony\Component\HttpFoundation\Request;

class AuthService
{

    public function attempt(Request $request)
    {
        return auth()->attempt(
            ['email' => $request->request->get('email'), 'password' => $request->request->get('password')]
        );


    }

    public function registerFromRequest(Request $request, $user = null)
    {
        if (!$user) {
            $user = new User(); 
        }
        $user->fill($request->request->all());
        $user->password = $request->input("password");
        $user->active = 1;
        $user->type = UserTypes::USER;
        $user->save();
        return $user;
    }
}
