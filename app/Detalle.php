<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    protected $table = 'detalles';

    protected $fillable = ['cantidad', 'item_id', 'alquiler_id'];

    public function alquiler()
    {
        return $this->belongsTo(Alquiler::class, 'alquiler_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
