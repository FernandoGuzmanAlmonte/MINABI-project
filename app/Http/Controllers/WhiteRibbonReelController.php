<?php

namespace App\Http\Controllers;

use App\Models\WhiteRibbonReel;
use App\Models\WhiteRibbon;
use App\Http\Requests\StoreWhiteRibbonReel;
use Illuminate\Http\Request;

class WhiteRibbonReelController extends Controller
{
    public function index(){
        $whiteRibbonReel = WhiteRibbonReel::select('nomenclatura')->get();
        $whiteRibbonReel = WhiteRibbonReel::paginate(10);

        return view('WhiteRibbonReels.index', compact('whiteRibbonReel'));
    }

    public function create(){
        return view('WhiteRibbonReels.create');
    }

    //funcion para crear relaciones con bobina
    public function createProduct(Request $request){
        $whiteRibbon = WhiteRibbon::find($request->whiteRibbon);
        $nomenclatura = 'HUE-' . $whiteRibbon->nomenclatura . '-' . ($whiteRibbon->whiteReels()->count()+1);
        return view('WhiteRibbonReels.create', ['whiteRibbonId' => $request->whiteRibbon, 'nomenclatura' => $nomenclatura]);
    }

    public function edit(WhiteRibbonReel $ribbonReel){
        return view('RibbonReels.edit', compact('ribbonReel'));
    }

    public function update(StoreWhiteRibbonReel $request, WhiteRibbonReel $whiteRibbonReel){
        $whiteRibbonReel->nomenclatura =  $request->nomenclatura;
        $whiteRibbonReel->peso =  $request->peso;
        $whiteRibbonReel->observaciones =  $request->observaciones;
        $whiteRibbonReel->fechaAlta =  $request->fechaAlta;
        $whiteRibbonReel->status = $request->status;
       

        $whiteRibbonReel->save();

        return redirect()->route('whiteRibbonReel.show', compact('whiteRibbonReel'));
    }

    public function show(WhiteRibbonReel $whiteRibbonReel){
        $whiteRibbon = $whiteRibbonReel->whiteRibbons()->get()->first();
        //obtenemos la bobina relacionada
        $whiteCoil = $whiteRibbon->whiteCoils()->get()->first();
        return view('whiteRibbonReels.show', compact('whiteRibbonreel', 'ribbon', 'coil'));
    }

    public function store(StoreWhiteRibbonReel $request)
    {

        //busca la bobina
        $whiteRibbon = WhiteRibbon::find($request->whiteRibbonId);
        //si el pesoutilizado mas el peso de rollo es menor o igual al peso de la bobina entonces crear el rollo
        if($whiteRibbon->peso >= ($request->peso + $whiteRibbon->pesoUtilizado)){

        $whiteRibbonReel =  new WhiteRibbonReel();

        $whiteRibbonReel->nomenclatura =  $request->nomenclatura;
        $whiteRibbonReel->peso =  $request->peso;
        $whiteRibbonReel->observaciones =  $request->observaciones;
        $whiteRibbonReel->fechaAlta =  $request->fechaAlta;
        $whiteRibbonReel->status = $request->status;

        $whiteRibbonReel->save();
        
        $addProduct = WhiteRibbonReel::find($whiteRibbonReel->id);
        $addProduct->whiteRibbons()->attach($request->whiteRibbonId, ['nomenclatura'=>$whiteRibbonReel->nomenclatura,
                                     'status'=>'N/A', 
                                     'fAdquisicion'=>$whiteRibbonReel->fechaAlta]);
        
        $whiteRibbon->pesoUtilizado = $request->peso + $whiteRibbon->pesoUtilizado;
        if($whiteRibbon->pesoUtilizado == $whiteRibbon->peso)
        $whiteRibbon->status = 'TERMINADA';                           
        $whiteRibbon->save();
        
        return redirect()->route('whiteRibbon.show', compact('whiteRibbon'));  
        }
        //en caso de que no pase el if regresamos el formulario con los valores y el mensaje de error
        else{
            return redirect()->back()->withInput($request->all())->withErrors('El peso del hueso sobrepasa el limite de peso del rollo');
        }
    }
}
