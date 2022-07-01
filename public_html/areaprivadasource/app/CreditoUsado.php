<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditoUsado extends Model
{
    public function Inmueble()
    {
        return $this->belongsTo(Inmueble::class,'inmueble_id');
    }
    public function user()
    {
        return $this->belongsTo(User::Class, 'user_id');
    }
    public function credito()
    {
        return $this->belongsTo(Creditos::class,'credito_id');
    }
}
