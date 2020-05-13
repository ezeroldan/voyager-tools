<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;

class Textarea extends Field
{
    public function __construct(string $dbColName, string $name = null, bool $required = true, int $width = null, int  $rows = 5)
    {
        parent::__construct('text_area', $dbColName, $name,  $required, $width);
        $this->extras['display']['rows'] = $rows;
        $this->hideInPageBrowse();
    }
}
