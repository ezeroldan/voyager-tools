<?php

namespace App\Widgets;

use App\Web\Consulta;

class ConsultasDimmer extends AdminDimmer
{
    protected function setup(): void
    {
        $this->setModel(Consulta::class);

        $total = Consulta::query()->toBase()->whereRaw('ADDDATE(created_at, 5)  >= NOW()')->count('id');
        if ($total === 1) {
            $this->setTitle("<b>1</b> Nueva Consulta General");
            $this->setText('Desde 5 dias antes de la fecha de hoy.');
        } elseif ($total > 1) {
            $this->setTitle("<b>{$total}</b> Nuevas Consultas Generales");
            $this->setText('Desde 5 dias antes de la fecha de hoy.');
        } else {
            $this->setTitle("Consultas Generales");
            $this->setText('No hay nuevas consultas');
        }
    }
}
