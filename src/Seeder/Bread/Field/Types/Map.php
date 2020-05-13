<?php

namespace EzeRoldan\VoyagerTools\Seeder\Bread\Field\Types;

use EzeRoldan\VoyagerTools\Seeder\Bread\Field\Field;

/**
 * Coordinates
 * La columna de la tabla debe ser de tipo GEOMETRY o POINT
 * 
 * Agregar al modelo que tiene este campo la el trait 
 * TCG\Voyager\Traits\Spatial;
 * protected $spatial = ['your_column'];
 * 
 * Getting the coordinates
 * $model->getCoordinates();
 * 
 */
class Map extends Field
{

    public function __construct(string $dbColName, string $name = null, bool $required = true, int $width = null)
    {
        parent::__construct('coordinates', $dbColName, $name, $required, $width);
    }

    /**
     * Checkbox
     *
     * @param bool $value
     * @return self
     */
    public function hideAutocompleteInput(): self
    {
        $this->extras['showAutocompleteInput'] = false;
        return $this;
    }

    /**
     * Checkbox
     *
     * @param bool $value
     * @return self
     */
    public function hideLatLngInput(): self
    {
        $this->extras['showLatLngInput'] = false;
        return $this;
    }

    /**
     * Defines an onChange callback so that you can perform subsequent actions 
     * (such as using the Autocomplete Place address to populate another field) 
     * after the user changes any of the inputs in this formfield.
     * onChange callback is debounced at 300ms.
     * First parameter is eventType ("mapDragged", "latLngChanged", or "placeChanged"). 
     * Second parameter is data object containing lat, lng, and place properties.
     * 
     * function myFunction(eventType, data) {
     *  console.log('eventType', eventType);
     *  console.log('data.lat', data.lat);
     *  console.log('data.lng', data.lng);
     *  console.log('data.place', data.place);
     * }
     *
     * @param string $function
     * @return self
     */
    public function setOnChangeFunction($function): self
    {
        $this->extras['onChange'] = $function;
        return $this;
    }
}
