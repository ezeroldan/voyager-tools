<?php

namespace App\Web\Slideshows;

use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Resizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * 
 * @property int $categoria_id
 * @property Categoria $categoria
 * 
 * @property int $layout
 * 
 * @property string $nombre
 * 
 * @property string $titulo
 * @property string $texto
 * 
 * @property string $link
 * @property bool $blank
 * 
 * @property string $desde
 * @property string $hasta
 * @property bool $habilitado
 * 
 * @property string $color
 * @property string $imagen
 * 
 * @property int $orden
 * 
 * @method static Collection getVigentes(string $slug)
 * @method static Collection getByCategoria(string $slug)
 * 
 */
class Slideshow extends Model
{
    use Resizable;

    protected $table = 'slideshows';

    public function getImage(): string
    {
        return Voyager::image($this->imagen);
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    /**
     * Obtener Slides por categoria
     *
     * @param string $name
     */
    public static function scopeGetByCategoria(string $slug): Collection
    {
        $query = self::query();

        /** Filtro de Categoria */
        $query->whereHas('categoria', function (Builder $query) use ($slug) {
            return $query->where('slug', $slug)->toBase()->orderBy('orden');
        });

        /** Filtro de Validez */
        $query->getVigentes();

        return $query->get();
    }

    /**
     * Obtener todos los slides
     */
    public static function scopeGetVigentes(): Collection
    {
        $query = self::query();

        $query->where('habilitado', 1)
            ->whereRaw('desde <= NOW()')
            ->whereRaw('hasta >= NOW()')
            ->orderBy('orden');

        return $query->get();
    }
}
