<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedidasInmueble extends Model
{
    protected $table ='medidas_inmuebles';
    protected $fillable = ['tipo','medidas','descripcion','id_inmueble'];

    public function Inmueble()
    {
        return $this->belongsTo(Inmueble::class,'id_inmueble');
    }
}
