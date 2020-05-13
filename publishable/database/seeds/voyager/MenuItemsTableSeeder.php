<?php

use TCG\Voyager\Models\Menu;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\MenuItem;
use EzeRoldan\VoyagerTools\Seeder\InsertSeeder;

class MenuItemsTableSeeder extends Seeder
{
    use InsertSeeder;

    public function run(): void
    {
        $this->setModelClass(MenuItem::class);
        $this->setDataPartials([
            'url'     => null,
            'target'  => '_self',
            'menu_id' => Menu::where('name', 'admin')->firstOrFail()->id,
        ]);

        $this->insertManyByFields(['title', 'route', 'icon_class', 'order'], [
            [__('voyager::seeders.menu_items.dashboard'), 'voyager.dashboard',      'mdi mdi-view-dashboard',       1],
            [__('voyager::seeders.menu_items.media'),     'voyager.media.index',    'mdi mdi-folder-image',         2],
            [__('voyager::seeders.menu_items.users'),     'voyager.users.index',    'mdi mdi-account-multiple',     3],
            [__('voyager::seeders.menu_items.roles'),     'voyager.roles.index',    'mdi mdi-card-account-details', 4],
            [__('voyager::seeders.menu_items.tools'),     null,                     'mdi mdi-hammer',               5],
            [__('voyager::seeders.menu_items.settings'),  'voyager.settings.index', 'mdi mdi-cog',                  6],
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
