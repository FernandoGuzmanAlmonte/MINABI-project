<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coil extends Model
{
    use HasFactory;

    public function ribbons(){
        return $this->belongsToMany('App\Models\Coil');
    }
}
