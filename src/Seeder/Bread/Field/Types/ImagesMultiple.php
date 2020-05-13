<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;

class ImagesMultiple extends Field
{
    public function __construct(string $dbColName, string $name = null, bool $required = true, int $width = null)
    {
        parent::__construct('multiple_images', $dbColName, $name,  $required, $width);
    }
}
