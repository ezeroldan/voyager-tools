<?php

use App\Web\Slideshows\Categoria;
use EzeRoldan\VoyagerTools\Seeder\Bread\BreadSeeder;

class SlideshowsCategoriasTableSeeder extends BreadSeeder
{
    protected function bread(): void
    {
        $this->selectMenuItemParent('Web');

        $this->setModel(Categoria::class);

        $this->setIcon('mdi mdi-folder-image');
        $this->setNamePlural('Slideshows Categorias');
        $this->setNameSingular('Slideshow Categoria');

        $this->setMenuItemOrden(5);
    }
    protected function fields(): void
    {
        $this->addFieldId();
        $this->addFieldNombre(5);
        $this->addFieldSlug(5);
        $this->addFieldCheckbox('habilitado', 'Habilitado', 'Habilitado', 'Deshabilitado');
        $this->addFieldTimestamps();
    }

    protected function data(): void
    {
        $this->setSlugFiled('nombre');
        $this->setDataPartial('habilitado', true);

        $this->insertManyByField('nombre', [
            'Home',
        ]);
    }
}
