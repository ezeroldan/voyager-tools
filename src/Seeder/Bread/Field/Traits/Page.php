<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Traits;

trait Page
{

    /**
     * Muestra el DataRow en la Pantalla del listado (index)
     *
     * @return self
     */
    public function showInPageBrowse(): self
    {
        $this->browse = true;
        return $this;
    }

    /**
     * Esconde el DataRow en la Pantalla del listado (index)
     *
     * @return self
     */
    public function hideInPageBrowse(): self
    {
        $this->browse = false;
        return $this;
    }

    /**
     * Muestra el DataRow en la Pantalla de Visualizacion
     *
     * @return self
     */
    public function showInPageRead(): self
    {
        $this->read = true;
        return $this;
    }

    /**
     * Esconde el DataRow en la Pantalla de Visualizacion
     *
     * @return self
     */
    public function hideInPageRead(): self
    {
        $this->read = false;
        return $this;
    }

    /**
     * Muestra el DataRow en la Pantalla de Ediccion
     *
     * @return self
     */
    public function showInPageEdit(): self
    {
        $this->edit = true;
        return $this;
    }

    /**
     * Esconde el DataRow en la Pantalla de Ediccion
     *
     * @return self
     */
    public function hideInPageEdit(): self
    {
        $this->edit = false;
        return $this;
    }

    /**
     * Muestra el DataRow en la Pantalla de Carga Nueva
     *
     * @return self
     */
    public function showInPageAdd(): self
    {
        $this->add = true;
        return $this;
    }

    /**
     * Esconde el DataRow en la Pantalla de Carga Nueva
     *
     * @return self
     */
    public function hideInPageAdd(): self
    {
        $this->add = false;
        return $this;
    }

    /**
     * Muestra el DataRow en la Pantalla de Borrado
     *
     * @return self
     */
    public function showInPageDelete(): self
    {
        $this->delete = true;
        return $this;
    }

    /**
     * Esconde el DataRow en la Pantalla de Borrado
     *
     * @return self
     */
    public function hideInPageDelete(): self
    {
        $this->delete = false;
        return $this;
    }
}
