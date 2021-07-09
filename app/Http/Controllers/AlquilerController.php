<?php

namespace App\Http\Controllers;

use App\Alquiler;
use App\Persona;
use Illuminate\Http\Request;

class AlquilerController extends Controller
{

    public function index()
    {
        $alquileres = Alquiler::with('cliente')->get();
        return view('alquiler.index', ['alquileres'=>$alquileres]);
    }

    public function create()
    {
        $clientes = Persona::where('tipo', ClienteController::$TIPO_CLIENTE)->get();
        return view('alquiler.create', ['clientes'=>$clientes]);
    }

    public function store(Request $request)
    {
        $alquiler = new Alquiler();
        $alquiler->fecha_alquiler = $request->input('fecha_alquiler');
        $alquiler->fecha_devolucion = $request->input('fecha_devolucion');
        $alquiler->cliente_id = $request->input('cliente_id');
        $alquiler->costo = 0;
        $alquiler->usuario_id = auth()->user()->persona->id;
        $alquiler->save();

        return redirect()->route('alquileres.show', [$alquiler->id]);
    }

    public function show($id)
    {
        $alquiler = Alquiler::findOrFail($id);
        $alquiler->load('cliente');
        $alquiler->load('detalles');
        $alquiler->detalles->load('item');
        return view('alquiler.show', ['alquiler'=>$alquiler]);
    }

    public function edit($id)
    {
        $alquiler = Alquiler::findOrFail($id);
        return view('alquiler.edit', ['alquiler'=>$alquiler]);
    }

    public function update(Request $request, $id)
    {
        $alquiler = Alquiler::findOrFail($id);
        $alquiler->fecha_alquiler = $request->input('fecha_alquiler');
        $alquiler->fecha_devolucion = $request->input('fecha_devolucion');
        $alquiler->cliente_id = $request->input('cliente_id');
        $alquiler->usuario_id = auth()->user()->id;
        $alquiler->save();

        return redirect()->route('alquileres.show', [$alquiler->id]);
    }

    public function destroy($id)
    {
        $alquiler = Alquiler::findOrFail($id);
        $alquiler->load('detalle');

        foreach ($alquiler->detalles as $detalle)
        {
            $item = $detalle->item;
            $item->copias = $item->copias + $detalle->cantidad;
            $item->save();
        }

        $alquiler->delete();
        return redirect()->route('alquileres.index');
    }
}
