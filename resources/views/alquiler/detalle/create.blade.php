@extends('layouts.app')
@section('content')

    <div class="row">
        <form method="POST" action="{{ route('alquileres.detalles.store', [$alquiler->id]) }}">
            @csrf

            <div class="col s12 m10 offset-m1 l6 offset-l3 xl6 offset-xl3">
                <div id="panel-left" class="card">

                    <div class="card-content">
                        <span class="card-title primary-text-color primary-text-style">
                            Formulario de Registro
                            </span>
                        <div class="row">
                            <div class="col s12 divider"></div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12">
                                <select name="item_id">
                                    <option value="" disabled selected>Choose your option</option>
                                    @foreach($items as $item)
                                        <option value="{{ $item->id }}">
                                            {{ ( $item->tipo == \App\Http\Controllers\LibroController::$TIPO_LIBRO ? 'libro: ' : 'pelicula: ' )
                                                . $item->nombre . ' - ' . $item->creador . ', bs. ' . $item->precio}}
                                        </option>
                                    @endforeach
                                </select>
                                <label>Seleccione un género:</label>
                            </div>


                            <div class="input-field col s12 m12">
                                <input id="cantidad" type="number" class="validate" name="cantidad" value="{{old('cantidad')}}">
                                <label for="cantidad">Cantidad:</label>
                                @error('cantidad')
                                <span class="help-block red-text"> {{ $message }} </span>
                                @enderror
                            </div>



                        </div>
                        <div class="card-action right-align">
                            <button type="submit" class="waves-effect waves-brown btn-flat red-text bold" onclick="showProgress()">Guardar</button>
                        </div>

                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
