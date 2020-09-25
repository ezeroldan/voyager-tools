<?php

namespace App\Console\Commands;

use App\Web\Pagina;
use Spatie\Sitemap\Sitemap;
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

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
