<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;

class Text extends Field
{
    public function __construct(string $dbColName, string $name = null, bool $required = true, int $width = null, string $origin = null, bool $forceUpdate = null)
    {
        parent::__construct('text', $dbColName, $name,  $required, $width);

        if (!is_null($origin)) {
            $this->extras['slugify']['origin'] = $origin;
        }

        if (!is_null($forceUpdate)) {
            $this->extras['slugify']['forceUpdate'] = $forceUpdate;
        }
    }
}
