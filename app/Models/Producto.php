<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'IDPRO';

    protected $fillable = [
        'IDCAT',
        'CODBARRASPRO',
        'NOMBREPRO',
        'PRECIOMINPRO',
        'PRECIOMAXPRO',
        'STOCKPRO',
        'ESTADOCATPRO',
        'PRECIOCOMPRAPRO',
        'PRECIOVENTAPRO',
        'STOCKMINPRO'
    ];

    protected $casts = [
        'PRECIOMINPRO' => 'decimal:2',
        'PRECIOMAXPRO' => 'decimal:2',
        'PRECIOCOMPRAPRO' => 'decimal:2',
        'PRECIOVENTAPRO' => 'decimal:2',
        'ESTADOCATPRO' => 'boolean',
    ];
}