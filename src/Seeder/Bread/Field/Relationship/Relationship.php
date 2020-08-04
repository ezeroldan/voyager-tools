<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Relationship;

use Illuminate\Support\Str;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;
use EzeRoldan\VoyagerTools\Seeder\Bread\Traits\Bread;


abstract class Relationship extends Field
{

    use Bread;

    public function __construct(string $type, string $breadTable, string $model, string $foreignKey, string $name, int $width = null, bool $required = true, string $label = 'nombre')
    {

        $modelInstances = with(new $model());

        $fields = [
            $breadTable,
            Str::lower($type),
            $modelInstances->getTable(),
            'relationship',
        ];
        $field = implode('_', $fields);

        parent::__construct('relationship', $field, $name, $required, $width);

        $this->setExtra('type', $type);

        $this->extras['model'] = $model;
        $this->setExtra('table', $modelInstances->getTable());
        $this->setExtra('key',  $modelInstances->getKeyName());

        $this->setExtra('column', $foreignKey);
        $this->setExtra('label', $label);
    }
}
