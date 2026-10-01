<?php

use Illuminate\Support\Facades\Route;
use Italofantone\Articles\Http\Controllers\ArticleController;

Route::prefix('articles')
    ->middleware(['web'])
    ->name('articles.')
    ->controller(ArticleController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');

        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');

        Route::get('/{article}/edit', 'edit')->name('edit');
        Route::put('/{article}', 'update')->name('update');

        Route::delete('/{article}', 'destroy')->name('destroy');

        Route::post('/{article}/publish', 'publish')->name('publish');
    });
