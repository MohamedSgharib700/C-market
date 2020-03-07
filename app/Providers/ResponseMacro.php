<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

use Response ;


class ResponseMacro extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // response()->fail()->message();
        Response::macro("success" , function($payload = [], $status = 200 ) {
            if($payload instanceof AnonymousResourceCollection) {
                return $payload;
            }
            return response()->json( (object) $payload , $status );
        }) ;
         
        Response::macro("fail" , function($message = "" , $payload = [] , $status = 500 ) {
            return response()->json([
                "error"  => $message ,
            ] + ( $payload  ? ["errors" => $payload] : [] ) , $status );
        }) ;

        Response::macro("e404" , function( $message = null ) {
            return response()->json( ["error" => $message ?? trans("NOT_FOUND") ] , 404 );
        }) ;

        Response::macro("e403" , function( $message = null ) {
            return response()->json( ["error" => $message ?? trans("NOT_AUTHED") ] , 403 );
        }) ;

        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
