<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Traits;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;
use EzeRoldan\VoyagerTools\Seeder\Bread\Traits\Bread;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\Map;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\Code;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\Date;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\File;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\Text;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\Time;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Traits\Page;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\Color;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\Image;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\Hidden;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\Number;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\Select;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\Checkbox;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\Markdown;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\Password;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\RichText;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\Textarea;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\Timestamp;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\MediaPicker;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\RadioButtom;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\ImagesMultiple;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\SelectMultiple;
use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types\CheckboxMultiple;

trait Fields
{
    use Page;
    use Bread;

    protected $rows = [];

    protected function addField(Field $field): Field
    {

        if ($this->isHideFieldsInPageBrowse() === null) {
            $field->showInPageBrowse();
        } elseif ($this->isHideFieldsInPageBrowse() === true) {
            $field->showInPageBrowse();
        } else {
            $field->hideInPageBrowse();
        }

        $field->showInPageRead();
        $field->showInPageEdit();
        $field->showInPageAdd();
        $field->hideInPageDelete();

        $key = count($this->rows);
        $field->setOrder($key);

        $this->rows[$key] = $field;
        return $this->rows[$key];
    }

    protected function addFieldNumber(string $dbColName, string $name = null, bool $required = true,  int $min = null, int $max = null, float $step = null, int $width = 2): Number
    {
        return $this->addField(new Number($dbColName, $name, $required, $min, $max, $step, $width));
    }

    protected function addFieldText(string $dbColName, string $name = null, bool $required = true, int $width = null, string $origin = null, bool $forceUpdate = null): Text
    {
        return $this->addField(new Text($dbColName, $name,  $required, $width, $origin, $forceUpdate));
    }

    protected function addFieldTextarea(string $dbColName, string $name = null, bool $required = true, int $width = null, $rows): Textarea
    {
        return $this->addField(new Textarea($dbColName, $name, $required, $width, $rows));
    }

    protected function addFieldRichText(string $dbColName, string $name = null, bool $required = true, int $width = null): RichText
    {
        return $this->addField(new RichText($dbColName, $name, $required, $width));
    }

    protected function addFieldMarkdown(string $dbColName, string $name = null, bool $required = true, int $width = null): Markdown
    {
        return $this->addField(new Markdown($dbColName, $name,  $required, $width));
    }

    protected function addFieldCheckbox(string $dbColName, string $name = null, string $on = 'SI', string $off = 'NO', bool $checked = true, int $width = 2): Checkbox
    {
        return $this->addField(new Checkbox($dbColName, $name, $on, $off, $checked, $width));
    }

    protected function addFieldCheckboxMultiple(string $dbColName, string $name = null, bool $required = true, int $width = null): CheckboxMultiple
    {
        return $this->addField(new CheckboxMultiple($dbColName, $name,  $required, $width));
    }

    protected function addFieldRadioButtom(string $dbColName, string $name = null, bool $required = true, int $width = null): RadioButtom
    {
        return $this->addField(new RadioButtom($dbColName, $name,  $required, $width));
    }

    protected function addFieldSelect(string $dbColName, string $name = null, bool $required = true, int $width = null): Select
    {
        return $this->addField(new Select($dbColName, $name,  $required, $width));
    }

    protected function addFieldSelectMultiple(string $dbColName, string $name = null, bool $required = true, int $width = null): SelectMultiple
    {
        return $this->addField(new SelectMultiple($dbColName, $name,  $required, $width));
    }

    protected function addFieldFile(string $dbColName, string $name = null, bool $required = true, int $width = null): File
    {
        return $this->addField(new File($dbColName, $name,  $required, $width));
    }

    protected function addFieldImage(string $dbColName, string $name = null, bool $required = true, int $widthPx = null, int $heightPx = null, int $width = null): Image
    {
        return $this->addField(new Image($dbColName, $name,  $required, $widthPx, $heightPx, $width));
    }

    protected function addFieldMediaPicker(string $dbColName, string $name = null, int $width = null): MediaPicker
    {
        return $this->addField(new MediaPicker($dbColName, $name, $width));
    }

    protected function addFieldImagesMultiple(string $dbColName, string $name = null, bool $required = true, int $width = null): ImagesMultiple
    {
        return  $this->addField(new ImagesMultiple($dbColName, $name,  $required, $width));
    }

    protected function addFieldTime(string $dbColName, string $name = null, bool $required = true, int $width = null): Time
    {
        return $this->addField(new Time($dbColName, $name,  $required, $width));
    }

    protected function addFieldDate(string $dbColName, string $name = null, bool $required = true, int $width = 2, string $format = '%d/%m/%Y'): Date
    {
        return $this->addField(new Date($dbColName, $name,  $required, $width, $format));
    }

    protected function addFieldTimestamp(string $dbColName, string $name = null, bool $required = true, int $width = null, string $format = '%d/%m/%Y %H:%i'): Timestamp
    {
        return $this->addField(new Timestamp($dbColName, $name,  $required, $width, $format));
    }

    protected function addFieldColor(string $dbColName = 'color', string $name =  'Color', bool $required = true, int $width = 2): Color
    {
        return $this->addField(new Color($dbColName, $name,  $required, $width));
    }

    protected function addFieldHidden(string $dbColName, string $name = null, bool $required = true): Hidden
    {
        return $this->addField(new Hidden($dbColName, $name, $required));
    }

    protected function addFieldPassword(string $dbColName, string $name = null, bool $required = true, int $width = null): Password
    {
        return $this->addField(new Password($dbColName, $name,  $required, $width));
    }

    protected function addFieldMap(string $dbColName, string $name = null, bool $required = false, int $width = null): Map
    {
        return $this->addField(new Map($dbColName, $name,  $required, $width))->hideInPageBrowse()->hideInPageRead();
    }

    protected function addFieldCode(string $dbColName, string $name = null, bool $required = true, int $width = null): Code
    {
        return $this->addField(new Code($dbColName, $name,  $required, $width));
    }
}
