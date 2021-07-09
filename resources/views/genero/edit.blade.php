@extends('layouts.app')
@section('content')

    <div class="row">
        <form method="POST" action="{{ route('generos.update', [$genero->id]) }}">
            @csrf
            @method('PUT')

            <div class="col s12 m10 offset-m1 l6 offset-l3 xl6 offset-xl3">
                <div id="panel-left" class="card">

                    <div class="card-content">
                        <span class="card-title primary-text-color primary-text-style">
                            Formulario de Edición
                            </span>
                        <div class="row">
                            <div class="col s12 divider"></div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m12">
                                <input id="nombre" type="text" class="validate" name="nombre" value="{{$genero->nombre}}">
                                <label for="nombre">Nombre:</label>
                                @error('nombre')
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
