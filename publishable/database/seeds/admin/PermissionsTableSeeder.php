<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;
use EzeRoldan\VoyagerTools\Seeder\InsertSeeder;

class PermissionsTableSeeder extends Seeder
{
    use InsertSeeder;

    public function run(): void
    {
        $this->setModelClass(Permission::class);
        $this->setDataPartial('table_name', null);
        $this->insertManyByFields(['key'], [
            'browse_admin',
            'browse_bread',
            'browse_database',
            'browse_media',
            'browse_compass',
        ]);

        Permission::generateFor('menus');
        Permission::generateFor('roles');
        Permission::generateFor('users');
        Permission::generateFor('settings');
    }
}
