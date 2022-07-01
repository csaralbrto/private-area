<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    protected $table = 'membresias';
    protected $fillable = ['visualizacion', 'n_fotos', 'n_videos', 'p_organicas', 'p_segmentadas','donacion','portaman','flayer'];
}
