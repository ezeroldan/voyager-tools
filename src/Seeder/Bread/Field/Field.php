<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field;

use Illuminate\Support\Str;
use TCG\Voyager\Models\DataRow;
use EzeRoldan\VoyagerTools\Seeder\Bread\Bread;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Traits\Cols;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Traits\Page;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int id
 * @property string $data_type_id
 * 
 * @property string $field
 * @property string $type
 * 
 * @property string $display_name
 *
 * @property bool $required
 * @property int $order
 *
 * @property bool $browse
 * @property bool $read
 * @property bool $edit
 * @property bool $add
 * @property bool $delete
 * 
 * @property array $details
 * 
 */
class Field extends DataRow
{

    use Cols;
    use Page;

    protected $extras = [];

    public function __construct(string $type = null, string $dbColName = null, string $name = null, bool $required = true, int $width = null)
    {
        if (!is_null($type)) {
            $this->type = $type;
        }

        if (!is_null($dbColName)) {
            $this->field = trim($dbColName);
        }

        if (is_null($name)) {
            $name = str_replace(['-', '_'], ' ', $dbColName);
            $name = Str::title($name);
        }

        $this->display_name = $name;

        $this->required = $required;

        if (!is_null($width)) {
            $this->extras['display']['width'] = $width;
        }
    }

    public function save(array $options = [])
    {
        if (count($this->extras)) {
            $this->details = $this->extras;
        }
        return parent::save($options);
    }

    protected function setExtra(string $key, $value): self
    {
        $this->extras[$key] = $value;
        return $this;
    }

    /**
     * 
     * Columna de la tabla de la base de datos
     * que el campo representara
     * 
     * @param string $field
     * @return self
     */
    public function setDBColName(string $field): self
    {
        $this->field = trim($field);
        return $this;
    }

    /**
     * Campo Obligatorio
     * 
     * @param bool $value
     * @return self
     */
    public function setRequired(): self
    {
        $this->required = true;
        //$this->addValidationRequired();
        return $this;
    }

    public function setOptional(): self
    {
        $this->required = false;
        return $this;
    }

    public function setOrder(int $order): self
    {
        $this->order = $order;
        return $this;
    }

    /**
     * Descripcion del campo 
     * Optional
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description): self
    {
        $this->extras['description'] = $description;
        return $this;
    }

    /**
     * ID HTML
     *
     * @param string $id
     * @return self
     */
    public function setDisplayId($id): self
    {
        $this->extras['display']['id'] = $id;
        return $this;
    }

    /**
     * Agregar Rules
     *
     * @param string $rule
     * @return self
     */
    public function addValidationRule(string $rule): self
    {
        $this->extras['validation']['rule'][] = $rule;
        return $this;
    }

    /**
     * This will then load my_view from resources/views instead of the formfield.
     * 
     * $action can be browse, read, edit, add or order
     * $content the content for this field
     * $dataType the DataType
     * $dataTypeContent the whole model-instance
     * $row the DataRow
     *
     * @param string $view
     * @return self
     */
    public function setView($view): self
    {
        $this->extras['view'] = $view;
        return $this;
    }

    public function bread(): BelongsTo
    {
        return $this->belongsTo(Bread::class, 'data_type_id');
    }
}
