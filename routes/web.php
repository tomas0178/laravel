<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\TweetController;
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

Route::get('/', [PagesController::class, 'index']);

//Route::get('/blog/tweet', [PostsController::class, 'tweet'])->name('blog.tweet');

Route::resource('/blog', PostsController::class);

Route::resource('/tweet', TweetController::class);


Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('scss', function () {
    return view('for-scss');
});

Route::post('posts/{post}/favorites', [FavoriteController::class, 'store'])->name('favorites');
Route::post('posts/{post}/unfavorites', [FavoriteController::class, 'destroy'])->name('unfavorites');
