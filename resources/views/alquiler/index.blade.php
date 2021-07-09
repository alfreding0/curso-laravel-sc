@extends('layouts.app')

@section('content')

    <div class="row" style="margin-top: 5%">
        <div class="col s4">
            <a href="{{ route('alquileres.create') }}" class="waves-effect waves-light btn dark-primary-color">Registrar</a>
        </div>
        <div class="col s12 m12 l12 xl12">
            <div class="card">
                <table class="striped" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha de alquiler</th>
                        <th>Fecha de devolución</th>
                        <th>Costo total (bs)</th>
                        <th>Cantidad de items (u)</th>
                        <th>Cliente</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($alquileres as $alquiler)
                            <tr>
                                <td>{{ $alquiler->id }}</td>
                                <td>{{ $alquiler->fecha_alquiler }}</td>
                                <td>{{ $alquiler->fecha_devolucion }}</td>
                                <td>{{ $alquiler->costo }}</td>
                                <td>{{ $alquiler->cantidad_items }}</td>
                                <td>{{ $alquiler->cliente->nombre }}</td>
                                <td>
                                    <a href="{{ route('alquileres.show', [$alquiler->id]) }}"><span class="new badge teal" data-badge-caption="ver"></span></a>
                                    <a href="{{ route('alquileres.edit', [$alquiler->id]) }}"><span class="new badge amber accent-4" data-badge-caption="editar"></span></a>
                                    <a href="{{ route('alquileres.destroy', [$alquiler->id]) }}"><span class="new badge red" data-badge-caption="eliminar"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
