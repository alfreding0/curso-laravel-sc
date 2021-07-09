@extends('layouts.app')
@section('content')

    <div class="row">
        <form method="POST" action="{{ route('clientes.update', [$persona->id]) }}">
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
                            <div class="input-field col s12 m4">
                                <input id="nombre" type="text" class="validate" name="nombre" value="{{$persona->nombre}}">
                                <label for="nombre">Nombre Completo:</label>
                                @error('nombre')
                                    <span class="help-block red-text"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="input-field col s12 m4">
                                <input id="telefono" type="number" class="validate" name="telefono" value="{{$persona->telefono}}">
                                <label for="telefono">telefono:</label>
                                @error('telefono')
                                <span class="help-block red-text"> {{ $message }} </span>
                                @enderror
                            </div>

                            <div class="input-field col s12 m4">
                                <input id="carnet_identidad" type="text" class="validate" name="carnet_identidad" value="{{$persona->carnet_identidad}}">
                                <label for="carnet_identidad">Carnet Identidad:</label>
                                @error('carnet_identidad')
                                <span class="help-block red-text"> {{ $message }} </span>
                                @enderror
                            </div>

                            <div class="input-field col s12">
                                <textarea id="direccion" class="validate materialize-textarea" name="direccion">{{$persona->direccion}}</textarea>
                                <label for="direccion">Dirección:</label>
                                @error('direccion')
                                <span class="help-block red-text"> {{ $message }} </span>
                                @enderror
                            </div>

                            <div class="input-field col s12 m12">
                                <input id="correo" type="email" class="validate" name="correo" value="{{$persona->correo}}">
                                <label for="correo">Correo:</label>
                                @error('correo')
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
