<?php

use Illuminate\Support\Facades\Route;

// this was added
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/info', function () {
    phpinfo();
});


Route::get('/xdebug', function () {
    xdebug_info();
});


Route::get('/post/{slug}', [PostController::class, 'show']);