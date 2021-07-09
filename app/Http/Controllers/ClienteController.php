<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Persona;
use Illuminate\Support\Facades\Mail;

class ClienteController extends Controller
{
    public static $TIPO_CLIENTE = 2;

    public function index()
    {
        $personas = Persona::with('user')->where('tipo',self::$TIPO_CLIENTE)->get();
        return view('cliente.index', ['personas'=>$personas]);
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function store(ClienteRequest $request)
    {
        $persona = new Persona();
        $persona->nombre = $request->input('nombre');
        $persona->telefono = $request->input('telefono');
        $persona->correo = $request->input('correo');
        $persona->carnet_identidad = $request->input('carnet_identidad');
        $persona->direccion = $request->input('direccion');
        $persona->tipo = self::$TIPO_CLIENTE;
        $persona->save();

        Mail::send('mails.registro',['persona'=>$persona], function ($mail) use ($persona) {
            $mail->to($persona->correo, $persona->nombre)->subject('Curso de Laravel');
        });

        return redirect()->route('clientes.index');
    }

    public function show($id)
    {
        $persona = Persona::findOrFail($id);
        return view('cliente.show', ['persona'=>$persona]);
    }

    public function edit($id)
    {
        $persona = Persona::findOrFail($id);
        return view('cliente.edit', ['persona'=>$persona]);
    }

    public function update(ClienteRequest $request, $id)
    {
        $persona = Persona::findOrFail($id);

        $persona->nombre = $request->input('nombre');
        $persona->telefono = $request->input('telefono');
        $persona->correo = $request->input('correo');
        $persona->carnet_identidad = $request->input('carnet_identidad');
        $persona->direccion = $request->input('direccion');
        $persona->tipo = self::$TIPO_CLIENTE;
        $persona->save();
        return redirect()->route('clientes.index');
    }

    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        $persona->delete();
        return redirect()->route('clientes.index');
    }
}
