<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get(
    '/form',
    [App\Http\Controllers\UploadImageController::class, "show"]
)->name("upload_form")->middleware('auth');

Route::post(
    '/upload',
    [App\Http\Controllers\UploadImageController::class, "upload"]
)->name("upload_image")->middleware('auth');

Route::get(
    '/list',
    [App\Http\Controllers\ImageListController::class, "show"]
)->name("image_list")->middleware('auth');

Route::get(
    '/detail',
    [App\Http\Controllers\ImageListController::class, "choice"]
)->name("image_detail")->middleware('auth');

Route::post(
    '/upComment',
    [App\Http\Controllers\ImageCommentController::class, "uploadComment"]
)->name("upload_comment")->middleware('auth');

// Route::post('upComment', 'App\Http\Controllers\ImageCommentController@uploadComment')->name("upload_comment")->middleware('auth');


// Route::get(
//     '/detail',
//     [App\Http\Controllers\ImageCommentController::class, "index"]
// )->name("image_detail")->middleware('auth');

// Route::get('/image_detail/{id}', 'App\Http\Controllers\ImageListController@showDetail');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
