<?php

namespace App\Http\Controllers\Api;
use Illuminate\Routing\Controller;
use App\Http\Services\AuthService;
use App\Models\User;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\ForgotPasswordRequest;
use App\Http\Requests\Api\ProfileRequest;

use App\Http\Services\UserService;
use Password;
use Symfony\Component\HttpFoundation\Response;
use Mail;
class UserController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
  
    }

   public function register(RegisterRequest $request)
    {
        $authService = new AuthService;
        $user = $authService->registerFromRequest($request);
        return response()->json(['result'=>$user]);
    }

    public function login(LoginRequest $request)
    {

      if(! auth()->attempt((['email' => request('email'), 'password' => request('password')]))){
       $string =(object)"يرجى التأكد من البريد الألكترونى او كلمة المرور";

           return response()->json(['result'=>$string]);
       }
       $user =auth()->user();
       return response()->json(['result'=>$user->only(['id', 'name', 'phone', 'email','active' ,'type'])]);
    }


    public function forgetPassword(ForgotPasswordRequest $request)
    {
            $rndmPass = str_random(8);
            $encPass = bcrypt($rndmPass);
            $newPass =  User::where('users.email','=',request('email'))
                ->update(array('password'=>$encPass));
            $data = [
                'password' => $rndmPass,
                'email'=> request('email')
            ];
            Mail::send(['data' => 'mail'], $data, function ($message) use ($data) {
                $message->to($data['email'], 'Forget Password')->subject
                ('AutoMarket Application Password Reset Info.')->setBody($data['password']);
                $message->from('automarket@info.com', 'Support');
            });
            $string =(object)"تم إرسال كلمة المرو الجديدة عبر بريدك الألكترونى";
            return response()->json(['result'=>$string]);
    }

    public function updateProfile(ProfileRequest $request)
    {
        try {
          $user  = $this->userService->updateProfile($request);
          $user = User::where('id','=', $request->input('user_id'))->first();
           
        } catch (\Exception $e) {

            return response()->json($e->getMessage())
                ->setStatusCode($e->getCode());
        }
        return response()->json(['result'=>$user->only(['id', 'name', 'phone', 'email','active' ,'type'])])
            ->setStatusCode(Response::HTTP_OK);
    }

}
