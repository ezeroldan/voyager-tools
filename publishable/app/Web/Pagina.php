<?php

namespace App\Web;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $id
 * 
 * @property string $slug
 * @property string $nombre
 * @property string $body
 * 
 * @property string $foto
 * 
 * @property string $seo_description
 * @property string $seo_keywords
 */
class Pagina extends Model
{
    protected $table = 'paginas';

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
