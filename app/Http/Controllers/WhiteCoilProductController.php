<?php

namespace App\Http\Controllers;

use App\Models\WhiteCoilProduct;
use Illuminate\Http\Request;

class WhiteCoilProductController extends Controller
{
    public function index(){
        $whiteCoilProducts = WhiteCoilProduct::select('nomenclatura',  'status', 'white_coil_id')->get();
        $whiteCoilProducts = WhiteCoilProduct::paginate(10);

        return view('whiteCoilProducts.index', compact('whiteCoilProducts'));
    }
}
