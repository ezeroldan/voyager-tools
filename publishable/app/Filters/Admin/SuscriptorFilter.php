<?php

namespace App\Filters\Admin;

use EloquentFilter\ModelFilter;
use EzeRoldan\VoyagerTools\Filters\Traits\ModelFilterHelper;

class SuscriptorFilter extends ModelFilter
{
    use ModelFilterHelper;

    public function email($text)
    {
        return $this->whereLike('email', $text);
    }
}
