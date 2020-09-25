<?php

namespace App\Web;

use TCG\Voyager\Traits\Spatial;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * 
 * @property string $email
 * @property string $nombre
 * @property string $telefono
 * @property string $direccion
 *
 * @property string $mapa
 * @property bool|object $coordenadas
 * 
 */
class Sucursal extends Model
{
    use Spatial;

    protected $table = 'sucursales';
    protected $hidden = ['mapa', 'updated_at', 'created_at'];
    protected $spatial = ['mapa'];
    protected $appends = ['coordenadas'];

    public function getCoordenadasAttribute()
    {
        $mapa = false;
        if ($this->mapa) {
            $mapa = $this->getCoordinates();
            $mapa = array_shift($mapa);

            $mapa['lat'] = (float) $mapa['lat'];
            $mapa['lng'] = (float) $mapa['lng'];
        }

        return $mapa;
    }
}
