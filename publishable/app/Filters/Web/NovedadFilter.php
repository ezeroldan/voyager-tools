<?php

namespace App\Filters\Web;

use App\Web\Novedades\Novedad;
use EloquentFilter\ModelFilter;
use EzeRoldan\VoyagerTools\Filters\Traits\ModelFilterHelper;

class NovedadFilter extends ModelFilter
{

    use ModelFilterHelper;

    public $relations = [];

    public function setup()
    {
        $this->where('estado', Novedad::ESTADO_PUBLICADO);
    }

    public function nombre($nombre)
    {
        return $this->whereLike('nombre', $nombre);
    }

    public function categoria($id)
    {
        return $this->where('categoria_id', $id);
    }
}
