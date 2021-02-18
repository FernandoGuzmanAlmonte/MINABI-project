<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    public function coils()
    {
        return $this->hasMany('App\Models\Coil');
    }
}
