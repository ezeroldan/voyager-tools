<?php

namespace App\Web\Novedades;

use EloquentFilter\Filterable;
use App\Web\Novedades\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id 
 * @property string $url
 * @property string $slug
 * @property string $fotos
 * @property string $estado
 * @property string $nombre
 * @property string $copete
 * @property string $description
 * 
 * @property string $seo_description
 * @property string $seo_keywords
 * 
 * @property int $categoria_id
 * @property Categoria $categoria
 *
 * @method static Builder filter(array $input = [], $filter = null)
 * @method static Builder whereLike($query, $column, $value, $boolean = 'and')
 * @method static Builder whereEndsWith($query, $column, $value, $boolean = 'and')
 * @method static Builder whereBeginsWith($query, $column, $value, $boolean = 'and')
 * 
 */
class Novedad extends Model
{
    const ESTADO_BORRADOR = 'BORRADOR';
    const ESTADO_PUBLICADO = 'PUBLICADO';
    const ESTADO_DESHABILITADO = 'DESHABILITADO';

    use Filterable;

    protected $table = 'novedades';

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }

    public function getUrlAttribute()
    {
        return route('novedad.show', ['novedad' => $this->slug]);
    }
}
