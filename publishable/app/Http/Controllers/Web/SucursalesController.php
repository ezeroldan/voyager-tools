<?php

namespace App\Http\Controllers\Web;

use App\Web\Sucursal;
use App\Http\Controllers\Controller;

class SucursalesController extends Controller
{
    public function index()
    {
        $this->seo()->setTitle('Sucursales');
        return view('templates.sucursales.resultados', ['sucursales' => Sucursal::all()]);
    }
}
