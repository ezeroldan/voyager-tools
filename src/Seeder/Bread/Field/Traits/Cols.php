<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Traits;

trait Cols
{

    /**
     * Col de 12
     *
     * @param int $width
     * @return self
     */
    public function setDisplayWidth(int $width = null): self
    {
        if (!is_null($width)) {
            $this->extras['display']['width'] = $width;
        }
        return $this;
    }

    public function setCol(int $col): self
    {
        return $this->setDisplayWidth($col);
    }

    public function setCol1(): self
    {
        return $this->setDisplayWidth(1);
    }

    public function setCol2(): self
    {
        return $this->setDisplayWidth(2);
    }

    public function setCol3(): self
    {
        return $this->setDisplayWidth(3);
    }

    public function setCol4(): self
    {
        return $this->setDisplayWidth(4);
    }

    public function setCol5(): self
    {
        return $this->setDisplayWidth(5);
    }

    public function setCol6(): self
    {
        return $this->setDisplayWidth(6);
    }

    public function setCol7(): self
    {
        return $this->setDisplayWidth(7);
    }

    public function setCol8(): self
    {
        return $this->setDisplayWidth(8);
    }

    public function setCol9(): self
    {
        return $this->setDisplayWidth(9);
    }

    public function setCol10(): self
    {
        return $this->setDisplayWidth(10);
    }

    public function setCol11(): self
    {
        return $this->setDisplayWidth(11);
    }

    public function setCol12(): self
    {
        return $this->setDisplayWidth(12);
    }
}
