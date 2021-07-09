@extends('layouts.app')
@section('content')

    <div class="row">
        <form method="POST" action="{{ route('libros.store') }}">
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
                            <div class="input-field col s12 m6">
                                <input id="nombre" type="text" class="validate" name="nombre" value="{{old('nombre')}}">
                                <label for="nombre">Nombre:</label>
                                @error('nombre')
                                    <span class="help-block red-text"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="creador" type="text" class="validate" name="creador" value="{{old('creador')}}">
                                <label for="creador">Creador:</label>
                                @error('creador')
                                <span class="help-block red-text"> {{ $message }} </span>
                                @enderror
                            </div>

                            <div class="input-field col s12 m6">
                                <input id="copias" type="number" class="validate" name="copias" value="{{old('copias')}}">
                                <label for="copias">Copias:</label>
                                @error('copias')
                                <span class="help-block red-text"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="precio" type="number" step="0.01" class="validate" name="precio" value="{{old('precio')}}">
                                <label for="precio">Precio:</label>
                                @error('precio')
                                <span class="help-block red-text"> {{ $message }} </span>
                                @enderror
                            </div>

                            <div class="input-field col s12 m6">
                                <select name="genero_id">
                                    <option value="" disabled selected>Choose your option</option>
                                    @foreach($generos as $genero)
                                        <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                                    @endforeach
                                </select>
                                <label>Seleccione un género:</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="edicion" type="number" class="validate" name="edicion" value="{{old('edicion')}}">
                                <label for="edicion">Edición:</label>
                                @error('edicion')
                                <span class="help-block red-text"> {{ $message }} </span>
                                @enderror
                            </div>

                            <div class="input-field col s12 m6">
                                <input id="editorial" type="text" class="validate" name="editorial" value="{{old('editorial')}}">
                                <label for="editorial">Editorial:</label>
                                @error('editorial')
                                <span class="help-block red-text"> {{ $message }} </span>
                                @enderror
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="publicacion" type="text" class="datepicker" name="publicacion" value="{{old('publicacion')}}">
                                <label for="publicacion">Publicación:</label>
                                @error('publicacion')
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
