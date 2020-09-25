<?php

use App\Web\Suscriptor;
use App\Http\Controllers\Admin\SuscriptorController;
use EzeRoldan\VoyagerTools\Seeder\Bread\BreadSeeder;

class SuscriptoresTableSeeder extends BreadSeeder
{

    protected function bread(): void
    {
        $this->selectMenuItemParent('Web');

        $this->setModel(Suscriptor::class);

        $this->setIcon('mdi mdi-mailbox');

        $this->setNamePlural('Suscriptores');
        $this->setNameSingular('Suscriptor');

        $this->setServerSide();
        $this->setMenuItemOrden(6);

        $this->setController(SuscriptorController::class);
    }

    protected function fields(): void
    {
        $this->addFieldId();
        $this->addFieldText('email', 'Email', true);
        $this->addFieldTimestamps();
    }

    protected function data(): void
    {
    }
}
