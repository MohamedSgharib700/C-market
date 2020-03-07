<?php

namespace App\Http\Services;
use App\Models\User;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Http\Response;
use Hash;
class UserService
{

    public function fillFromRequest(Request $request, $user = null)
    {
        if (!$user) {
            $user = new User();
        }

        $user->fill($request->request->all());
        if ($request->method() == 'post') {
            $user->active = $request->request->get('active', 1);
        }
        $user->save();
        return $user;
    }

    /**
     * @param Request $request
     * @param null $user
     * @return bool|null
     */
    public function fillUserGroupsFromRequest(Request $request, $user = null)
    {
        if (!$user) {
            return false;
        }
        $user->groups()->sync($request->input("groups"));
        return $user;
    }

    public function updateProfile(Request $request)
    {
        /** @var User $user */
        // $user = auth()->user();
        $user = User::where('id','=', $request->input('user_id'))->first();

        if (!$user) {
            throw new Exception('Exception message', Response::HTTP_UNAUTHORIZED);
        }

        // if (!Hash::check($request->input('password'), $user->password)) {
        //     throw new Exception(trans('please_enter_correct_password'), Response::HTTP_UNPROCESSABLE_ENTITY);
        // }

        $user->fill($request->request->all());

        $user->save();

        return true;
    }
}
