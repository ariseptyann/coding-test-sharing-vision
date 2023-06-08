<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('article', [App\Http\Controllers\ArticleController::class, 'createArticle'])->name('api.create_article');
Route::get('article', [App\Http\Controllers\ArticleController::class, 'getAllArticle'])->name('api.all_article');
Route::get('article/{id}', [App\Http\Controllers\ArticleController::class, 'getArticleById'])->name('api.by_id_article');
Route::put('article/{id}', [App\Http\Controllers\ArticleController::class, 'updateArticle'])->name('api.update_article');
Route::delete('article/{id}', [App\Http\Controllers\ArticleController::class, 'deleteArticle'])->name('api.delete_article');
