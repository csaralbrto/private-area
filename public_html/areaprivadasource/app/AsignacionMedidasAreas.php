<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignacionMedidasAreas extends Model
{
    protected $table = 'asignacion_medidas_areas';
    protected $fillable = ['inmueble_id','item_id','tipo_medida','largo','ancho'];

    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class,'inmueble_id');
    }
    public function itemMedida()
    {
        return $this->belongsTo(ItemMedida::class,'item_id');
    }
    public function tipoMedida()
    {
        return $this->belongsTo(TipoMedida::class,'tipo_medida');
    }
}
