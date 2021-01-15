<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::namespace('App\\Http\\Controllers\\API')->group(function () {
    Route::post('/login', 'UserController@login');

    Route::middleware('auth:api')->group(function () {
        Route::get('/userInfo', 'UserController@userinfo');
        
        Route::apiResources([
            'user' => 'UserController',
        ]);
    });
});