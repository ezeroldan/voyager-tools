<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Setting;
use EzeRoldan\VoyagerTools\Seeder\InsertSeeder;

class SettingsTableSeeder extends Seeder
{
    use InsertSeeder;

    public function run(): void
    {
        $this->setModelClass(Setting::class);
        $this->setDataPartials(['details' => null]);

        /** Site */
        $this->setDataPartial('group', 'Site');
        $this->insertManyByFields(['key', 'display_name', 'type', 'value', 'order'], [
            ['site.title',          __('voyager::seeders.settings.site.title'),         'text', config('app.name'), 1],
            ['site.description',    __('voyager::seeders.settings.site.description'),   'text', __('voyager::seeders.settings.site.description'), 2],
            ['site.logo',           __('voyager::seeders.settings.site.logo'),          'image', null, 3],
            ['site.google_analytics_tracking_id', __('voyager::seeders.settings.site.google_analytics_tracking_id'), 'text', null, 4],
        ]);

        /** Admin */
        $this->setDataPartial('group', 'Admin');
        $this->insertManyByFields(['key', 'display_name', 'type', 'value', 'order'], [
            ['admin.title',         __('voyager::seeders.settings.admin.title'),            'text',     config('app.name'), 1],
            ['admin.description',   __('voyager::seeders.settings.admin.description'),      'text',     'Bienvenido a ' . config('app.name') . '. Sistema desarrollado por Ezequiel Roldan', 2],
            ['admin.loader',        __('voyager::seeders.settings.admin.loader'),           'image',    'settings/admin-loader.png', 3],
            ['admin.icon_image',    __('voyager::seeders.settings.admin.icon_image'),       'image',    'settings/admin-icon_image.png', 4],
            ['admin.bg_image',      __('voyager::seeders.settings.admin.background_image'), 'image',    'settings/admin-bg_image.jpg', 5],
            ['admin.google_analytics_client_id', __('voyager::seeders.settings.admin.google_analytics_client_id'), 'text', null, 6],
        ]);
    }
}
