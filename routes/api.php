<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

// Route::get('/posts', function (Request $request) {
//     return DB::table('posts')->get();
// });

Route::get('/posts', 'api\HomeController@index');
Route::get('/post/{slug}', 'api\PostController@details');
Route::get('/category/{slug}', 'api\CategoryController@details');