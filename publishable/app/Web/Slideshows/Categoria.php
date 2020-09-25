<?php

namespace App\Web\Slideshows;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nombre
 * @property string $slug
 * @property bool $habilitado
 */
class Categoria extends Model
{
    protected $table = 'slideshows_categorias';
}
