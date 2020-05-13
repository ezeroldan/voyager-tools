<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;

class File extends Field
{
    public function __construct(string $dbColName, string $name = null, bool $required = true, int $width = null)
    {
        parent::__construct('file', $dbColName, $name,  $required, $width);
    }
}
