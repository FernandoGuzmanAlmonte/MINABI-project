<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWhiteCoil;
use App\Models\WhiteCoil;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class WhiteCoilController extends Controller
{
    public function index(){
        $whiteCoils = WhiteCoil::select('nomenclatura', 'fArribo',  'status')->get();
        $whiteCoils = WhiteCoil::paginate(10);

        return view('whiteCoils.index', compact('whiteCoils'));
    }

    public function create(){
       // $providers = Provider::all();
        
    return view('whiteCoils.create'/*, compact('providers')*/);
    }

   /* public function createFromProvider(Provider $provider){
        return view('coils.create', compact('provider'));
    }*/
    
    public function edit(WhiteCoil $whiteCoil){
        return view('whiteCoils.edit', compact('whiteCoil'));
    }

    public function update(StoreWhiteCoil $request, WhiteCoil $whiteCoil){
        $whiteCoil->nomenclatura =  $request->nomenclatura;
        $whiteCoil->status =  $request->status;
        $whiteCoil->fArribo =  $request->fArribo;
        $whiteCoil->peso =  $request->peso;
        $whiteCoil->cantidadRollos =  $request->cantidadRollos;
        $whiteCoil->observaciones =  $request->observaciones;
        $whiteCoil->pesoUtilizado = $request->pesoUtilizado;
        $whiteCoil->costo = $request->costo;
        
        $whiteCoil->save();

        return redirect()->route('whiteCoil.show', compact('whiteCoil'));
    }

    public function show(WhiteCoil $whiteCoil){
        $whiteRibbons =  WhiteCoil::find($whiteCoil->id);
        //Obtenemos todos los rollos relacionados a la bobina
        $whiteRibbons = $whiteRibbons->related()->get();
        //obtenemos todos las objetos relacionadas a los rollos
      /*  $ribbonProduct =  new Collection();
        foreach($whiteRibbons as $ribbon ){
        $ribbonProduct =  $ribbonProduct->concat(RibbonProduct::where('ribbon_id', '=' , $ribbon->coil_product_id)->get());
        }*/
        
    return view('whiteCoils.show', compact('whiteCoil', 'whiteRibbons'/*, 'ribbonProduct'*/));
    }

    public function store(StoreWhiteCoil $request){
        $whiteCoil =  new WhiteCoil();

        $whiteCoil->nomenclatura =  $request->nomenclatura;
        $whiteCoil->status =  $request->status;
        $whiteCoil->fArribo =  $request->fArribo;
        $whiteCoil->peso =  $request->peso;
        $whiteCoil->cantidadRollos =  $request->cantidadRollos;
        $whiteCoil->observaciones =  $request->observaciones;
        $whiteCoil->pesoUtilizado = $request->pesoUtilizado;
        $whiteCoil->costo = $request->costo;

        $whiteCoil->save();

        return redirect()->route('whiteCoil.show', $whiteCoil);
    }  
}
