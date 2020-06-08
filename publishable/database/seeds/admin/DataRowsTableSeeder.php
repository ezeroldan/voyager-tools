<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use EzeRoldan\VoyagerTools\Seeder\InsertSeeder;

class DataRowsTableSeeder extends Seeder
{
    use InsertSeeder;

    public function run(): void
    {
        $this->setModelClass(DataRow::class);

        /** Users */
        $this->setDataPartial('data_type_id', DataType::where('slug', 'users')->firstOrFail()->id);
        $this->insertManyByFields(['field', 'type', 'display_name', 'required', 'browse', 'read', 'edit', 'add', 'delete', 'details', 'order'], [
            ['id',             'number',    __('voyager::seeders.data_rows.id'),             true,  false, false, false, false, false, '{}', 1],
            ['name',           'text',      __('voyager::seeders.data_rows.name'),           true,  true,  true,  true,  true,  true,  '{}', 2],
            ['email',          'text',      __('voyager::seeders.data_rows.email'),          true,  true,  true,  true,  true,  true,  '{}', 3],
            ['password',       'password',  __('voyager::seeders.data_rows.password'),       true,  false, false, true,  true,  false, '{}', 4],
            ['remember_token', 'text',      __('voyager::seeders.data_rows.remember_token'), false, false, false, false, false, false, '{}', 5],
            ['created_at',     'timestamp', __('voyager::seeders.data_rows.created_at'),     false, true,  true,  false, false, false, '{}', 6],
            ['updated_at',     'timestamp', __('voyager::seeders.data_rows.updated_at'),     false, false, false, false, false, false, '{}', 7],
            ['avatar',         'image',     __('voyager::seeders.data_rows.avatar'),         false, true,  true,  true,  true,  true,  '{}', 8],
            ['user_belongsto_role_relationship', 'relationship', __('voyager::seeders.data_rows.role'), false, true, true, true, true, false, [
                'model'       => 'TCG\\Voyager\\Models\\Role',
                'table'       => 'roles',
                'type'        => 'belongsTo',
                'column'      => 'role_id',
                'key'         => 'id',
                'label'       => 'display_name',
                'pivot_table' => 'roles',
                'pivot'       => false,
            ], 10],
            ['user_belongstomany_role_relationship', 'relationship', 'Roles', false, true, true, true, true, false, [
                'model'       => 'TCG\\Voyager\\Models\\Role',
                'table'       => 'roles',
                'type'        => 'belongsToMany',
                'column'      => 'id',
                'key'         => 'id',
                'label'       => 'display_name',
                'pivot_table' => 'user_roles',
                'pivot'       => '1',
                'taggable'    => '0',
            ], 11],
            ['settings', 'hidden', 'Settings', false, false, false, false, false, false, '{}', 12]
        ]);

        /** Menus */
        $this->setDataPartial('data_type_id', DataType::where('slug', 'menus')->firstOrFail()->id);
        $this->insertManyByFields(['field', 'type', 'display_name', 'required', 'browse', 'read', 'edit', 'add', 'delete', 'order'], [
            ['id',         'number',    __('voyager::seeders.data_rows.id'),         true,  false, false, false, false, false, 1],
            ['name',       'text',      __('voyager::seeders.data_rows.name'),       true,  true,  true,  true,  true,  true,  2],
            ['created_at', 'timestamp', __('voyager::seeders.data_rows.created_at'), false, false, false, false, false, false, 3],
            ['updated_at', 'timestamp', __('voyager::seeders.data_rows.updated_at'), false, false, false, false, false, false, 4]
        ]);

        /** Roles*/
        $this->setDataPartial('data_type_id', DataType::where('slug', 'roles')->firstOrFail()->id);
        $this->insertManyByFields(['field', 'type', 'display_name', 'required', 'browse', 'read', 'edit', 'add', 'delete', 'order'], [
            ['id',           'number',    __('voyager::seeders.data_rows.id'),           true, false,  false, false, false, false, 1],
            ['name',         'text',      __('voyager::seeders.data_rows.name'),         true,  true,  true,  true,  true,  true,  2],
            ['created_at',   'timestamp', __('voyager::seeders.data_rows.created_at'),   false, false, false, false, false, false, 3],
            ['updated_at',   'timestamp', __('voyager::seeders.data_rows.updated_at'),   false, false, false, false, false, false, 4],
            ['display_name', 'text',      __('voyager::seeders.data_rows.display_name'), true,  true,  true,  true,  true,  true,  5],
            ['role_id',      'text',      __('voyager::seeders.data_rows.role'),         true,  true,  true,  true,  true,  true,  6]
        ]);
    }
}
