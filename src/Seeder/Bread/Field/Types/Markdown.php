<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;

class Markdown extends Field
{
    public function __construct(string $dbColName, string $name = null, bool $required = true, int $width = null)
    {
        parent::__construct('markdown_editor', $dbColName, $name,  $required, $width);
    }
}
