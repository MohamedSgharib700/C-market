<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('{lang?}')->attribute('namespace', 'Web')->group(function () {
    Route::get('/', function () {
        return redirect(route('admin.home.index'));
    });

});


Route::prefix('{lang?}/admin')->attribute('namespace', 'Admin')->group(function () {
    Route::post('/attempt', ['uses' => 'AuthController@attempt', 'as' => 'admin.auth.attempt']);
    Route::get('/logout', ['uses' => 'AuthController@logout', 'as' => 'admin.auth.logout']);
    Route::get('/login', ['uses' => 'AuthController@login', 'as' => 'admin.auth.login']);
});

Route::prefix('{lang?}/admin')->attribute('namespace', 'Admin')->middleware('auth:web')->group(function () {
    Route::get('/', ['uses' => 'HomeController@index', 'as' => 'admin.home.index']);
    Route::resource('users', 'UserController', ['as' => 'admin']);
    Route::resource('categories', 'CategoryController', ['as' => 'admin']);
    Route::resource('brands', 'BrandController', ['as' => 'admin']);
    Route::resource('sponsors', 'SponsorController', ['as' => 'admin']);

    Route::resource('offers', 'OfferController', ['as' => 'admin']);
    Route::resource('images', 'ImageController', ['as' => 'admin']);

    Route::resource('questions', 'QuestionController', ['as' => 'admin']);

    Route::resource('settings', 'SettingController', ['as' => 'admin']);
    Route::resource('contacts', 'ContactController', ['as' => 'admin']);

});
