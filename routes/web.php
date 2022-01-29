<?php

use App\Http\Controllers\PostController;
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



Auth::routes();



//Rotte lato guest
Route::resource('posts', PostController::class)->only(['index', 'show']);

Route::get('/', 'PostController@index')->name('guest.index');
Route::get('/posts/{post}', 'PostController@show')->name('guest.show');

// Rotte lato admin
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/posts', 'PostController@index')->name('posts.index');

    Route::resource('products', ProductController::class);
});
