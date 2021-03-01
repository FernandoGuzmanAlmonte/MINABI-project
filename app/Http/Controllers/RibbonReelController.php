<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRibbonReel;
use App\Models\CoilProduct;
use App\Models\RibbonReel;
use App\Models\Ribbon;
use Illuminate\Http\Request;

class RibbonReelController extends Controller
{
    public function index(){
        $RibbonReels = RibbonReel::select('nomenclatura')->get();
        $RibbonReels = RibbonReel::paginate(10);

        return view('RibbonReels.index', compact('RibbonReels'));
    }

    public function create(){
        return view('RibbonReels.create');
    }

    //funcion para crear relaciones con bobina
    public function createProduct(Request $request){
        $ribbon = Ribbon::find($request->ribbon);
        $nomenclatura = 'HUE-' . $ribbon->nomenclatura . '-' . ($ribbon->reels()->count()+1);
        return view('RibbonReels.create', ['ribbonId' => $request->ribbon, 'nomenclatura' => $nomenclatura]);
    }

    public function edit(RibbonReel $ribbonReel){
        return view('RibbonReels.edit', compact('ribbonReel'));
    }

    public function update(StoreRibbonReel $request, RibbonReel $ribbonReel){
        $ribbonReel->nomenclatura =  $request->nomenclatura;
        $ribbonReel->peso =  $request->peso;
        $ribbonReel->observaciones =  $request->observaciones;
        $ribbonReel->fechaAlta =  $request->fechaAlta;
        $ribbonReel->status = $request->status;
       

        $ribbonReel->save();

        return redirect()->route('ribbonReel.show', compact('RibbonReel'));
    }

    public function show(RibbonReel $ribbonReel){
        $ribbon = $ribbonReel->ribbons()->get()->first();
        //obtenemos la bobina relacionada
        $coil = $ribbon->coils()->get()->first();
        return view('ribbonReels.show', compact('ribbonReel', 'ribbon', 'coil'));
    }

    public function store(StoreRibbonReel $request)
    {

        //busca la bobina
        $ribbon = Ribbon::find($request->ribbonId);
        //si el pesoutilizado mas el peso de rollo es menor o igual al peso de la bobina entonces crear el rollo
        if($ribbon->peso >= ($request->peso + $ribbon->pesoUtilizado)){

        $ribbonReel =  new ribbonReel();

        $ribbonReel->nomenclatura =  $request->nomenclatura;
        $ribbonReel->peso =  $request->peso;
        $ribbonReel->observaciones =  $request->observaciones;
        $ribbonReel->fechaAlta =  $request->fechaAlta;
        $ribbonReel->status = $request->status;

        $ribbonReel->save();
        
        $addProduct = ribbonReel::find($ribbonReel->id);
        $addProduct->ribbons()->attach($request->ribbonId, ['nomenclatura'=>$ribbonReel->nomenclatura,
                                     'status'=>'N/A', 
                                     'fAdquisicion'=>$ribbonReel->fechaAlta]);
        
        $ribbon->pesoUtilizado = $request->peso + $ribbon->pesoUtilizado;
        if($ribbon->pesoUtilizado == $ribbon->peso){
            $ribbon->status = 'TERMINADA';   
            $coilProduct = CoilProduct::where('coil_product_id','=', $ribbon->id)->first();
            $coilProduct->status = 'TERMINADA';
            $coilProduct->save();  
         }                           
        $ribbon->save();
        
        return redirect()->route('ribbonReel.show', compact('ribbonReel'));  
        }
        //en caso de que no pase el if regresamos el formulario con los valores y el mensaje de error
        else{
            return redirect()->back()->withInput($request->all())->withErrors('El peso del hueso sobrepasa el limite de peso del rollo');
        }
    }
}