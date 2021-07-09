<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libros';

    protected $fillable = ['edicion', 'publicacion', 'editorial', 'item_id'];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
