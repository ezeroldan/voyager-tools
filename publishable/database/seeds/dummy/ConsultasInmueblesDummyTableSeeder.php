<?php

use Illuminate\Database\Seeder;
use App\Inmuebles\ConsultaInmueble;

class ConsultasInmueblesDummyTableSeeder  extends Seeder
{
    public function run()
    {
        factory(ConsultaInmueble::class, 100)->create();
    }
}
