<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// added to have access to Models\Post from within our API
use App\Models\Post;
use App\Models\Book;
use App\Models\CustomerMongoDB;
use App\Models\CustomerSQL;

use Jenssegers\Mongodb\Connection;
use Jenssegers\Mongodb\Collection;
use Jenssegers\Mongodb\Document;

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