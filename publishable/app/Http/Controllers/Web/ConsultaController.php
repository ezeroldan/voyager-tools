<?php

namespace App\Http\Controllers\Web;

use App\Web\Consulta;
use ReCaptcha\ReCaptcha;
use App\Mail\ConsultaUser;
use App\Mail\ConsultaAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ConsultaController extends Controller
{
    public function create()
    {
        $this->seo()->setTitle('Consulta');
        return view('templates.consulta.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => 'required',

            'nombre'   => 'required|max:255',
            'apellido' => 'required|max:255',
            'email'    => 'required|email:rfc',
            'telefono' => 'required|max:255',
        ]);

        /** ReCaptcha v3 */
        $recaptcha = new ReCaptcha(config('app.recaptcha_secret_key'));
        $resp = $recaptcha
            ->setScoreThreshold(0.5)
            ->setExpectedAction('homepage')
            ->setExpectedHostname($request->getHost())
            ->verify($request->get('g-recaptcha-response'), $request->getClientIp());

        if ($resp->isSuccess()) {

            $consulta = Consulta::create($request->all());

            /** Enviar Email */
            Mail::to($consulta->email)->send(new ConsultaUser($consulta));
            Mail::to(setting('site.email'))->send(new ConsultaAdmin($consulta));

            /** Gracias */
            return redirect()->route('consulta.gracias');
        }

        return back()->withInput()->withErrors(['g-recaptcha-response', 'Error al validar el recaptcha']);
    }

    public function mail(Consulta $consulta)
    {
        return new ConsultaUser($consulta);
    }

    public function gracias()
    {
        $this->seo()->setTitle('Gracias');
        return view('templates.consulta.gracias')->with('mensaje', setting('site.consulta_mensaje'));
    }
}
