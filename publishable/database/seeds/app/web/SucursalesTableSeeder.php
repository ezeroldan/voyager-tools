<?php

use App\Web\Sucursal;
use EzeRoldan\VoyagerTools\Seeder\Bread\BreadSeeder;

class SucursalesTableSeeder extends BreadSeeder
{

    protected function bread(): void
    {
        $this->selectMenuItemParent('Web');

        $this->setModel(Sucursal::class);

        $this->setIcon('mdi mdi-home-map-marker');

        $this->setNamePlural('Sucursales');
        $this->setNameSingular('Sucursal');

        $this->setMenuItemOrden(7);
    }

    protected function fields(): void
    {
        $this->addFieldId();

        $this->addFieldNombre(6);
        $this->addFieldText('email', 'Email', false, 6);

        $this->addFieldText('telefono', 'Telefono', false, 6);
        $this->addFieldText('direccion', 'Direccion', false, 6);

        $this->addFieldMap('mapa');

        $this->addFieldTimestamps();
    }

    protected function data(): void
    {
    }
}
