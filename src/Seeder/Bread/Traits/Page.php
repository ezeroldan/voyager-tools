<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Traits;

trait Page
{

    protected $hideFieldsInPageBrowse = null;

    protected function isHideFieldsInPageBrowse(): ?bool
    {
        return $this->hideFieldsInPageBrowse;
    }

    public function hideFieldsInPageBrowse(): self
    {
        $this->hideFieldsInPageBrowse = false;
        return $this;
    }

    public function showFieldsInPageBrowse(): self
    {
        $this->hideFieldsInPageBrowse = true;
        return $this;
    }
}
