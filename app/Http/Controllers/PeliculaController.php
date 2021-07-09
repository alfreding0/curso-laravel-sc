<?php

namespace App\Http\Controllers;

use App\Genero;
use App\Http\Requests\PeliculaRequest;
use App\Item;
use App\Pelicula;

class PeliculaController extends Controller
{
    public static $TIPO_PELICULA = 2;

    public function index()
    {
        $items = Item::with('pelicula')->where('tipo',self::$TIPO_PELICULA)->get();
        return view('pelicula.index', ['items'=>$items]);
    }

    public function create()
    {
        $generos = Genero::all();
        return view('pelicula.create', ['generos'=>$generos]);
    }

    public function store(PeliculaRequest $request)
    {
        $item = new Item();
        $item->nombre = $request->input('nombre');
        $item->creador = $request->input('creador');
        $item->copias = $request->input('copias');
        $item->precio = $request->input('precio');
        $item->genero_id = $request->input('genero_id');
        $item->tipo = self::$TIPO_PELICULA;
        $item->save();

        $pelicula = new Pelicula();
        $pelicula->formato = $request->input('formato');
        $pelicula->idioma = $request->input('idioma');
        $pelicula->item_id = $item->id;
        $pelicula->save();

        return redirect()->route('peliculas.index');
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        $item->load('genero');
        return view('pelicula.show', ['item'=>$item]);
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $item->load('pelicula');
        $generos = Genero::all();
        return view('pelicula.edit', ['item'=>$item, 'generos'=>$generos]);
    }

    public function update(PeliculaRequest $request, $id)
    {

        $item = Item::findOrFail($id);
        $item->nombre = $request->input('nombre');
        $item->creador = $request->input('creador');
        $item->copias = $request->input('copias');
        $item->precio = $request->input('precio');
        $item->tipo = self::$TIPO_PELICULA;
        $item->save();

        $pelicula = $item->pelicula;
        $pelicula->formato = $request->input('formato');
        $pelicula->idioma = $request->input('idioma');
        $pelicula->item_id = $item->id;
        $pelicula->save();

        return redirect()->route('peliculas.index');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('peliculas.index');
    }
}
