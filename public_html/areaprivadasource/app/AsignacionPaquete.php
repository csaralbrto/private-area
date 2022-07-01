<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignacionPaquete extends Model
{
    protected $table = 'asignacion_paquetes';
    protected $fillable = ['paquete_id','cantidad_paquete','plan_id'];

    public function paquete()
    {
        return $this->belongsTo('App\Paquetes','paquete_id');
    }
}
