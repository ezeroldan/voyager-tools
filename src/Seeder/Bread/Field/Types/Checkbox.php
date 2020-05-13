<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;

class Checkbox extends Field
{
    public function __construct(string $dbColName, string $name = null, string $on = 'SI', string $off = 'NO', bool $checked = true, int $width = 2)
    {
        parent::__construct('checkbox', $dbColName, $name, false, $width);
        $this->setExtra('on', $on);
        $this->setExtra('off', $off);
        $this->setExtra('checked', $checked);
        $this->setDisplayWidth($width);
    }
}
