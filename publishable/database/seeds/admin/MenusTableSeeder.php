<?php

use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use Illuminate\Database\Seeder;
use EzeRoldan\VoyagerTools\Seeder\InsertSeeder;

class MenusTableSeeder extends Seeder
{
    use InsertSeeder;

    public function run(): void
    {

        Menu::firstOrCreate(['name' => 'admin',]);

        $this->setModelClass(MenuItem::class);
        $this->setDataPartials([
            'url'     => null,
            'target'  => '_self',
            'menu_id' => Menu::where('name', 'admin')->firstOrFail()->id,
        ]);

        $this->insertManyByFields(['title', 'route', 'icon_class', 'order'], [
            [__('voyager::seeders.menu_items.dashboard'), 'voyager.dashboard',      'mdi mdi-view-dashboard',       1],
            
            ['Web',         null, 'mdi mdi-laptop', 2],
            
            [__('voyager::seeders.menu_items.media'),     'voyager.media.index',    'mdi mdi-folder-image',         3],
            [__('voyager::seeders.menu_items.users'),     'voyager.users.index',    'mdi mdi-account-multiple',     4],
            [__('voyager::seeders.menu_items.roles'),     'voyager.roles.index',    'mdi mdi-card-account-details', 5],
            [__('voyager::seeders.menu_items.tools'),     null,                     'mdi mdi-hammer',               6],
            [__('voyager::seeders.menu_items.settings'),  'voyager.settings.index', 'mdi mdi-cog',                  7],
        ]);

        $this->setDataPartial('parent_id', MenuItem::where('title', __('voyager::seeders.menu_items.tools'))->firstOrFail()->id);
        $this->insertManyByFields(['title', 'route', 'icon_class', 'order'], [
            [__('voyager::seeders.menu_items.menu_builder'), 'voyager.menus.index',    'mdi mdi-format-list-bulleted', 1],
            [__('voyager::seeders.menu_items.database'),     'voyager.database.index', 'mdi mdi-database',             2],
            [__('voyager::seeders.menu_items.compass'),      'voyager.compass.index',  'mdi mdi-compass-outline',      3],
            [__('voyager::seeders.menu_items.bread'),        'voyager.bread.index',    'mdi mdi-bread-slice-outline',  4],
        ]);
    }
}
