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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('App\Http\Controllers\api')->group(function () {
    Route::post('register', 'ApiController@register');
    Route::post('login', 'ApiController@login');
    Route::post('profile/{id}', 'ApiController@profile')->middleware('auth:api');
    Route::get('hospital', 'ApiController@hospital')->middleware('auth:api');
    Route::get('specialties', 'ApiController@specialties')->middleware('auth:api');
    Route::get('doctor/{hospital}/{specialties}', 'ApiController@doctor')->middleware('auth:api');

    Route::post('reservations', 'ApiController@reservations')->middleware('auth:api');

    Route::get('reservations/{id}', 'ApiController@all_reservations')->middleware('auth:api');


    // profile
});
