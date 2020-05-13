<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;

class RichText extends Field
{
    public function __construct(string $dbColName, string $name = null, bool $required = false, int $width = null)
    {
        parent::__construct('rich_text_box', $dbColName, $name,  $required, $width);
        $this->hideInPageBrowse();
    }
}
