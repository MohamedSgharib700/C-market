<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Non-Logged in users API's
Route::prefix('v1')->attribute('namespace', 'Api')->group(function () {

       Route::post('active', ['uses' => 'ActiveModelController@active', 'as' => 'api.model.active']);
       Route::post('register', ['uses' => 'UserController@register', 'as' => 'api.auth.register']);
       Route::post('login', 'UserController@login');
       Route::post('forgetPassword', 'UserController@forgetPassword');
       Route::post('updateProfile', 'UserController@updateProfile');
       Route::get('sponsors', 'SponsorController@index');
       Route::get('categories', 'CategoryController@index');


       Route::get('brands', 'BrandController@index');
       Route::get('latestBrands', 'BrandController@latestBrands');
       Route::get('questions', 'QuestionController@index');
       Route::get('answer', 'QuestionController@answer');

       Route::post('contactUs', 'ContactController@contactUs');
       Route::get('homeSlider', 'SettingController@homeSlider');
    Route::get('category_brands', ['uses' => 'CategoryController@brands', 'as' => 'api.category.brands']);



});
//Route::get('/brands', ['uses' => 'BrandController@brand', 'as' => 'api.brands.brand']);
