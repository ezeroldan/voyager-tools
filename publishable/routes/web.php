<?php

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Route;

/** Home */
Route::view('/', 'home')->name('home');

/** Admin de Voyager */
Route::prefix('/admin')->group(function () {
    return Voyager::routes();
});
