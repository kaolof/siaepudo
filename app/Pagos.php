<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    protected $table ='pagos';
    
    protected $fillable=[
        'banco_emisor', 'num_solicitud', 'num_comprobante', 'fecha', 'imagen_comprobante', 'precio',
    ];
}
