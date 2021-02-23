<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWasteRibbon;
use App\Models\WasteRibbon;
use App\Models\Coil;
use Illuminate\Http\Request;

class WasteRibbonController extends Controller
{
    public function index(){
        $wasteRibbons = WasteRibbon::select('nomenclatura', 'fechaInicioTrabajo' )->get();
        $wasteRibbons = WasteRibbon::paginate(10);

        return view('wasteRibbons.index', compact('wasteRibbons'));
    }

    public function create(){
        return view('wasteRibbons.create');
    }

    //funcion para crear relaciones con bobina
    public function createProduct(Request $request){
        $coil = Coil::find($request->coil);
        $nomenclatura = 'HUE-' . $coil->nomenclatura . '-' . ($coil->ribbons()->count()+1);
        return view('ribbonReel.create', ['coilId' => $request->coil, 'nomenclatura' => $nomenclatura]);
    }

    public function edit(WasteRibbon $wasteRibbon){
         return view('wasteRibbons.edit', compact('wasteRibbon'));
    }

    public function update(StoreWasteRibbon $request, WasteRibbon $wasteRibbon){
        $wasteRibbon->nomenclatura =  $request->nomenclatura;
        $wasteRibbon->fechaInicioTrabajo =  $request->fechaInicioTrabajo;
        $wasteRibbon->fechaFinTrabajo =  $request->fechaFinTrabajo;
        $wasteRibbon->horaInicioTrabajo =  $request->horaInicioTrabajo;
        $wasteRibbon->horaFinTrabajo =  $request->horaFinTrabajo;
        $wasteRibbon->peso =  $request->peso;
        $wasteRibbon->observaciones =  $request->observaciones;
        $wasteRibbon->largo =  $request->largo;
        $wasteRibbon->temperatura =  $request->temperatura;
        $wasteRibbon->velocidad =  $request->velocidad;

        $wasteRibbon->save();

        return redirect()->route('wasteRibbon.show', compact('wasteRibbon'));
    }

    public function show(WasteRibbon $wasteRibbon){
        //obtenemos bobina relacionada
        $coil = $wasteRibbon->coils()->get()->first();

        return view('wasteRibbons.show', compact('wasteRibbon', 'coil'));
    }

    public function store(StoreWasteRibbon $request)
    {
        //busca la bobina
        $coil = Coil::find($request->coilId);
        //si el pesoutilizado mas el peso de rollo es menor o igual al peso de la bobina entonces crear el rollo
        if($coil->pesoBruto >= ($request->peso + $coil->pesoUtilizado)){

        $wasteRibbon =  new WasteRibbon();

        $wasteRibbon->nomenclatura =  $request->nomenclatura;
        $wasteRibbon->fechaInicioTrabajo =  $request->fechaInicioTrabajo;
        $wasteRibbon->fechaFinTrabajo =  $request->fechaFinTrabajo;
        $wasteRibbon->horaInicioTrabajo =  $request->horaInicioTrabajo;
        $wasteRibbon->horaFinTrabajo =  $request->horaFinTrabajo;
        $wasteRibbon->peso =  $request->peso;
        $wasteRibbon->observaciones =  $request->observaciones;
        $wasteRibbon->largo =  $request->largo;
        $wasteRibbon->temperatura =  $request->temperatura;
        $wasteRibbon->velocidad =  $request->velocidad;
        $wasteRibbon->status = 'N/A';

        $wasteRibbon->save();
        
        $addProduct = WasteRibbon::find($wasteRibbon->id);
        $addProduct->coils()->attach($request->coilId, ['nomenclatura'=>$wasteRibbon->nomenclatura,
                                     'status'=>"N/A", 
                                     'fAdquisicion'=>$wasteRibbon->fechaInicioTrabajo,
                                     'peso' =>$wasteRibbon->peso]);
        
        //actualiza la bobina
        $coil->pesoUtilizado = $request->peso + $coil->pesoUtilizado;
        if($coil->pesoUtilizado == $coil->pesoBruto)
        $coil->status = 'TERMINADA';                           
        $coil->save();
        
        return redirect()->route('ribbon.show', compact('ribbon'));  
        }
        //en caso de que no pase el if regresamos el formulario con los valores y el mensaje de error
        else{
            return redirect()->back()->withInput($request->all())->withErrors('El peso de la merma sobrepasa el limite de peso de la bobina');
        }
    }
}
