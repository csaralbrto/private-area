<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';
    protected $fillable = ['user_id', 'inmueble_id', 'horario', 'estado', 'nombre', 'telefono', 'correo'];

    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }
    public function Inmuebles()
    {
        return $this->hasOne(Inmueble::class,'id');
    }
}

