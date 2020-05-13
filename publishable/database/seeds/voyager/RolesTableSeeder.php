<?php

use TCG\Voyager\Models\Role;
use Illuminate\Database\Seeder;
use EzeRoldan\VoyagerTools\Seeder\InsertSeeder;

class RolesTableSeeder extends Seeder
{
    use InsertSeeder;

    public function run(): void
    {
        $this->setModelClass(Role::class);
        $this->insertManyByFields(['name', 'display_name'], [
            ['admin',    __('voyager::seeders.roles.admin')],
            ['user',     __('voyager::seeders.roles.user')]
        ]);
    }
}
