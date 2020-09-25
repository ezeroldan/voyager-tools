<?php

namespace App\Http\Controllers\Web;

use App\Web\Pagina;
use App\Http\Controllers\Controller;

class PaginaController extends Controller
{
    public function show(Pagina $pagina)
    {
        $this->seo()->setTitle($pagina->nombre);
        $this->seo()->setDescription($pagina->seo_description);
        $this->seo()->metatags()->setKeywords($pagina->seo_keywords);
        return view('templates.paginas.ficha', ['pagina' => $pagina]);
    }
}
