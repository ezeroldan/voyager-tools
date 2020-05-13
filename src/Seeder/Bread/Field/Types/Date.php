<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;

class Date extends Field
{
    public function __construct(string $dbColName, string $name = null, bool $required = true, int $width = 2, string $format = '%d/%m/%Y')
    {
        parent::__construct('date', $dbColName, $name,  $required, $width);
        $this->setExtra('format', $format);
    }
}
