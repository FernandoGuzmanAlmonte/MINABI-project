<?php

namespace App\Http\Controllers;

use App\Models\WasteRibbon;
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
        return view('wasteRibbons.create', ['coilId' => $request->coil]);
    }

    public function edit(WasteRibbon $wasteRibbon){
         return view('wasteRibbons.edit', compact('wasteRibbon'));
    }

    public function update(Request $request, WasteRibbon $wasteRibbon){
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

    public function store(Request $request)
    {

        $request->validate([
            'nomenclatura' => 'required'
        ]);

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
        
        return redirect()->route('wasteRibbon.show', compact('wasteRibbon'));
    }
}
