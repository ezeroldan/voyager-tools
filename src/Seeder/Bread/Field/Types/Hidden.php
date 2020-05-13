<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;

class Hidden extends Field
{
    public function __construct(string $dbColName, string $name = null, bool $required = true)
    {
        parent::__construct('hidden', $dbColName, $name,  $required);
    }
}
