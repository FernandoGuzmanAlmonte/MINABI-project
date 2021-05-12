<?php

namespace App\Http\Controllers;

use App\Models\Destroy;
use Illuminate\Http\Request;

class DestroyController extends Controller
{

    public function store(Request $request){

        $destroy = new Destroy();
        $destroy->nomenclatura = $request->nomenclatura;
        $destroy->fArribo = $request->fArribo;
        $destroy->peso = $request->peso;
        $destroy->type =  $request->type;
        $destroy->save();

        switch($destroy->type){
            case ('App\Models\Coil'):
                return redirect()->route('coil.index')->with('eliminar', 'ok');
        }
    }

    public function reporte(){
        $destroys = Destroy::all();
        return view('destroys.reporteria', compact('destroys'));
    }
}
