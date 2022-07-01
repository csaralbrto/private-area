<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planes extends Model
{
    protected $table = 'planes';
    protected $fillable = ['publicar_para','Nombre','n_fotos','n_videos','dias_plataforma','visualizacion','n_publicaciones_organica','n_publicaciones_segmentada','n_avisos_pdf','porcentaje_fundacion','precio_sin_aviso_im','precio_con_aviso_im','precio_impresion_aviso','precio' ];

    public function asignaciones()
    {
       return $this->hasMany('App\AsignacionPaquete','plan_id');  
    }
}
