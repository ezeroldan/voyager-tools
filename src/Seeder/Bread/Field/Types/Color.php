<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;

class Color extends Field
{
    public function __construct(string $dbColName = 'color', string $name = 'Color', bool $required = true, int $width = 2)
    {
        parent::__construct('color', $dbColName, $name, $required, $width);
    }
}
