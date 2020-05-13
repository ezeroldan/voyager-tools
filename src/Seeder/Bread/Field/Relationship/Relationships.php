<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Relationship;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Traits\Fields;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Relationship\HasOne;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Relationship\HasMany;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Relationship\BelongsTo;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Relationship\BelongsToMany;

trait Relationships
{
    use Fields;

    protected function addRelationHasOne(string $model, string $foreignKey, string $name, int $width = null, bool $required = true, string $label = 'nombre'): HasOne
    {
        $this->addFieldHidden($foreignKey, null, $required)->hideInPageBrowse();
        return $this->addField(new HasOne($this->getBread()->getModelTableName(), $model, $foreignKey, $name, $width, $required, $label));
    }

    protected function addRelationHasMany(string $model, string $foreignKey, string $name, int $width = null, bool $required = true, string $label = 'nombre'): HasMany
    {
        $this->addFieldHidden($foreignKey, null, $required)->hideInPageBrowse();
        return $this->addField(new HasMany($this->getBread()->getModelTableName(), $model, $foreignKey, $name, $width, $required, $label));
    }

    protected function addRelationBelongsTo(string $model, string $foreignKey, string $name, int $width = null, bool $required = true, string $label = 'nombre'): BelongsTo
    {
        $this->addFieldHidden($foreignKey, null, $required)->hideInPageBrowse();
        return  $this->addField(new BelongsTo($this->getBread()->getModelTableName(), $model, $foreignKey, $name, $width, $required, $label));
    }

    protected function addRelationBelongsToMany(string $model, string $pivotTable, string $name, int $width = null, bool $taggable = false, string $label = 'nombre'): BelongsToMany
    {
        //$this->addFieldHidden($foreignKey, null, false)->hideInPageBrowse();
        return  $this->addField(new BelongsToMany($this->getBread()->getModelTableName(), $model, $pivotTable, $name, $width, $taggable, $label));
    }
}
