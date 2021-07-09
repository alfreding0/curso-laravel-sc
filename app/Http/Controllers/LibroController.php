<?php

namespace App\Http\Controllers;

use App\Genero;
use App\Http\Requests\LibroRequest;
use App\Item;
use App\Libro;

class LibroController extends Controller
{
    public static $TIPO_LIBRO = 1;

    public function index()
    {
        $items = Item::with('libro')->where('tipo',self::$TIPO_LIBRO)->get();
        return view('libro.index', ['items'=>$items]);
    }

    public function create()
    {
        $generos = Genero::all();
        return view('libro.create', ['generos'=>$generos]);
    }

    public function store(LibroRequest $request)
    {
        $item = new Item();
        $item->nombre = $request->input('nombre');
        $item->creador = $request->input('creador');
        $item->copias = $request->input('copias');
        $item->precio = $request->input('precio');
        $item->genero_id = $request->input('genero_id');
        $item->tipo = self::$TIPO_LIBRO;
        $item->save();

        $libro = new Libro();
        $libro->edicion = $request->input('edicion');
        $libro->publicacion = $request->input('publicacion');
        $libro->editorial = $request->input('editorial');
        $libro->item_id = $item->id;
        $libro->save();

        return redirect()->route('libros.index');
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('libro.show', ['item'=>$item]);
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $item->load('libro');
        $generos = Genero::all();
        return view('libro.edit', ['item'=>$item, 'generos'=>$generos]);
    }

    public function update(LibroRequest $request, $id)
    {

        $item = Item::findOrFail($id);
        $item->nombre = $request->input('nombre');
        $item->creador = $request->input('creador');
        $item->copias = $request->input('copias');
        $item->precio = $request->input('precio');
        $item->tipo = self::$TIPO_LIBRO;
        $item->save();

        $libro = $item->libro;
        $libro->edicion = $request->input('edicion');
        $libro->publicacion = $request->input('publicacion');
        $libro->editorial = $request->input('editorial');
        $libro->item_id = $item->id;
        $libro->save();

        return redirect()->route('libros.index');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('libros.index');
    }
}
