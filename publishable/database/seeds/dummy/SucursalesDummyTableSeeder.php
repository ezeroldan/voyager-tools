<?php

use App\Web\Sucursal;
use Illuminate\Database\Seeder;

class SucursalesDummyTableSeeder extends Seeder
{
    public function run()
    {
        factory(Sucursal::class, 12)->create();
    }
}
