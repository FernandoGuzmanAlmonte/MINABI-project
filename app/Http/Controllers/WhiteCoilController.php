<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWhiteCoil;
use App\Models\WhiteCoil;
use App\Models\Provider;
use App\Models\CoilType;
use App\Models\WhiteRibbonProduct;
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
       $providers = Provider::all();
       $coilTypes = CoilType::select('id','alias')->where('tipo','=','CENEFA')->get();
        
        return view('whiteCoils.create', compact('providers', 'coilTypes'));
    }

   /* public function createFromProvider(Provider $provider){
        return view('coils.create', compact('provider'));
    }*/
    
    public function edit(WhiteCoil $whiteCoil){
        $providers = Provider::all();
        $coilTypes = CoilType::all();

        return view('whiteCoils.edit', compact('whiteCoil', 'providers', 'coilTypes'));
    }

    public function update(StoreWhiteCoil $request, WhiteCoil $whiteCoil){
        $whiteCoil->provider_id = $request->provider_id;
        $whiteCoil->coil_type_id = $request->coil_type_id;

        $whiteCoil->nomenclatura =  $request->nomenclatura;
        $whiteCoil->status =  $request->status;
        $whiteCoil->fArribo =  $request->fArribo;
        $whiteCoil->peso =  $request->peso;
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
        $whiteRibbonProduct =  new Collection();
        foreach($whiteRibbons as $whiteRibbon ){
        $whiteRibbonProduct =  $whiteRibbonProduct->concat(WhiteRibbonProduct::where('white_ribbon_id', '=' , $whiteRibbon->white_coil_product_id)->get());
        }
        
    return view('whiteCoils.show', compact('whiteCoil', 'whiteRibbons', 'whiteRibbonProduct'));
    }

    public function store(StoreWhiteCoil $request){
        $whiteCoil =  new WhiteCoil();

        if($request->provider_id != null) 
            $whiteCoil->provider_id = $request->provider_id;
        if($request->coil_type_id != null) 
            $whiteCoil->coil_type_id = $request->coil_type_id;

        $whiteCoil->nomenclatura =  $request->nomenclatura;
        $whiteCoil->status =  $request->status;
        $whiteCoil->fArribo =  $request->fArribo;
        $whiteCoil->peso =  $request->peso;
        $whiteCoil->observaciones =  $request->observaciones;
        $whiteCoil->pesoUtilizado = $request->pesoUtilizado;
        $whiteCoil->costo = $request->costo;

        $whiteCoil->save();

        return redirect()->route('whiteCoil.show', $whiteCoil);
    }  
}
