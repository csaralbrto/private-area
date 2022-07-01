<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PubliciadVideo extends Model
{
    protected $table = 'publicidad_video';
    protected $fillable = [
        'imagen',
        'nombre',
        'url',
        'tiempo',
        'status',
    ];
}
