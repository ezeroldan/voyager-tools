<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;

class MenusTableSeeder extends Seeder
{
    public function run(): void
    {
        /** Admin */
        Menu::firstOrCreate(['name' => 'admin',]);

        /** Front */
        Menu::firstOrCreate(['name' => 'header',]);
        Menu::firstOrCreate(['name' => 'footer',]);
    }
}
