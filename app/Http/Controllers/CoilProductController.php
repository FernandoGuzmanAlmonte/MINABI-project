<?php

namespace App\Http\Controllers;

use App\Models\CoilProduct;
use Illuminate\Http\Request;

class CoilProductController extends Controller
{
    public function index(){
        $coilProducts = CoilProduct::select('nomenclatura',  'status', 'coil_id')->get();
        $coilProducts = coilProduct::paginate(10);

        return view('coilProducts.index', compact('coilProducts'));
    }

    public function create(){
        return view('ribbon.create');
    }

    public function edit(CoilProduct $coilProduct){
        return view('coilProducts.edit', compact('coilProduct'));
    }

    public function update(Request $request, CoilProduct $coilProduct){
        $coilProduct->nomenclatura =  $request->nomenclatura;
        $coilProduct->status =  $request->status;
        $coilProduct->fArribo =  $request->fArribo;
        $coilProduct->pesoBruto =  $request->pesoBruto;
        $coilProduct->pesoNeto =  $request->pesoNeto;
        $coilProduct->observaciones =  $request->observaciones;
        $coilProduct->diametroBobina =  $request->diametroBobina;
        $coilProduct->diametroInterno =  $request->ddiametroInterno;
        $coilProduct->diametroExterno =  $request->diametroExterno;
        $coilProduct->largoM =  $request->largoM;
        $coilProduct->costo =  $request->costo;
        $coilProduct->provider_id = $request->provider_id;

        $coilProduct->save();

        return redirect()->route('coilProducts.show', compact('coilProduct'));
    }

    public function show(CoilProduct $coilProduct){

        return view('coilProducts.show', compact('coilProduct'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nomenclatura' => 'required',
            'status' => 'required',
            'fArribo' => 'required',
            'pesoBruto' => 'required',
            'pesoNeto' => 'required',
            'largoM' => 'required',
            'costo' => 'required',
            'provider_id' => 'required'
        ]);

        $coilProduct =  new CoilProduct();

        $coilProduct->nomenclatura =  $request->nomenclatura;
        $coilProduct->status =  $request->status;
        $coilProduct->fArribo =  $request->fArribo;
        $coilProduct->pesoBruto =  $request->pesoBruto;
        $coilProduct->pesoNeto =  $request->pesoNeto;
        $coilProduct->observaciones =  $request->observaciones;
        $coilProduct->diametroBobina =  $request->diametroBobina;
        $coilProduct->diametroInterno =  $request->ddiametroInterno;
        $coilProduct->diametroExterno =  $request->diametroExterno;
        $coilProduct->largoM =  $request->largoM;
        $coilProduct->costo =  $request->costo;
        $coilProduct->provider_id = $request->provider_id;

        $coilProduct->save();
        //return $request->all();
    }
}
