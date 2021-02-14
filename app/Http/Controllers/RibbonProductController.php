<?php

namespace App\Http\Controllers;

use App\Models\RibbonProduct;
use Illuminate\Http\Request;

class RibbonProductController extends Controller
{
    public function index(){
        $ribbonProduct = RibbonProduct::select('nomenclatura',  'status', 'ribbon_id')->get();
        $ribbonProduct = RibbonProduct::paginate(10);

        return view('ribbonProducts.index', compact('ribbonProduct'));
    }

    public function create(){
        return view('ribbon.create');
    }

    public function edit(RibbonProduct $ribbonProduct){
        return view('ribbonProduct.edit', compact('ribbonProduct'));
    }

    public function update(Request $request, RibbonProduct $ribbonProduct){
        $ribbonProduct->nomenclatura =  $request->nomenclatura;
        $ribbonProduct->status =  $request->status;
        $ribbonProduct->fArribo =  $request->fArribo;
        $ribbonProduct->pesoBruto =  $request->pesoBruto;
        $ribbonProduct->pesoNeto =  $request->pesoNeto;
        $ribbonProduct->observaciones =  $request->observaciones;
        $ribbonProduct->diametroBobina =  $request->diametroBobina;
        $ribbonProduct->diametroInterno =  $request->ddiametroInterno;
        $ribbonProduct->diametroExterno =  $request->diametroExterno;
        $ribbonProduct->largoM =  $request->largoM;
        $ribbonProduct->costo =  $request->costo;
        $ribbonProduct->provider_id = $request->provider_id;

        $ribbonProduct->save();

        return redirect()->route('ribbonProducts.show', compact('ribbonProduct'));
    }

    public function show(RibbonProduct $ribbonProduct){

        return view('ribbonProducts.show', compact('ribbonProduct'));
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

        $ribbonProduct =  new RibbonProduct();

        $ribbonProduct->nomenclatura =  $request->nomenclatura;
        $ribbonProduct->status =  $request->status;
        $ribbonProduct->fArribo =  $request->fArribo;
        $ribbonProduct->pesoBruto =  $request->pesoBruto;
        $ribbonProduct->pesoNeto =  $request->pesoNeto;
        $ribbonProduct->observaciones =  $request->observaciones;
        $ribbonProduct->diametroBobina =  $request->diametroBobina;
        $ribbonProduct->diametroInterno =  $request->ddiametroInterno;
        $ribbonProduct->diametroExterno =  $request->diametroExterno;
        $ribbonProduct->largoM =  $request->largoM;
        $ribbonProduct->costo =  $request->costo;
        $ribbonProduct->provider_id = $request->provider_id;

        $ribbonProduct->save();
        //return $request->all();
    }
}
