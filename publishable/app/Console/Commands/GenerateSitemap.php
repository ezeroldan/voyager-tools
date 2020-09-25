<?php

namespace App\Console\Commands;

use App\Web\Pagina;
use App\Inmuebles\Tipo;
use App\Inmuebles\Inmueble;
use Spatie\Sitemap\Sitemap;
use App\Inmuebles\Operacion;
use App\Inmuebles\Geo\Barrio;
use App\Web\Novedades\Novedad;
use Illuminate\Console\Command;
use App\Web\Novedades\Categoria;

class GenerateSitemap extends Command
{

    protected $signature = 'sitemap:generate';
    protected $description = 'Generar sitemap';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $sitemap = Sitemap::create();

        /** Home */
        $sitemap->add('/');
        $sitemap->add('/consulta');
        $sitemap->add('/sucursales');

        /** Paginas */
        Pagina::all('slug')->each(function (Pagina $pagina) use ($sitemap) {
            $sitemap->add("/{$pagina->slug}");
        });

        /** Novedades */
        $sitemap->add('/novedades');
        Categoria::all()->each(function (Categoria $categoria) use ($sitemap) {
            $sitemap->add("/novedades/{$categoria->slug}");
        });
        Novedad::filter()->get()->each(function (Novedad $novedad) use ($sitemap) {
            $sitemap->add("/novedad/{$novedad->slug}");
        });

        /** Inmuebles Resultados */
        $barrios     = Barrio::filter()->get();
        $tipos       = Tipo::has('inmuebles')->get();
        $operaciones = Operacion::has('inmuebles')->get();

        $tipos->each(function (Tipo $tipo) use ($sitemap, $operaciones, $barrios) {
            $operaciones->each(function (Operacion $operacion) use ($sitemap,  $tipo, $barrios) {
                $sitemap->add("/{$tipo->slug}-para-{$operacion->slug}");
                $barrios->each(function (Barrio $barrio) use ($sitemap, $operacion, $tipo) {
                    $sitemap->add("/{$tipo->slug}-para-{$operacion->slug}-en-{$barrio->slug}");
                });
            });
        });
        $operaciones->each(function (Operacion $operacion) use ($sitemap, $barrios) {
            $sitemap->add("/{$operacion->slug}");

            $barrios->each(function (Barrio $barrio) use ($sitemap, $operacion) {
                $sitemap->add("/{$operacion->slug}-en-{$barrio->slug}");
            });
        });

        /** Inmueble Ficha */
        Inmueble::filter()->each(function (Inmueble $inmueble) use ($sitemap) {
            $sitemap->add("/{$inmueble->slug}");
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
