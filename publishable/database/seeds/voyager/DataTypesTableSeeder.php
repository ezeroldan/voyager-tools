<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use EzeRoldan\VoyagerTools\Seeder\InsertSeeder;

class DataTypesTableSeeder extends Seeder
{
    use InsertSeeder;

    public function run(): void
    {
        $this->setModelClass(DataType::class);
        $this->setDataPartial('generate_permissions', 1);
        $this->insertManyByFields(['slug', 'name', 'display_name_singular', 'display_name_plural', 'icon', 'model_name', 'policy_name', 'controller'], [
            ['users', 'users', __('voyager::seeders.data_types.user.singular'), __('voyager::seeders.data_types.user.plural'), 'mdi mdi-account-multiple',     'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController'],
            ['menus', 'menus', __('voyager::seeders.data_types.menu.singular'), __('voyager::seeders.data_types.menu.plural'), 'mdi mdi-format-list-bulleted', 'TCG\\Voyager\\Models\\Menu', null, null],
            ['roles', 'roles', __('voyager::seeders.data_types.role.singular'), __('voyager::seeders.data_types.role.plural'), 'mdi mdi-account-card-details', 'TCG\\Voyager\\Models\\Role', null, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController']
        ]);
    }
}
