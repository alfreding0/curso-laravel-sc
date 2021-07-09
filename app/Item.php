<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = ['nombre', 'creador', 'copias', 'precio', 'tipo', 'genero_id'];

    public function detalles()
    {
        return $this->hasMany(Detalle::class, 'item_id');
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'genero_id');
    }

    public function libro()
    {
        return $this->hasOne(Libro::class, 'item_id');
    }

    public function pelicula()
    {
        return $this->hasOne(Pelicula::class, 'item_id');
    }
}
