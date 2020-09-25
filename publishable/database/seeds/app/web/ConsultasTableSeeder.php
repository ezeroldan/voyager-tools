<?php

use App\Web\Consulta;
use EzeRoldan\VoyagerTools\Seeder\Bread\BreadSeeder;

class ConsultasTableSeeder extends BreadSeeder
{

    protected function bread(): void
    {
        $this->selectMenuItemParent('Web');

        $this->setModel(Consulta::class);

        $this->setIcon('mdi mdi-email-mark-as-unread');
        $this->setNamePlural('Consultas');
        $this->setNameSingular('Consulta');

        $this->setServerSide();
        $this->setMenuItemOrden(8);
    }

    protected function fields(): void
    {
        $this->addFieldId();

        $this->addFieldText('nombre',   'nombre',   true, 6);
        $this->addFieldText('apellido', 'Apellido', true, 6);
        $this->addFieldText('email',    'Email',    true, 6);
        $this->addFieldText('telefono', 'Telefono', true, 6);

        $this->addFieldTextarea('mensaje', 'Mensaje', false);

        $this->addFieldTimestamps();
    }

    protected function data(): void
    {
    }
}
