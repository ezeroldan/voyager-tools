<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use EzeRoldan\VoyagerTools\Seeder\InsertSeeder;
use EzeRoldan\VoyagerTools\Seeder\Bread\Traits\Menu;
use EzeRoldan\VoyagerTools\Seeder\Bread\Traits\Page;
use EzeRoldan\VoyagerTools\Seeder\Bread\Traits\Bread;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Traits\Fields;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Traits\CustomFields;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Relationship\Relationships;

abstract class BreadSeeder extends Seeder
{
    use Menu;
    use Page;
    use Bread;
    use Fields;
    use CustomFields;
    use InsertSeeder;
    use Relationships;

    protected function setModel(string $model): self
    {
        $this->setModelClass($model);
        $this->getBread()->setModel($model);
        $this->getMenuItem()->route = "voyager.{$this->getBread()->getModelTableName()}.index";
        return $this;
    }

    protected function setName(string $name): self
    {
        $this->getBread()->setName($name);
        $this->getBread()->setSlug($name);
        $this->getMenuItem()->route = "voyager.{$name}.index";

        return $this;
    }

    protected function setNamePlural(string $plural): self
    {
        $this->getBread()->display_name_plural = $plural;
        $this->getBread()->display_name_singular = Str::singular($plural);
        $this->getMenuItem()->title = $plural;
        return $this;
    }

    /**
     * Icono para ser usado en el Modulo como en el BTN
     * Se debe se usar las clases 
     * /admin/compass
     * 
     *
     * @param string $icono
     * @return self
     */
    protected function setIcon(string $icono): self
    {
        $this->getBread()->setIcon($icono);
        $this->getMenuItem()->icon_class = $icono;
        return $this;
    }

    protected function save(): self
    {
        $this->getBread()->save();

        array_walk($this->rows, function (&$row) {
            $row->data_type_id = $this->getBread()->id;
        });

        $this->getBread()->rows()->saveMany($this->rows);

        $this->getMenuItem()->save();

        return $this;
    }

    protected abstract function bread(): void;

    protected abstract function fields(): void;

    protected abstract function data(): void;

    public function run(): void
    {

        /** Modulo */
        $this->bread();

        /** Fields */
        $this->fields();

        /** Save */
        $this->save();

        /** Datos  */
        $this->data();
    }
}
