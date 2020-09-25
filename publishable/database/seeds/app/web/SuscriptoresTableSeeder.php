<?php

use App\Inmuebles\Tipo;
use App\Web\Suscriptor;
use App\Inmuebles\Operacion;
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

        $this->addRelationBelongsTo(Tipo::class, 'tipo_id', 'Tipo de Inmueble', 3, true, 'singular');
        $this->addRelationBelongsTo(Operacion::class, 'operacion_id', 'Tipo de Operacion', 3);

        $this->addFieldText('email', 'Email', true, 6);

        $this->addFieldTimestamps();
    }

    protected function data(): void
    {
    }
}
