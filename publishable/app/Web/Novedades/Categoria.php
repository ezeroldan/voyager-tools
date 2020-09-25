<?php

namespace App\Web\Novedades;

use App\Web\Novedades\Novedad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $nombre
 * @property string $slug
 * @property bool $habilitado
 * 
 * @property Collection[] $novedades
 */
class Categoria extends Model
{
    protected $table = 'novedades_categorias';

    public function novedades(): HasMany
    {
        return $this->hasMany(Novedad::class, 'categoria_id', 'id');
    }


}
