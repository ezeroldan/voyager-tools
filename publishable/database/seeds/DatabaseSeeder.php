<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->seddersVoyager();
        $this->seddersApp();
        $this->seddersDummy();

        /** Permisos a Todos los Modulos */
        $this->call(PermissionRoleTableSeeder::class);
    }

    protected function seddersVoyager(): void
    {

        /** Modulos */
        $this->call(DataTypesTableSeeder::class);
        $this->call(DataRowsTableSeeder::class);

        /** Menu */
        $this->call(MenusTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);

        /** Roles, Usuarios y Permisos */
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);

        /** Settings */
        $this->call(SettingsTableSeeder::class);
    }

    protected function seddersApp(): void
    {
    }

    protected function seddersDummy(): void
    {
    }
}
