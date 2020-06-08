<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Traits;

use EzeRoldan\VoyagerTools\Seeder\Bread\Bread as BreadModel;

trait Bread
{

    protected $bread = null;

    protected function getBread(): BreadModel
    {
        if (is_null($this->bread)) {
            $this->bread = new BreadModel();
            $this->bread->setServerSide(false);
            //$this->bread->setPolicy('TCG\\Voyager\\Policies\\BasePolicy')
            $this->bread->setGeneratePermissions();
            $this->bread->setOrderAsc();
        }
        return $this->bread;
    }

    protected function setNameSingular(string $singular): self
    {
        $this->getBread()->display_name_singular = $singular;
        return $this;
    }

    protected function setOrderBy(string $col): self
    {
        //$this->getBread()->setOrderBy($col);

        if (!$this->getBread()->isDefaultSearchCol()) {
            $this->getBread()->setDefaultSearchCol($col);
        }

        return $this;
    }

    /**
     * Habilitar el server side pagiado
     *
     * @param boolean $value
     * @return self
     */
    protected function setServerSide(bool $value = true): self
    {
        $this->getBread()->setServerSide($value);
        return $this;
    }

    protected function setDefaultSearchCol(string $col): self
    {
        $this->getBread()->setDefaultSearchCol($col);
        return $this;
    }

    protected function isDefaultSearchCol(): bool
    {
        return $this->getBread()->isDefaultSearchCol();
    }

    protected function setOrderDisplayCol(string $col): self
    {
        $this->getBread()->setOrderDisplayCol($col);
        return $this;
    }

    protected function isOrderDisplayCol(): bool
    {
        return  $this->getBread()->isOrderDisplayCol();
    }

    /**
     * Shortcut para el metodo de verificacion que el order by este cargado
     *
     * @return boolean
     */
    protected function isOrderBy(): bool
    {
        return $this->getBread()->isOrderBy();
    }

    /**
     * Setear el Orden por default como ASC
     *
     * @return self
     */
    protected function setOrderAsc(): self
    {
        $this->getBread()->setOrderAsc();
        return $this;
    }

    /**
     * Setear el Orden por default como DESC
     *
     * @return self
     */
    protected function setOrderDesc(): self
    {
        $this->getBread()->setOrderDesc();
        return $this;
    }
}
