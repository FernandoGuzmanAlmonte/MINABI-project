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

    public function reporte(Request $request){
        //Valido que los campos existan sino les doy un valor por defecto
        $orderBy = $request->orderBy ?? 'id';
        $order = $request->order ?? 'ASC';

        //No es necesario der un valor por defecto para estos campos ya que se valida si es null
        //en sus scope()        
        $fechaAlta = $request->fechaAlta;
        $fechaEliminacion = $request->fechaEliminacion;

        $destroys = Destroy::fechaAlta($fechaAlta)
                            ->fechaEliminacion($fechaEliminacion)
                            ->orderBy($orderBy, $order)
                            ->get();

        return $request->ajax() ? response()->json(view('destroys.reporteria', compact('destroys', 'order', 'orderBy', 'fechaAlta', 'fechaEliminacion'))->render())
                    : view('destroys.reporteria', compact('destroys', 'order', 'orderBy', 'fechaAlta', 'fechaEliminacion'));
    }
}
