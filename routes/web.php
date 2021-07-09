<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

use function PHPUnit\Framework\isEmpty;

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

Route::get('/{any}', function () {
    // case domain
    if(!isset(Route::getCurrentRoute()->parameters["any"]))
        return view('home');

    // case domain/{any}
    $isAdmin = substr(Route::getCurrentRoute()->parameters["any"], 0, 5) === "admin" ?? true;

    if($isAdmin)
        return view('admin.home');
    else
        return view('home');
})->where('any', '.*');
