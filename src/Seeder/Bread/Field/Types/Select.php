<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;

class Select extends Field
{
    public function __construct(string $dbColName, string $name = null, bool $required = true, int $width = null)
    {
        parent::__construct('select_dropdown', $dbColName, $name,  $required, $width);
    }

    public function addOption($key, $value = NULL): self
    {
        if (is_null($value)) {
            $this->extras['options'][] = $key;
        } else {
            $this->extras['options'][$key] = $value;
        }
        return $this;
    }

    public function setOptions(array $options): self
    {
        $this->extras['options'] = $options;
        return $this;
    }

    public function setChecked($value = true): self
    {
        $this->extras['checked'] = $value;
        return $this;
    }
}
