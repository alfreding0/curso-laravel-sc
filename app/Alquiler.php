<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    protected $table = 'alquileres';

    protected $fillable = ['fecha_alquiler', 'fecha_devolucion', 'costo', 'cantidad_items', 'cliente_id', 'usuario_id'];

    public function usuario()
    {
        return $this->belongsTo(Persona::class,'usuario_id');
    }

    public function cliente()
    {
        return $this->belongsTo(Persona::class,'cliente_id');
    }

    public function detalles()
    {
        return $this->hasMany(Detalle::class, 'alquiler_id');
    }
}
