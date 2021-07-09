<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Persona;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UsuarioController extends Controller
{
    public static $TIPO_USUARIO = 1;

    public function index()
    {
        //$personas = DB::select('select users.persona_id, users.id, users.name , personas.* from personas, users where personas.id=users.persona_id;');

        $personas = Persona::with('user')->where('tipo', '=', self::$TIPO_USUARIO)->get();
        return view('usuario.index', ['personas'=>$personas]);
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(UsuarioRequest $request)
    {
        $persona = new Persona();
        $persona->nombre = $request->input('nombre');
        $persona->telefono = $request->input('telefono');
        $persona->correo = $request->input('correo');
        $persona->carnet_identidad = $request->input('carnet_identidad');
        $persona->direccion = $request->input('direccion');
        $persona->tipo = self::$TIPO_USUARIO;
        $persona->save();

        $user = new User();
        $user->name = $request->input('nombre');
        $user->email = $request->input('correo');
        $user->password = bcrypt($request->input('password'));
        $user->persona_id = $persona->id;
        $user->save();

        Mail::send('mails.registro',['persona'=>$persona], function ($mail) use ($persona) {
            $mail->to($persona->correo, $persona->nombre)->subject('Curso de Laravel');
        });

        return redirect()->route('usuarios.index');
    }

    public function show($id)
    {
        $persona = Persona::findOrFail($id);
        return view('usuario.show', ['persona'=>$persona]);
    }

    public function edit($id)
    {
        $persona = Persona::findOrFail($id);
        $this->authorize($persona);
        return view('usuario.edit', ['persona'=>$persona]);
    }

    public function update(UsuarioRequest $request, $id)
    {
        $persona = Persona::findOrFail($id);
        $this->authorize($persona);

        $persona->nombre = $request->input('nombre');
        $persona->telefono = $request->input('telefono');
        $persona->correo = $request->input('correo');
        $persona->carnet_identidad = $request->input('carnet_identidad');
        $persona->direccion = $request->input('direccion');
        $persona->tipo = self::$TIPO_USUARIO;
        $persona->save();

        $user = $persona->user;
        $user->name = $request->input('nombre');
        $user->email = $request->input('correo');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect()->route('usuarios.index');
    }

    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        $persona->delete();
        return redirect()->route('usuarios.index');
    }
}
