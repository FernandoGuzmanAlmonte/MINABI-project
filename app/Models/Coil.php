<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coil extends Model
{
    use HasFactory;

    //relacion muchos a muchos poliformica
    public function ribbons(){
        return $this->morphedByMany(Ribbon::class, 'coil_product');
    }
}
