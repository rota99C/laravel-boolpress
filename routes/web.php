<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\PostController;
use App\Models\Category;
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
Route::get('/categories/{category}/posts', 'CategoryController@filter')->name('categories.posts');
Route::get('/', 'PostController@index')->name('guest.index');
Route::get('/posts/{post}', 'PostController@show')->name('guest.show');
Route::get('/tags/{tag}/posts', 'TagController@filter')->name('tags.posts');

// Rotte lato admin
Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/posts', 'PostController@index')->name('posts.index');
    Route::get('/posts/create', 'PostController@create')->name('posts.create');
    Route::post('/posts', 'PostController@store')->name('posts.store');
    Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
    Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
    Route::put('posts/{post}', 'PostController@update')->name('posts.update');
    Route::delete('posts/{post}', 'PostController@destroy')->name('posts.destroy');


    Route::resource('products', ProductController::class);
    //Rotte lato admin.categories
    Route::resource('categories', CategoryController::class);
    Route::get('/categories', 'CategoryController@index')->name('categories.index');
    Route::post('/categories', 'CategoryController@store')->name('categories.store');
    Route::put('/categories/{category}', 'CategoryController@update')->name('categories.update');
    Route::delete('categories/{category}', 'CategoryController@destroy')->name('categories.destroy');

    //Rotte lato admin.tags
    Route::resource('tags', CategoryController::class);
    Route::get('/tags', 'TagController@index')->name('tags.index');
    Route::post('/tags', 'TagController@store')->name('tags.store');
    Route::put('/tags/{tag}', 'TagController@update')->name('tags.update');
    Route::delete('tags/{tag}', 'TagController@destroy')->name('tags.destroy');
});
