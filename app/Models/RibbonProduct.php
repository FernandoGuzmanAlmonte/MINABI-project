<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RibbonProduct extends Model
{
    use HasFactory;

    public function bagProducts()
    {
        return $this->morphTo();
    }
}
