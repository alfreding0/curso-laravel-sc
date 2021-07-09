<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $table = 'peliculas';

    protected $fillable = ['formato', 'idioma', 'item_id'];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
