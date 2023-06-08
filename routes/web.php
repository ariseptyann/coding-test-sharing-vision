<?php

// use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\Frontend\ArticleController::class, 'allPosts'])->name('frontend.all_post');

Route::prefix('all_post')->group(function () {
    Route::get('edit/{id}', [App\Http\Controllers\Frontend\ArticleController::class, 'editAllPost'])->name('frontend.edit.all_post');
    Route::get('delete/{id}', [App\Http\Controllers\Frontend\ArticleController::class, 'deleteAllPost'])->name('frontend.delete.all_post');
    Route::put('update/{id}', [App\Http\Controllers\Frontend\ArticleController::class, 'updateAllPost'])->name('frontend.update.all_post');
    Route::get('publish/{id}', [App\Http\Controllers\Frontend\ArticleController::class, 'publishAllPost'])->name('frontend.publish.all_post');
    Route::get('draft/{id}', [App\Http\Controllers\Frontend\ArticleController::class, 'draftAllPost'])->name('frontend.draft.all_post');
});

Route::prefix('add_new')->group(function () {
    Route::get('form', [App\Http\Controllers\Frontend\AddNewController::class, 'formAddNew'])->name('frontend.add_new.form');
    Route::get('publish', [App\Http\Controllers\Frontend\AddNewController::class, 'publishAddNew'])->name('frontend.add_new.publish');
    Route::get('draft', [App\Http\Controllers\Frontend\AddNewController::class, 'draftAddNew'])->name('frontend.add_new.draft');
});

Route::get('preview', [App\Http\Controllers\Frontend\ArticleController::class, 'preview'])->name('frontend.preview');