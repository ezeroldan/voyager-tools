<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;

class SelectMultiple extends Field
{
    public function __construct(string $dbColName, string $name = null, bool $required = true, int $width = null)
    {
        parent::__construct('select_multiple', $dbColName, $name,  $required, $width);
    }
}
