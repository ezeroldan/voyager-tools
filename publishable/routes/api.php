<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Web')->group(function () {
    Route::post('/newsletter-suscripcion', 'SuscriptorController@store');
});
