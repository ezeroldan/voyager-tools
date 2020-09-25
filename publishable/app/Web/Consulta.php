<?php

namespace App\Web;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 * @property int $id
 * 
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string $telefono
 * @property string $mensaje
 * 
 */
class Consulta extends Model
{
    protected $table = 'consultas';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['nombre', 'apellido', 'email', 'telefono', 'mensaje'];
}
