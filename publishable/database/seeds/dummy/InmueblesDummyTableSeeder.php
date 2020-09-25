<?php

use App\Inmuebles\Inmueble;
use Illuminate\Database\Seeder;

class InmueblesDummyTableSeeder extends Seeder
{
    public function run()
    {
        //Casas
        factory(Inmueble::class, 20)->states('casas.venta')->create();
        factory(Inmueble::class, 20)->states('casas.alquiler')->create();
        factory(Inmueble::class, 20)->states('casas.emprendimiento')->create();

        //Departamento
        factory(Inmueble::class, 20)->states('departamentos.venta')->create();
        factory(Inmueble::class, 20)->states('departamentos.alquiler.ARS')->create();
        factory(Inmueble::class, 20)->states('departamentos.alquiler.USD')->create();
    }
}
