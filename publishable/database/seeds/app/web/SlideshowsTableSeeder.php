<?php

use App\Web\Slideshows\Categoria;
use App\Web\Slideshows\Slideshow;
use EzeRoldan\VoyagerTools\Seeder\Bread\BreadSeeder;

class SlideshowsTableSeeder extends BreadSeeder
{
    protected function bread(): void
    {
        $this->selectMenuItemParent('Web');

        $this->setModel(Slideshow::class);

        $this->setIcon('mdi mdi-image-multiple');

        $this->setNamePlural('Slideshows');
        $this->setNameSingular('Slideshow');

        $this->setMenuItemOrden(4);
        $this->setOrderBy('orden');
    }

    protected function fields(): void
    {
        $this->addFieldId();

        $this->addFieldNombre(5);
        $this->addRelationBelongsTo(Categoria::class, 'categoria_id', 'Categoria', 2);
        $this->addFieldDate('desde');
        $this->addFieldDate('hasta');
        $this->addFieldCheckbox('habilitado', 'Habilitado', 'SI', 'NO', true, 1);

        $this->addFieldText('titulo', 'Titulo', false, 5)->hideInPageBrowse();
        $this->addFieldText('link', 'Link URL', false, 4)->hideInPageBrowse();
        $this->addFieldCheckbox('blank', 'Tipo de Link', 'Externo', 'Interno', false, 1)->hideInPageBrowse();
        $this->addFieldColor('color', 'Color', false, 1)->hideInPageBrowse();
        $this->addFieldNumber('orden', 'Orden', false, 1, 99, null, 1)->hideInPageBrowse();

        $this->addFieldTextarea('texto', 'Texto', false, 10, 2);
        $this->addFieldImage('imagen', 'Imagen de 1920px * 500px', false, 2, 1920, 500)->hideInPageBrowse();

        $this->addFieldTimestamps();
    }

    protected function data(): void
    {
    }
}
