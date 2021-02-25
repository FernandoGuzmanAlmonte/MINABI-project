<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhiteCoilProduct extends Model
{
    use HasFactory;

    public function whiteCoilProducts()
    {
        return $this->morphTo();
    }
}
