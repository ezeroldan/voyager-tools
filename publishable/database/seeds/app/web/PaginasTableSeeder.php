<?php

use App\Web\Pagina;
use EzeRoldan\VoyagerTools\Seeder\Bread\BreadSeeder;

class PaginasTableSeeder extends BreadSeeder
{
    protected function bread(): void
    {
        $this->selectMenuItemParent('Web');

        $this->setModel(Pagina::class);

        $this->setIcon('mdi mdi-file-document-edit-outline');
        $this->setNamePlural('Paginas');
        $this->setNameSingular('Pagina');
    }

    protected function fields(): void
    {
        $this->addFieldId();

        $this->addFieldNombre(6);
        $this->addFieldSlug(6);

        $this->addFieldRichText('body', 'Contenido de la Pagina', false, 9);
        $this->addFieldImage('foto', 'Foto', false, 3);

        $this->addFieldSeo();
        $this->addFieldTimestamps();
    }

    protected function data(): void
    {
    }
}
