<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhiteCoil extends Model
{
    use HasFactory;

    public function whiteRibbons(){
        return $this->morphedByMany(WhiteRibbon::class, 'white_coil_product');
    }

    public function whiteWaste(){
        return $this->morphedByMany(WhiteWaste::class, 'white_coil_product');
    }

    public function related()
    {
        return $this->hasMany(WhiteCoilProduct::class);
    }

    public function provider()
    {
        return $this->belongsTo('App\Models\Provider'); 
    }
    
    public function coilType()
    {
        return $this->belongsTo('App\Models\CoilType'); 
    }
}
