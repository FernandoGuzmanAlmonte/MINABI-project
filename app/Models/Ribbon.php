<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Mime\Exception\RfcComplianceException;

class Ribbon extends Model
{
    use HasFactory;

    public function coils(){
        return $this->belongsToMany('App\Models\Coil');
    }
}
