<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('add', function(){
    $user = new \App\User();
    $user->name = 'admin';
    $user->password = bcrypt('admin');
    $user->email = 'admin@gmail.com';
    $user->persona_id = 1;
    $user->save();
    return $user;
});





Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth'])->group(function() {
    Route::group(['prefix'=>'usuarios'], function (){
        Route::get('/', 'UsuarioController@index')->name('usuarios.index');
        Route::post('/', 'UsuarioController@store')->name('usuarios.store');
        Route::get('/create', 'UsuarioController@create')->name('usuarios.create');
        Route::get('/{id}', 'UsuarioController@show')->name('usuarios.show');
        Route::put('/{id}', 'UsuarioController@update')->name('usuarios.update');
        Route::get('/{id}/edit', 'UsuarioController@edit')->name('usuarios.edit');
        Route::get('/{id}/destroy', 'UsuarioController@destroy')->name('usuarios.destroy');
    });

    Route::group(['prefix'=>'generos'], function (){
        Route::get('/', 'GeneroController@index')->name('generos.index');
        Route::post('/', 'GeneroController@store')->name('generos.store');
        Route::get('/create', 'GeneroController@create')->name('generos.create');
        Route::get('/{id}', 'GeneroController@show')->name('generos.show');
        Route::put('/{id}', 'GeneroController@update')->name('generos.update');
        Route::get('/{id}/edit', 'GeneroController@edit')->name('generos.edit');
        Route::get('/{id}/destroy', 'GeneroController@destroy')->name('generos.destroy');
    });

    Route::group(['prefix'=>'clientes'], function () {
        Route::get('/', 'ClienteController@index')->name('clientes.index');
        Route::post('/', 'ClienteController@store')->name('clientes.store');
        Route::get('/create', 'ClienteController@create')->name('clientes.create');
        Route::get('/{id}', 'ClienteController@show')->name('clientes.show');
        Route::put('/{id}', 'ClienteController@update')->name('clientes.update');
        Route::get('/{id}/edit', 'ClienteController@edit')->name('clientes.edit');
        Route::get('/{id}/destroy', 'ClienteController@destroy')->name('clientes.destroy');
    });

    Route::group(['prefix'=>'libros'], function () {
        Route::get('/', 'LibroController@index')->name('libros.index');
        Route::post('/', 'LibroController@store')->name('libros.store');
        Route::get('/create', 'LibroController@create')->name('libros.create');
        Route::get('/{id}', 'LibroController@show')->name('libros.show');
        Route::put('/{id}', 'LibroController@update')->name('libros.update');
        Route::get('/{id}/edit', 'LibroController@edit')->name('libros.edit');
        Route::get('/{id}/destroy', 'LibroController@destroy')->name('libros.destroy');
    });

    Route::group(['prefix'=>'peliculas'], function () {
        Route::get('/', 'PeliculaController@index')->name('peliculas.index');
        Route::post('/', 'PeliculaController@store')->name('peliculas.store');
        Route::get('/create', 'PeliculaController@create')->name('peliculas.create');
        Route::get('/{id}', 'PeliculaController@show')->name('peliculas.show');
        Route::put('/{id}', 'PeliculaController@update')->name('peliculas.update');
        Route::get('/{id}/edit', 'PeliculaController@edit')->name('peliculas.edit');
        Route::get('/{id}/destroy', 'PeliculaController@destroy')->name('peliculas.destroy');
    });

    Route::group(['prefix'=>'alquileres'], function () {
        Route::get('/', 'AlquilerController@index')->name('alquileres.index');
        Route::post('/', 'AlquilerController@store')->name('alquileres.store');
        Route::get('/create', 'AlquilerController@create')->name('alquileres.create');
        Route::get('/{id}', 'AlquilerController@show')->name('alquileres.show');
        Route::put('/{id}', 'AlquilerController@update')->name('alquileres.update');
        Route::get('/{id}/edit', 'AlquilerController@edit')->name('alquileres.edit');
        Route::get('/{id}/destroy', 'AlquilerController@destroy')->name('alquileres.destroy');

        Route::group(['prefix'=>'detalles'], function () {
            Route::get('/create/{alquiler_id}', 'AlquilerDetalleController@create')->name('alquileres.detalles.create');
            Route::post('/{alquiler_id}', 'AlquilerDetalleController@store')->name('alquileres.detalles.store');
            Route::get('/{id}/destroy/{alquiler_id}', 'AlquilerDetalleController@destroy')->name('alquileres.detalles.destroy');
        });
    });
});





