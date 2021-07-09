@extends('layouts.app')

@section('content')

    <div class="row" style="margin-top: 5%">
        <div class="col s4">
            <a href="{{ route('generos.create') }}" class="waves-effect waves-light btn dark-primary-color">Registrar</a>
        </div>
        <div class="col s12 m12 l12 xl12">
            <div class="card">
                <table class="striped" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Fecha de Registro</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($generos as $genero)
                            <tr>
                                <td>{{ $genero->id }}</td>
                                <td>{{ $genero->nombre }}</td>
                                <td>{{ $genero->created_at }}</td>
                                <td>
                                    <a href="{{ route('generos.show', [$genero->id]) }}"><span class="new badge teal" data-badge-caption="ver"></span></a>
                                    <a href="{{ route('generos.edit', [$genero->id]) }}"><span class="new badge amber accent-4" data-badge-caption="editar"></span></a>
                                    <a href="{{ route('generos.destroy', [$genero->id]) }}"><span class="new badge red" data-badge-caption="eliminar"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
