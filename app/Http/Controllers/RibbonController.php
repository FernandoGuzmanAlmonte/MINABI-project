<?php

namespace App\Http\Controllers;

use App\Models\Ribbon;
use Illuminate\Http\Request;

class RibbonController extends Controller
{
    public function index(){
        $ribbons = Ribbon::select('nomenclatura', 'fechaInicioTrabajo',  'status' )->get();
        $ribbons = Ribbon::paginate(10);

        return view('ribbons.index', compact('ribbons'));
    }

    public function create(){
        return view('ribbons.create');
    }
    
    //funcion para crear relaciones con bobina
    public function createProduct(Request $request){
        return view('ribbons.create', ['coilId' => $request->coil]);
    }

    public function edit(Ribbon $ribbon){
        return view('ribbons.edit', compact('ribbon'));
    }

    public function update(Request $request, Ribbon $ribbon){
        $ribbon->nomenclatura =  $request->nomenclatura;
        $ribbon->status =  $request->status;
        $ribbon->fArribo =  $request->fArribo;
        $ribbon->pesoBruto =  $request->pesoBruto;
        $ribbon->pesoNeto =  $request->pesoNeto;
        $ribbon->observaciones =  $request->observaciones;
        $ribbon->diametroBobina =  $request->diametroBobina;
        $ribbon->diametroInterno =  $request->ddiametroInterno;
        $ribbon->diametroExterno =  $request->diametroExterno;
        $ribbon->largoM =  $request->largoM;
        $ribbon->costo =  $request->costo;
        $ribbon->provider_id = $request->provider_id;

        $ribbon->save();

        return redirect()->route('ribbon.show', compact('ribbon'));
    }

    public function show(Ribbon $ribbon){
        //obtenemos la bobina relacionada al rollo
        $coil = $ribbon->coils()->get()->first();
        //obtenemos todas las bolsas relacionadas al rollo
        $bags =  Ribbon::find($ribbon->id);
        $bags = $bags->related()->get();
        return view('ribbons.show', compact('ribbon', 'bags', 'coil'));
    }

    public function store(Request $request)
    {

       $request->validate([
            'nomenclatura' => 'required',
            'status' => 'required'
        ]);

        $ribbon =  new ribbon();

        $ribbon->nomenclatura =  $request->nomenclatura;
        $ribbon->status =  $request->status;
        $ribbon->employee_id =  $request->employee_id;
        $ribbon->fechaInicioTrabajo =  $request->fechaInicioTrabajo;
        $ribbon->horaInicioTrabajo =  $request->horaInicioTrabajo;
        $ribbon->largo =  $request->largo;
        $ribbon->fechaFinTrabajo =  $request->fechaFinTrabajo;
        $ribbon->horaFinTrabajo =  $request->horaFinTrabajo;
        $ribbon->peso =  $request->peso;
        $ribbon->pesoUtilizado =  $request->pesoUtilizado;
        $ribbon->temperatura =  $request->temperatura;
        $ribbon->velocidad = $request->velocidad;
        $ribbon->white_ribbon_id = $request->white_ribbon_id;
        $ribbon->observaciones = $request->observaciones;
        
        $ribbon->save();
        
        $addProduct = Ribbon::find($ribbon->id);
        $addProduct->coils()->attach($request->coilId, ['nomenclatura'=>$ribbon->nomenclatura,
                                     'status'=>$ribbon->status, 
                                     'fAdquisicion'=>$ribbon->fechaInicioTrabajo]);
        
        return redirect()->route('ribbon.show', compact('ribbon'));
    }
}
