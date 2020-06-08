<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Traits;

use EzeRoldan\VoyagerTools\Seeder\Bread\Traits\Bread;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\Text;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\Hidden;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Traits\Fields;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\Textarea;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\Timestamp;

trait CustomFields
{
    use Bread;
    use Fields;

    protected function addFieldId(): Hidden
    {
        return $this->addFieldHidden('id', null, false)
            ->hideInPageRead()
            ->hideInPageBrowse();
    }

    protected function addFieldNombre(int $width = null, bool $required = true): Text
    {

        if (!$this->isOrderBy()) {
            //$this->setOrderBy('nombre');
        }

        if (!$this->isDefaultSearchCol()) {
            $this->setDefaultSearchCol('nombre');
        }

        if (!$this->isOrderDisplayCol()) {
            //$this->setOrderDisplayCol('nombre');
        }

        return $this->addFieldText('nombre', 'Nombre', $required, $width);
    }

    protected function addFieldSlug(int $width = null, $origin = 'nombre', bool $forceUpdate = true): Text
    {
        return $this->addFieldText('slug', 'Identificador de URL (Slug)', true, $width, $origin, $forceUpdate)
            ->hideInPageBrowse();
    }

    protected function addFieldCreatedAt(): Timestamp
    {
        return $this->addFieldTimestamp('created_at', 'Creado', false, 6)
            ->showInPageRead()
            ->hideInPageBrowse()
            ->hideInPageEdit()
            ->hideInPageAdd();
    }

    protected function addFieldUpdatedAt(): Timestamp
    {
        return $this->addFieldTimestamp('updated_at', 'Actualizado', false, 6)
            ->showInPageRead()
            ->hideInPageBrowse()
            ->hideInPageEdit()
            ->hideInPageAdd();
    }

    protected function addFieldTimestamps(): void
    {
        $this->addFieldCreatedAt();
        $this->addFieldUpdatedAt();
    }

    protected function addFieldSeoDescription(int $width = 6, int $rows = 4): Textarea
    {
        return $this->addFieldTextarea('seo_description', 'SEO Description', false, $width, $rows);
    }

    protected function addFieldSeoKeywords(int $width = 6, int $rows = 4): Textarea
    {
        return $this->addFieldTextarea('seo_keywords', 'SEO Keywords', false, $width, $rows);
    }

    protected function addFieldSeo(int $width = 6, int $rows = 4): void
    {
        $this->addFieldSeoDescription($width, $rows)->hideInPageBrowse();
        $this->addFieldSeoKeywords($width, $rows)->hideInPageBrowse();
    }
}
