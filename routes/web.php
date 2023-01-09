<?php

use Illuminate\Support\Facades\Route;

Route::domain(config('filament.domain'))
    ->middleware(config('filament.middleware.base'))
    ->prefix('laravel-filemanager')
    ->group(function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
