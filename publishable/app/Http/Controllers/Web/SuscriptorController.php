<?php

namespace App\Http\Controllers\Web;

use App\Web\Suscriptor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuscriptorController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['email' => 'required']);
        $values = array_filter($request->all());
        Suscriptor::create($values);
        return true;
    }
}
