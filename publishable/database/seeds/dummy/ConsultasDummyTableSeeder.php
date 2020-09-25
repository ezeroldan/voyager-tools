<?php

use App\Web\Consulta;
use Illuminate\Database\Seeder;

class ConsultasDummyTableSeeder  extends Seeder
{
    public function run()
    {
        factory(Consulta::class, 100)->create();
    }
}
