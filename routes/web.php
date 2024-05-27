<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

use function App\Http\Controllers\index;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(ArticleController::class)->group(function () {

    Route::get('articles', 'index');
    Route::get('/article/create', 'create')->name('article.create');
    Route::get('/article/{id}', 'show')->name('article.detais');
    Route::get('/article/{id}/edit', 'edit');


    Route::post('/article', 'store');
    Route::patch('/article/{id}', 'update');
    Route::delete('/article/{id}', 'destroy');
    });
