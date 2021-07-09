<?php

namespace App\Http\Controllers;

use App\Alquiler;
use App\Detalle;
use App\Item;
use Illuminate\Http\Request;

class AlquilerDetalleController extends Controller
{

    public function create($alquiler_id)
    {
        $alquiler = Alquiler::findOrFail($alquiler_id);
        $items = Item::all();
        return view('alquiler/detalle/create', ['alquiler'=>$alquiler, 'items'=>$items]);
    }

    public function store(Request $request, $alquiler_id)
    {
        $detalle = new Detalle();
        $detalle->item_id = $request->input('item_id');
        $detalle->cantidad = $request->input('cantidad');
        $detalle->alquiler_id = $alquiler_id;
        $detalle->save();

        $item = Item::findOrFail($detalle->item_id);
        $item->copias = $item->copias - $detalle->cantidad;
        $item->save();

        $alquiler = Alquiler::findOrFail($alquiler_id);
        $alquiler->costo = $alquiler->costo + ($item->precio * $detalle->cantidad);
        $alquiler->cantidad_items = $alquiler->cantidad_items + $detalle->cantidad;
        $alquiler->save();

        return redirect()->route('alquileres.show', [$alquiler_id]);
    }

    public function destroy($id, $alquiler_id)
    {
        $detalle = Detalle::findOrFail($id);

        $item = $detalle->item;
        $item->copias = $item->copias + $detalle->cantidad;
        $item->save();

        $alquiler = $detalle->alquiler;
        $alquiler->cantidad_items = $alquiler->cantidad_items - $detalle->cantidad;
        $alquiler->costo = $alquiler->costo - ($item->precio * $detalle->cantidad);
        $alquiler->save();

        $detalle->delete();
        return redirect()->route('alquileres.show', [$alquiler_id]);
    }
}
