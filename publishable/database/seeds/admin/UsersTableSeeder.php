<?php

use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {

        /** Administrador General */
        $DEV = Role::where('name', 'DEV')->firstOrFail();
        User::create([
            'role_id'           => $DEV->id,
            'name'              => 'Admin',
            'email'             => 'admin@admin.com',
            'password'          => bcrypt('password'),
            'locale'            => 'es',
            'remember_token'    => Str::random(60),
            'email_verified_at' => now()
        ]);
    }
}
