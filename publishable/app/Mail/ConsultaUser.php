<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Web\Consulta as Model;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConsultaUser extends Mailable
{
    use Queueable, SerializesModels;

    public $consulta;

    public function __construct(Model $consulta)
    {
        $this->consulta = $consulta;
    }

    public function build()
    {
        return $this
            ->subject('Consulta de ' . config('app.name'))
            ->markdown('templates.consulta.email-user')
            ->with('mensaje', setting('site.consulta_mensaje'));
    }
}
