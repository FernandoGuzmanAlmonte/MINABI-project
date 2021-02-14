<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoilProduct extends Model
{
    use HasFactory;

    public function coilProducts()
    {
        return $this->morphTo();
    }
}
