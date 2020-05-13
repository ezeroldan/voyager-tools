<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;

class Timestamp extends Field
{
    public function __construct(string $dbColName, string $name = null, bool $required = true, int $width = null, string $format = '%d/%m/%Y %H:%i')
    {
        parent::__construct('timestamp', $dbColName, $name,  $required, $width);
        $this->setExtra('format', $format);
    }
}
