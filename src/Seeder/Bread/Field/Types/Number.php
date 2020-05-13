<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;

class Number extends Field
{
    public function __construct(string $dbColName, string $name = null, bool $required = true,  int $min = null, int $max = null, float $step = null, int $width = 2)
    {
        parent::__construct('number', $dbColName, $name,  $required, $width);
        $this->setExtra('min', $min);
        $this->setExtra('max', $max);
        $this->setExtra('step', $step);
    }
}
