<?php

namespace App\Http\Controllers;

use App\Models\Coil;
use Illuminate\Http\Request;

class CoilController extends Controller
{
    public function index(){

        $coils = Coil::all();

        return view('coils.index', compact('coils'));
    }

    public function create(){
        return view('coils.create');
    }

    public function show(){}

    public function store(Request $request)
    {
        $coil =  new Coil();

        $coil->nomenclatura =  $request->nomenclatura;
        $coil->status =  $request->status;
        $coil->fArribo =  $request->fArribo;
        $coil->pesoBruto =  $request->pesoBruto;
        $coil->pesoNeto =  $request->pesoNeto;
        $coil->observaciones =  $request->observaciones;
        $coil->diametroBobina =  $request->diametroBobina;
        $coil->diametroInterno =  $request->ddiametroInterno;
        $coil->diametroExterno =  $request->diametroExterno;
        $coil->largoM =  $request->largoM;
        $coil->costo =  $request->costo;
        $coil->provider_id = $request->provider_id;

        $coil->save();
        //return $request->all();
    }
}
