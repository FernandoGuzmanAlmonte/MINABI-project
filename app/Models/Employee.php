<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function ribbons()
    {
        //Relación muchos a muchos Employee_Ribbon
        return $this->belongsToMany('App\Models\Ribbon'); 
    }

    public function bags()
    {
        //Relación muchos a muchos Employee_Bag
        return $this->belongsToMany('App\Models\Bag'); 
    }

    public function wasteBags()
    {
        //Relación muchos a muchos Employee-Waste_Bags
        return $this->belongsToMany('App\Models\WasteBag'); 
    }

    public function wasteRibbons()
    {
        //Relación muchos a muchos Employee-Waste_Ribbons
        return $this->belongsToMany('App\Models\WasteRibbon'); 
    }
}
