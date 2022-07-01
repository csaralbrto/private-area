<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvisoPdf extends Model
{
    protected $table = 'avisos_pdf';
    protected $with=['user'];
    protected $fillable = ['inmueble_id','user_id','estado'];

    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }
}
