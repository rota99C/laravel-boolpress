<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/* creazione di una rotta API che restituisce la collezione di posts in formato JSON */
/* opzione con funzione - sintassi estesa */
/* N.B. le rotte API sono registrate sotto il prefisso api --> '/api/URI' */
/* Route::get('/posts', function () {
    $posts = Post::all();
    return response()->json([
        'chiave' => 'valore', // output che precede response personalizzabile 
        'response' => $posts
    ]);
}); */

/* opzione con funzione - sintassi scorciatoia di Laravel */
/* Route::get('/posts', function () {
    return Post::all(); // output non personalizzabile
    // è possibile usare i vari metodi Laravel come paginate() --> ovviamente cambierà la struttura dell'output
}); */

/* output con relazioni tra entità */
/* Route::get('/posts', function () {
    // inserisco come parametro un array con il nome dei metodi definiti per le relazione
    return Post::with(['category', 'tags'])->get();
});  */

/* opzione con controller */
Route::get('/posts', 'API\PostController@index');

/* controller che genera una Resource */
Route::get('/posts/{post}', 'API\PostController@show');
