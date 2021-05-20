<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copia extends Model
{
    use HasFactory;

    public function libro(){
        return $this->belongsTo(Libro::class);
    }

    public function prestiti(){
        return $this->hasMany(Prestito::class);
    }
}
