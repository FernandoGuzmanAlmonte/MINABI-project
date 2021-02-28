<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoilType extends Model
{
    use HasFactory;

    public function coils()
    {
        return $this->hasMany('App\Models\Coil');
    }

    public function whiteCoils()
    {
        return $this->hasMany('App\Models\WhiteCoil');
    }

    public function bagMeasures()
    {
        return $this->hasMany('App\Models\BagMeasure');
    }
}
