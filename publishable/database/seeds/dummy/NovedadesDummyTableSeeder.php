<?php

use App\Web\Novedades\Novedad;
use Illuminate\Database\Seeder;
use App\Web\Novedades\Categoria;

class NovedadesDummyTableSeeder extends Seeder
{
    public function run()
    {
        factory(Categoria::class, 3)->create()->each(function (Categoria $categoria) {
            factory(Novedad::class, 10)->state(Novedad::ESTADO_BORRADOR)->create(['categoria_id' => $categoria->id]);
            factory(Novedad::class, 20)->state(Novedad::ESTADO_PUBLICADO)->create(['categoria_id' => $categoria->id]);
        });
    }
}
