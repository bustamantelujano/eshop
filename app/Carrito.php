<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'idcliente',
        'cantidad',
        'precioitem'
    ];
}
