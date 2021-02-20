<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRibbon;
use App\Models\Coil;
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
        //$nomenclatura = Coil::select('nomenclatura')->where('id', 1)->get()->first()->nomenclatura;
        $coil = Coil::find($request->coil);
        $nomenclatura = $coil->nomenclatura . '-' . $coil->ribbons()->count()+1;
        return view('ribbons.create', ['coilId' => $request->coil, 'nomenclatura' => $nomenclatura  ]);
    }

    public function edit(Ribbon $ribbon){
        return view('ribbons.edit', compact('ribbon'));
    }

    public function update(StoreRibbon $request, Ribbon $ribbon){
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

        return redirect()->route('ribbon.show', compact('ribbon'));
    }

    public function show(Ribbon $ribbon){
        //obtenemos la bobina relacionada al rollo
        $coil = $ribbon->coils()->get()->first();
        //obtenemos todas las bolsas relacionadas al rollo
        $bags =  Ribbon::find($ribbon->id);
        $bags = $bags->related()->get();
        $bag = $bags;
        return view('ribbons.show', compact('ribbon', 'bag', 'coil'));
    }
   

    public function store(StoreRibbon $request)
    {
        //busca la bobina
        $coil = Coil::find($request->coilId);
        //si el pesoutilizado mas el peso de rollo es menor o igual al peso de la bobina entonces crear el rollo
        if($coil->pesoBruto >= ($request->peso + $coil->pesoUtilizado)){
          
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
                                     'fAdquisicion'=>$ribbon->fechaInicioTrabajo,
                                     'peso' => $ribbon->peso]);
        
        //actualiza la bobina
        $coil->pesoUtilizado = $request->peso + $coil->pesoUtilizado;
        if($coil->pesoUtilizado == $coil->pesoBruto)
        $coil->status = 'TERMINADA';                       
        $coil->save();
        
        return redirect()->route('ribbon.show', compact('ribbon'));  
        }
        //en caso de que no pase el if regresamos el formulario con los valores y el mensaje de error
        else{
            return redirect()->back()->withInput($request->all())->withErrors('El peso del rollo sobrepasa el limite de peso de la bobina');
        }

    }
}
