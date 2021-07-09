<?php

namespace App\Http\Controllers;

use App\Genero;
use App\Http\Requests\GeneroRequest;

class GeneroController extends Controller
{
    public function index()
    {
        $generos = Genero::all();
        return view('genero.index', ['generos'=>$generos]);
    }

    public function create()
    {
        return view('genero.create');
    }

    public function store(GeneroRequest $request)
    {
        $genero = new Genero();
        $genero->nombre = $request->input('nombre');
        $genero->save();
        return redirect()->route('generos.index');
    }

    public function show($id)
    {
        $genero = Genero::findOrFail($id);
        return view('genero.show', ['genero'=>$genero]);
    }

    public function edit($id)
    {
        $genero = Genero::findOrFail($id);
        return view('genero.edit', ['genero'=>$genero]);
    }

    public function update(GeneroRequest $request, $id)
    {
        $genero = Genero::findOrFail($id);
        $genero->nombre = $request->input('nombre');
        $genero->save();
        return redirect()->route('generos.index');
    }

    public function destroy($id)
    {
        $genero = Genero::findOrFail($id);
        $genero->delete();
        return redirect()->route('generos.index');
    }
}
