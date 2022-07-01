<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;


class Proyecto extends Model
{
    protected $table = 'proyectos';
    protected $fillable = ['nombre','descripcion','latitude','longitude','multimedia','multimedia2','slug','imagen_banner'];

    public function asignacion_inmueble()
    {
        return $this->hasMany(AsignacionInmeble::Class,'proyecto_id');
    }
    public function setNombreAttribute($value)
    {
        if(!(Proyecto::where('nombre', $value)->first())){
            $this->attributes['nombre'] = $value;
            $this->attributes['slug']=  Str::slug($value).rand(1,50000);
        }
    }
    //relaciones
    public function inmuebles()
    {
        return  $this->hasMany(Inmueble::class,'proyecto_id');
    }
    public function inmueble()
    {
        return $this->belongsToMany(Inmueble::class,'asignacion_inmebles','proyecto_id','inmueble_id');
    }
    public function asignar_adicionales()
    {
        return $this->belongsToMany(AdicionalesInmueble::Class,'adicionales_proyectos','proyecto_id','adicional_id');
    }
    public function AsignacionPlan()
    {
        return $this->hasMany(AsignacionInmuebleUsuario::Class,'id_inmueble')->where('tipo_inmueble',2);
    }
    //scopes
    public function scopeFiltro($query,$para,$tipo,$ciudad,$codigo)
    {
        if ($para) {
            $query->where('inmuebles.publicar_para',$para);
        }
        if ($tipo) {
            $query->where('inmuebles.tipo_inmueble',$tipo);
        }
        if ($ciudad) {
            $query->where('inmuebles.ciudad',$ciudad);
        }

    }
}
