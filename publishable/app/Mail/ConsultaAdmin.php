<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Web\Consulta as Model;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConsultaAdmin extends Mailable
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
            ->subject('Consulta en ' . config('app.name'))
            ->markdown('templates.consulta.email-admin');
    }
}
