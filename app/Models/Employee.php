<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function ribbons()
    {
        //Relación muchos a muchos Coil_Ribbon
        return $this->belongsToMany('App\Models\Ribbon'); 
    }
}
