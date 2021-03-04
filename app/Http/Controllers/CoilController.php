<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCoil;
use App\Models\Coil;
use App\Models\Provider;
use App\Models\CoilType;
use App\Models\RibbonProduct;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CoilController extends Controller
{
    public function index(){
        $coils = Coil::select('nomenclatura', 'fArribo',  'status' , 'coil_type_id')->get();
        $coils = Coil::paginate(10);

        return view('coils.index', compact('coils'));
    }

    public function create(){
        $providers = Provider::all();
        $coilTypes = CoilType::select('id','alias')->where('tipo','=','CELOFAN')->get();
        
        return view('coils.create', compact('providers', 'coilTypes'));
    }

    public function createFromProvider(Provider $provider){
        return view('coils.create', compact('provider'));
    }
    
    public function edit(Coil $coil){
        $providers = Provider::all();
        $coilTypes = CoilType::select('id','alias')->where('tipo','=','CELOFAN')->get();

        return view('coils.edit', compact('coil', 'providers', 'coilTypes'));
    }

    public function update(StoreCoil $request, Coil $coil){
        $coil->provider_id = $request->provider_id;
        $coil->coil_type_id = $request->coil_type_id;

        $coil->nomenclatura =  $request->nomenclatura;
        $coil->status =  $request->status;
        $coil->fArribo =  $request->fArribo;
        $coil->pesoBruto =  $request->pesoBruto;
        $coil->pesoNeto =  $request->pesoNeto;
        $coil->observaciones =  $request->observaciones;
        $coil->diametroBobina =  $request->diametroBobina;
        $coil->diametroInterno =  $request->diametroInterno;
        $coil->diametroExterno =  $request->diametroExterno;
        $coil->largoM =  $request->largoM;
        $coil->costo =  $request->costo;
        $coil->pesoUtilizado = $request->pesoUtilizado;

        $coil->save();

        return redirect()->route('coil.show', compact('coil'));
    }

    public function show(Coil $coil){
        $ribbons =  Coil::find($coil->id);
        //Obtenemos todos los rollos relacionados a la bobina
        $ribbons = $ribbons->related()->get();
        //obtenemos todos las objetos relacionadas a los rollos
        $ribbonProduct =  new Collection();
        foreach($ribbons as $ribbon ){
            $ribbonProduct =  $ribbonProduct->concat(RibbonProduct::where('ribbon_id', '=' , $ribbon->coil_product_id)->get());
        }
        
        return view('coils.show', compact('coil', 'ribbons', 'ribbonProduct'));
    }

    public function store(StoreCoil $request){
        $coil =  new Coil();

        $coil->provider_id = $request->provider_id;
        $coil->coil_type_id = $request->coil_type_id;
        $coil->nomenclatura =  $request->nomenclatura;
        $coil->status =  $request->status;
        $coil->fArribo =  $request->fArribo;
        $coil->pesoBruto =  $request->pesoBruto;
        $coil->pesoNeto =  $request->pesoNeto;
        $coil->observaciones =  $request->observaciones;
        $coil->diametroBobina =  $request->diametroBobina;
        $coil->diametroInterno =  $request->diametroInterno;
        $coil->diametroExterno =  $request->diametroExterno;
        $coil->largoM =  $request->largoM;
        $coil->costo =  $request->costo;
        $coil->pesoUtilizado = $request->pesoUtilizado;

        $coil->save();

        return redirect()->route('coil.show', $coil);
    }  
}
