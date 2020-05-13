<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Relationship;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Relationship\Relationship;

class BelongsToMany extends Relationship
{
    public function __construct(string $breadTable, string $model, string $pivotTable, string $name, int $width = null, bool $taggable = false, string $label = 'nombre')
    {
        parent::__construct('belongsToMany', $breadTable, $model, 'id', $name, $width, false, $label);
        $this->setExtra('pivot', 1);
        $this->setExtra('taggable', ($taggable) ? 'on' : null);
        $this->setExtra('pivot_table', $pivotTable);
    }
}
