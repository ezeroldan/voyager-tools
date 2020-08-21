<?php

use TCG\Voyager\Models\Role;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;

class PermissionRoleTableSeeder extends Seeder
{

    public function run(): void
    {
        /** Developer */
        $DEV = Role::where('name', 'DEV')->first();
        self::attachAllPermissions($DEV);
    }

    protected static function attachAllPermissions(Role &$role)
    {

        /** Obtener Ids */
        $ids = Permission::all()->pluck('id')->all();

        /** Asociar Permiso al Role */
        $role->permissions()->attach($ids);
    }

    protected static function attachPermissions(Role &$role, array $keys)
    {
        /** Obtener Ids */
        $ids = array_map(function ($key) {
            $permission = Permission::where('key', $key)->first('id');
            return $permission->id;
        }, $keys);

        $ids = array_filter($ids);

        /** Asociar Permiso al Role */
        $role->permissions()->attach($ids);
    }

    protected static function attachBreads(Role &$role, array $models)
    {
        /** Obtener Ids */
        $ids = [];
        foreach ($models as $model) {
            $table = (new $model())->getTable();
            $permissionIds = Permission::where('table_name', $table)->get(['id'])->pluck('id')->all();
            $ids = array_merge($ids, $permissionIds);
        }

        /** Asociar Permiso al Role */
        $role->permissions()->attach($ids);
    }
}
