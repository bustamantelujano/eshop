<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'clave',
        'codigo_fabricante'	,
        'descripcion',
        'grupo'	,
        'marca'	,
        'garantia'	,
        'clase'	,
        'disponible',	
        'precio	moneda'	,
        'ficha_tecnica'	,
        'ficha_comercial'	,
        'imagen',
        'disponibleCD'
    ];
}
