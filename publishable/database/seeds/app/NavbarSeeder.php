<?php

use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use Illuminate\Database\Seeder;
use EzeRoldan\VoyagerTools\Seeder\InsertSeeder;

class NavbarSeeder extends Seeder
{
    use InsertSeeder;

    public function run(): void
    {

        $this->setModelClass(MenuItem::class);
        $this->setDataPartials(['url' => null, 'target' => '_self']);

        /** Header */
        $menu = Menu::firstOrCreate(['name' => 'header']);
        $this->setDataPartial('menu_id', $menu->id);

        $this->insertManyByFields(['title', 'route', 'order'], [
            ['Home', 'home', 1],
        ]);

        /** Footer */
        $menu = Menu::firstOrCreate(['name' => 'footer']);
        $this->setDataPartial('menu_id', $menu->id);

        $this->insertManyByFields(['title', 'route', 'order'], [
            ['Privacidad y Uso del Sitio', '', 1]
        ]);
    }
}
