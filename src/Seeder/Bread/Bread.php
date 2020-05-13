<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread;

use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Permission;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Relationship\HasMany;

/**
 * @property int id
 * @property string $name
 * @property string $slug
 * 
 * @property string $display_name_singular
 * @property string $display_name_plural
 * 
 * @property string $icon
 * @property string $model_name
 * @property string $policy_name
 * @property string $controller
 * @property string $description
 * 
 * @property bool $generate_permissions
 * @property bool $server_side
 * 
 * @property array $details
 * 
 */
class Bread extends DataType
{
    protected $extras = [];
    protected $modelTableName = null;

    public function save(array $options = [])
    {
        if (count($this->extras)) {
            $this->details = $this->extras;
        }

        $return = parent::save($options);

        Permission::generateFor($this->getModelTableName());

        return $return;
    }

    /**
     * Obtener el nombre de la tabla en base al Model
     *
     * @return string
     */
    public function getModelTableName(): string
    {
        if (is_null($this->modelTableName)) {
            $model = $this->model_name;
            $this->modelTableName =  with(new $model())->getTable();
        }
        return $this->modelTableName;
    }

    /**
     * Listado de Fields asociadas
     *
     * @return HasMany
     */
    public function rows(): HasMany
    {
        return $this->hasMany(Field::class, 'data_type_id')->orderBy('order');
    }

    /**
     * Setea el nombre de la Tabla
     * 
     * @param string $name
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Setea el Slug para el Modulo
     *
     * @param string $slug
     * @return self
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Nombre en Singular
     *
     * @param string $singular
     * @return self
     */
    public function setDisplayNameSingular(string $singular): self
    {
        $this->display_name_singular = $singular;
        return $this;
    }

    /**
     * Nombre en Plural
     *
     * @param string $plural
     * @return self
     */
    public function setDisplayNamePlural(string $plural): self
    {
        $this->display_name_plural = $plural;
        return $this;
    }

    /**
     * Setea la clase del icono del listado 
     * /admin/compas
     *
     * @param string $icono
     * @return self
     */
    public function setIcon(string $icono): self
    {
        $this->icon = $icono;
        return $this;
    }

    /**
     * Setea el Model asociado
     *
     * @param string $model
     * @return self
     */
    public function setModel(string $model): self
    {
        $this->model_name = $model;
        $this->name =  $this->getModelTableName();
        $this->slug =  $this->getModelTableName();
        return $this;
    }

    /**
     * Setea una custom policy
     *
     * @param string $policy
     * @return self
     */
    public function setPolicy(string $policy): self
    {
        $this->policy_name = $policy;
        return $this;
    }

    /**
     * Setea un Custom Controller
     *
     * @param string $controller
     * @return self
     */
    public function setController(string $controller): self
    {
        $this->controller = $controller;
        return $this;
    }

    /**
     * Setea la descripcion del Modulo
     *
     * @param string $description
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Habilita el generado de permisos
     *
     * @param boolean $value
     * @return self
     */
    public function setGeneratePermissions(bool $value = true): self
    {
        $this->generate_permissions = $value;
        return $this;
    }

    /**
     * Habilita el modo de Server side search
     */
    public function setServerSide(bool $value = true): self
    {
        $this->server_side = $value;
        return $this;
    }

    /**
     * Si esta activado del server side search,
     * se puede setear el campo default para la busqueda
     *
     * @param string $col
     * @return self
     */
    public function setDefaultSearchCol(string $col): self
    {
        $this->extras['default_search_key'] = $col;
        return $this;
    }

    public function isDefaultSearchCol(): bool
    {
        return (isset($this->extras['default_search_key']) && $this->extras['default_search_key']);
    }

    public function setOrderDisplayCol(string $col): self
    {
        $this->extras['order_display_column'] = $col;
        return $this;
    }

    public function isOrderDisplayCol(): bool
    {
        return (isset($this->extras['order_display_column']) && $this->extras['order_display_column']);
    }

    /**
     * Setea la Columna de la tabla como orden default
     *
     * @param string $col
     * @return self
     */
    public function setOrderBy(string $col): self
    {
        $this->extras['order_column'] = $col;
        return $this;
    }

    /**
     * Verificar que el campo de order_column este cargado
     *
     * @return boolean
     */
    public function isOrderBy(): bool
    {
        return (isset($this->extras['order_column']) && $this->extras['order_column']);
    }

    /**
     * Setea el orden ASC
     *
     * @return self
     */
    public function setOrderAsc(): self
    {
        $this->extras['order_direction'] = 'asc';
        return $this;
    }

    /**
     * Setea el orden DESC
     *
     * @return self
     */
    public function setOrderDesc(): self
    {
        $this->extras['order_direction'] = 'desc';
        return $this;
    }
}
