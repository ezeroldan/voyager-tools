<?php

use App\Web\Pagina;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

/** Admin de Voyager */
Route::prefix('/admin')->group(function () {
    return Voyager::routes();
});

Route::namespace('Web')->group(function () {

    /** Home */
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/sucursales', 'SucursalesController@index')->name('sucursales');
    Route::get('/serviceworker.js', 'PwaController@serviceworker')->name('serviceworker');

    /** Novedades */
    Route::get('/novedades/{categoria:slug}', 'NovedadesController@categoria')->name('novedades.categoria');
    Route::get('/novedades', 'NovedadesController@index')->name('novedades');
    Route::get('/novedad/{novedad:slug}', 'NovedadesController@show')->name('novedad.show');

    /** Formulario de Consulta */
    Route::get('/consulta', 'ConsultaController@create')->name('consulta');
    Route::post('/consulta', 'ConsultaController@store')->name('consulta.store');
    Route::get('/consulta/gracias', 'ConsultaController@gracias')->name('consulta.gracias');
    Route::get('/consulta/mail/{consulta}', 'ConsultaController@mail')->name('consulta.email');

    /** Paginas */
    if (Schema::hasTable('paginas')) {
        $paginas = Pagina::all('slug')->pluck('slug')->implode('|');
        if ($paginas) {
            Route::get('/{pagina:slug}', 'PaginaController@show')
                ->where('pagina', $paginas)
                ->name('pagina');
        }
    }
});
