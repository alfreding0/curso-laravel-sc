@extends('layouts.app')

@section('content')

    <div class="row" style="margin-top: 5%">
        <div class="col s4">
            <a href="{{ route('usuarios.create') }}" class="waves-effect waves-light btn dark-primary-color">Registrar</a>
        </div>
        <div class="col s12 m12 l12 xl12">
            <div class="card">
                <table class="striped" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Carnet identidad</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                        <th>UserId</th>
                        <th>UserName</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($personas as $persona)
                            <tr>
                                <td>{{ $persona->id }}</td>
                                <td>{{ $persona->nombre }}</td>
                                <td>{{ $persona->telefono }}</td>
                                <td>{{ $persona->carnet_identidad }}</td>
                                <td>{{ $persona->correo }}</td>
                                <td>{{ $persona->direccion }}</td>
                                <td>{{ $persona->user->id }}</td>
                                <td>{{ $persona->user->name }}</td>
                                <td>
                                    <a href="{{ route('usuarios.show', [$persona->id]) }}"><span class="new badge teal" data-badge-caption="ver"></span></a>
                                    <a href="{{ route('usuarios.edit', [$persona->id]) }}"><span class="new badge amber accent-4" data-badge-caption="editar"></span></a>
                                    <a href="{{ route('usuarios.destroy', [$persona->id]) }}"><span class="new badge red" data-badge-caption="eliminar"></span></a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
