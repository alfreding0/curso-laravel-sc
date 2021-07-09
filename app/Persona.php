<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas'; //cliente y como administrador

    protected $fillable = ['nombre', 'telefono', 'correo', 'carnet_identidad', 'direccion', 'tipo'];

    public function alquileres()
    {
        return $this->hasMany(Alquiler::class, 'usuario_id');
    }

    public function cliente_alquileres()
    {
        return $this->hasMany(Alquiler::class, 'cliente_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'persona_id', 'id');
    }
}
