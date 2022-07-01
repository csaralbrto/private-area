<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creditos extends Model
{
    protected $table = 'creditos';
    protected $fillable = ['tipo_credito','fecha_inicio_credito','fecha_vencimiento','cantidad','usuario_id','tipo_usuario','factura_id'];

    public function plan()
    {
        return $this->belongsTo(Planes::class,'tipo_credito');
    }
    public function factura()
    {
        return $this->belongsTo(Facturas::class,'factura_id');
    }
    public function usado()
    {
        return $this->hasMany(CreditoUsado::class,'credito_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'usuario_id');
    }
}
