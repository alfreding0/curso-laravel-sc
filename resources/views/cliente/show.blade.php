@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col s12 m10 offset-m1 l6 offset-l3 xl6 offset-xl3">
            <div id="panel-left"  class="card">
                <div class="card-content">
                    <span class="card-title primary-text-color primary-text-style">
                        Datos Personales
                    </span>
                    <div class="row">
                        <div class="col s12 divider"></div>
                    </div>

                    <div class="row">
                        <div class="col s12 m5">
                            <p class="primary-text-color secondary-text-style">Nombre Completo:</p>
                        </div>
                        <div class="col s8 offset-s2 m7">
                            <p class="secondary-text-color">{{$persona->nombre}}</p>
                        </div>

                        <div class="col s12 m5">
                            <p class="primary-text-color secondary-text-style">Carnet identidad:</p>
                        </div>
                        <div class="col s8 offset-s2 m7">
                            <p class="secondary-text-color">{{$persona->carnet_identidad}}</p>
                        </div>

                        <div class="col s12 m5">
                            <p class="primary-text-color secondary-text-style">Teléfono:</p>
                        </div>
                        <div class="col s8 offset-s2 m7">
                            <p class="secondary-text-color">{{$persona->telefono}}</p>
                        </div>

                        <div class="col s12 m5">
                            <p class="primary-text-color secondary-text-style">Drirección:</p>
                        </div>
                        <div class="col s8 offset-s2 m7">
                            <p class="secondary-text-color">{{$persona->direccion}}</p>
                        </div>

                        <div class="col s12 m5">
                            <p class="primary-text-color secondary-text-style">Correo:</p>
                        </div>
                        <div class="col s8 offset-s2 m7">
                            <p class="secondary-text-color">{{$persona->correo}}</p>
                        </div>
                    </div>
                    <div class="card-action right-align">
                        <a href="{{ route('clientes.index') }}" class="waves-effect waves-brown btn-flat red-text bold">Atras</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
