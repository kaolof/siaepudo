<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitudespendientes extends Model
{
    public function usuario(){

        return $this->belongsTo(Persona::class);

    }
}
