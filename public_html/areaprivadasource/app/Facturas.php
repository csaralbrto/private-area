<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    protected $table='facturas';
    protected $fillable = ['total','subTotal','iva','estado','fechaCreacion','user_id'];
    
    function creditos(){
        return $this->hasMany(Creditos::class,'factura_id')->orderBy('tipo_credito','asc');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }
}
