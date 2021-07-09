@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s8 offset-s2">

                <div class="card card-login">
                    <div class="card-login-splash">
                        <img src="{{asset('img/geometric-cave.jpg')}}" alt="">
                    </div>
                    <div class="card-content">
                        <span class="card-title">Inicio de Sesión</span>
                        <form method="POST" action="{{route('login')}}">
                            @csrf

                            <div class="input-field" >
                                <input id="email" name="email" type="text" class="validate" value="{{old('email')}}">
                                <label for="email">Email: </label>
                                {!! $errors->first('email', '<span class="help-block red-text">:message</span>') !!}
                            </div>
                            <div class="input-field">
                                <input id="password" name="password" type="password" class="validate">
                                <label for="password">Contraseña: </label>
                                {!! $errors->first('password', '<span class="help-block red-text">:message</span>') !!}
                            </div>

                            <br><br>
                            <div>
                                <input class="btn right dark-primary-color" value="Iniciar Sesión" type="submit" onclick="showProgress()">
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
