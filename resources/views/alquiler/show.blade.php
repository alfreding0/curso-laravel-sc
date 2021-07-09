@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3 xl6 offset-xl3">
            <div id="panel-left"  class="card">
                <div class="card-content">
                    <span class="card-title primary-text-color primary-text-style">
                        Datos del Alquiler
                    </span>
                    <div class="row">
                        <div class="col s12 divider"></div>
                    </div>

                    <div class="row">
                        <div class="col s12 m5">
                            <p class="primary-text-color secondary-text-style">Fecha de alquiler:</p>
                        </div>
                        <div class="col s8 offset-s2 m7">
                            <p class="secondary-text-color">{{$alquiler->fecha_alquiler}}</p>
                        </div>

                        <div class="col s12 m5">
                            <p class="primary-text-color secondary-text-style">Fecha de devolución:</p>
                        </div>
                        <div class="col s8 offset-s2 m7">
                            <p class="secondary-text-color">{{$alquiler->fecha_devolucion}}</p>
                        </div>

                        <div class="col s12 m5">
                            <p class="primary-text-color secondary-text-style">Cliente:</p>
                        </div>
                        <div class="col s8 offset-s2 m7">
                            <p class="secondary-text-color">{{$alquiler->cliente->nombre}}</p>
                        </div>

                        <div class="col s12 m5">
                            <p class="primary-text-color secondary-text-style">Costo total bs.:</p>
                        </div>
                        <div class="col s8 offset-s2 m7">
                            <p class="secondary-text-color">{{$alquiler->costo}}</p>
                        </div>

                        <div class="col s12 m5">
                            <p class="primary-text-color secondary-text-style">Cantidad de items:</p>
                        </div>
                        <div class="col s8 offset-s2 m7">
                            <p class="secondary-text-color">{{$alquiler->cantidad_items}}</p>
                        </div>

                    </div>
                    <div class="card-action right-align">
                        <a href="{{ route('alquileres.index') }}" class="waves-effect waves-brown btn-flat red-text bold">Atras</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 5%">
        <div class="col s4">
            <a href="{{ route('alquileres.detalles.create', [$alquiler->id]) }}" class="waves-effect waves-light btn dark-primary-color">Adicionar Items</a>
        </div>
        <div class="col s12 m12 l12 xl12">
            <div class="card">
                <table class="striped" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Copias</th>
                        <th>Precio unitario bs.</th>
                        <th>Precio total bs.</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($alquiler->detalles as $detalle)
                        <tr>
                            <td>{{ $detalle->id }}</td>
                            <td>{{ $detalle->item->nombre }}</td>
                            <td>{{ $detalle->cantidad }}</td>
                            <td>{{ $detalle->item->precio }}</td>
                            <td>{{ $detalle->item->precio * $detalle->cantidad }}</td>
                            <td>
                                <a href="{{ route('alquileres.detalles.destroy', [$detalle->id, $alquiler->id]) }}"><span class="new badge red" data-badge-caption="eliminar"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
