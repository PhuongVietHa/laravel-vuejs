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

// UserController@login
Route::group(['prefix' => 'admin'], function () {
    Route::post('login', 'UserController@login');
    Route::post('register', 'UserController@register');
    Route::post('logout', 'UserController@logout')->middleware('auth:sanctum');
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/reservation/all', 'ReservationController@index');
    Route::delete('/reservation/delete/{id}', 'ReservationController@destroy');
    Route::post('/reservation/update/{id}', 'ReservationController@update');    
});

Route::post('/reservation/create', 'ReservationController@store');
// Route::get('/reservation/all', 'ReservationController@index');
// Route::delete('/reservation/delete/{id}', 'ReservationController@destroy');
// Route::post('/reservation/update/{id}', 'ReservationController@update');    
