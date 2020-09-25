<?php

use App\Web\Suscriptor;
use Illuminate\Database\Seeder;
use EzeRoldan\VoyagerTools\Seeder\InsertSeeder;

class SuscriptoresDummyTableSeeder extends Seeder
{
    use InsertSeeder;

    public function run()
    {
        factory(Suscriptor::class, 30)->create();
    }
}
