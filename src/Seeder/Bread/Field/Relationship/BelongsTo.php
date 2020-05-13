<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Relationship;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Relationship\Relationship;

class BelongsTo extends Relationship
{
    public function __construct(string $breadTable, string $model, string $foreignKey, string $name, int $width = null, bool $required = true, string $label = 'nombre')
    {
        parent::__construct('belongsTo', $breadTable, $model, $foreignKey, $name, $width, $required, $label);
    }
}
