<?php

use App\Web\Novedades\Categoria;
use EzeRoldan\VoyagerTools\Seeder\Bread\BreadSeeder;

class NovedadesCategoriasTableSeeder extends BreadSeeder
{
    protected function bread(): void
    {
        $this->selectMenuItemParent('Web');

        $this->setModel(Categoria::class);

        $this->setIcon('mdi mdi-folder-text-outline');
        $this->setNamePlural('Novedades Categorias');
        $this->setNameSingular('Novedad Categoria');

        $this->setMenuItemOrden(3);
    }

    protected function fields(): void
    {
        $this->addFieldId();
        $this->addFieldNombre(4);
        $this->addFieldSlug(4);
        $this->addFieldColor()->setOptional();
        $this->addFieldCheckbox('habilitado', 'Habilitado', 'Habilitado', 'Deshabilitado');
        $this->addFieldTimestamps();
    }

    protected function data(): void
    {
    }
}
