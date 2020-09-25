<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->seddersAdmin();
        $this->seddersApp();

        /** Permisos a Todos los Modulos */
        $this->call(PermissionRoleTableSeeder::class);
    }

    protected function seddersAdmin(): void
    {

        /** Modulos */
        $this->call(DataTypesTableSeeder::class);
        $this->call(DataRowsTableSeeder::class);

        /** Menu */
        $this->call(MenusTableSeeder::class);

        /** Roles, Usuarios y Permisos */
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);

        /** Settings */
        $this->call(SettingsTableSeeder::class);
    }

    protected function seddersApp(): void
    {

        $this->call(NavbarSeeder::class);

        $this->call(NovedadesCategoriasTableSeeder::class);
        $this->call(NovedadesTableSeeder::class);

        $this->call(SlideshowsCategoriasTableSeeder::class);
        $this->call(SlideshowsTableSeeder::class);

        $this->call(PaginasTableSeeder::class);
        $this->call(SucursalesTableSeeder::class);
        $this->call(SuscriptoresTableSeeder::class);

        $this->call(ConsultasTableSeeder::class);
    }
}
