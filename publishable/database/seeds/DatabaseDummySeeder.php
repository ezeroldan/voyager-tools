<?php

class DatabaseDummySeeder extends DatabaseSeeder
{
    public function run(): void
    {
        parent::run();
        $this->call(PaginasDummyTableSeeder::class);
        $this->call(ConsultasDummyTableSeeder::class);
        $this->call(NovedadesDummyTableSeeder::class);
        $this->call(SucursalesDummyTableSeeder::class);
        $this->call(SuscriptoresDummyTableSeeder::class);
    }
}
