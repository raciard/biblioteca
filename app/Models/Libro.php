<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;


    public function copie(){
        return $this->hasMany(Copia::class);
    }

    public function disponibile(){

        return !($this->copie->where('disponibile', true)->isEmpty());
    }
}   
