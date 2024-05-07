<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ArticleController;

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
Route::get('about', [PageController::class, 'about'])
    ->name('about');
Route::get('rating', [RatingController::class, 'index'])
    ->name('rating.index');
Route::get('articles', [ArticleController::class, 'index'])
    ->name('articles.index');
Route::get('articles/{id}', [ArticleController::class, 'show'])
    ->name('articles.show');

//Route::get('articles/{articleId}/comments/{id}', function ($articleId, $id) {
//    // ...
//});
