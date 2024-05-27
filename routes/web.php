<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

use function App\Http\Controllers\index;

Route::get('/', function () {
    return view('welcome');
});

Route::get('articles', [ArticleController::class, 'index'])->name('article.index');
// Route::get('article/{id}', [ArticleController::class, 'details'])->name('article.detais');
Route::get('article/', [ArticleController::class, 'show'])->name('article.detais');
Route::get('article/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('article/store', [ArticleController::class, 'store'])->name('article.store');