<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquetes extends Model
{
    protected $table = 'paquetes';
    protected $fillable = ['nombre','duracion_meses','n_inmuebles','valor_final'];

    public function asignaciones()
    {
       return $this->hasMany('App\AsignacionPaquete','paquete_id');  
    }
    public function plan()
    {
        return $this->belongsToMany(Planes::class,'asignacion_paquetes','paquete_id','plan_id');
    }
}
