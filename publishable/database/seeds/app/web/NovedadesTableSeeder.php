<?php

use App\Web\Novedades\Categoria;
use App\Web\Novedades\Novedad;
use EzeRoldan\VoyagerTools\Seeder\Bread\BreadSeeder;

class NovedadesTableSeeder extends BreadSeeder
{
    protected function bread(): void
    {
        $this->selectMenuItemParent('Web');

        $this->setModel(Novedad::class);

        $this->setIcon('mdi mdi-newspaper');
        $this->setNamePlural('Novedades');
        $this->setNameSingular('Novedad');

        $this->setMenuItemOrden(2);
    }

    protected function fields(): void
    {
        $this->addFieldId();

        $this->addRelationBelongsTo(Categoria::class, 'categoria_id', 'Categoria', 2);
        $this->addFieldNombre(5);
        $this->addFieldSlug(5);

        $this->addFieldRadioButtom('estado', 'Estado', true, 2)
            ->addOption(Novedad::ESTADO_BORRADOR, 'Borrador')
            ->addOption(Novedad::ESTADO_PUBLICADO, 'Publicado')
            ->addOption(Novedad::ESTADO_DESHABILITADO, 'Deshabilitado');

        $this->addFieldTextarea('copete', 'Copete', false, 6);
        $this->addFieldImage('fotos', 'Fotos', false, 4);

        $this->addFieldRichText('description', 'Contenido de la Novedad');

        $this->addFieldSeo();

        $this->addFieldTimestamps();
    }

    protected function data(): void
    {
    }
}
