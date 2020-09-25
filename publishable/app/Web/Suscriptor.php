<?php

namespace App\Web;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string email
 * 
 * @method static Builder filter(array $input = [], $filter = null)
 * 
 */
class Suscriptor extends Model
{
    use Filterable;

    protected $table = 'suscriptores';
    protected $fillable = ['email'];
}
