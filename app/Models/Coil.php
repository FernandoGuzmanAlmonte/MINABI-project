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

    public function coilReels(){
        return $this->morphedByMany(CoilReel::class, 'coil_product');
    }

    public function wasteRibbons(){
        return $this->morphedByMany(wasteRibbon::class, 'coil_product');
    }

    public function related()
    {
        return $this->hasMany(CoilProduct::class);
    }

    public function provider()
    {
        return $this->belongsTo('App\Models\Provider'); 
    }
}
