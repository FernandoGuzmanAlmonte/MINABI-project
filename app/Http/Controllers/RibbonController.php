<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRibbon;
use App\Models\Coil;
use App\Models\Ribbon;
use App\Models\Employee;
use App\Models\WhiteRibbon;
use DateTime;
use Illuminate\Http\Request;

class RibbonController extends Controller
{

    public function index(){
        $ribbons = Ribbon::select('nomenclatura', 'fechaInicioTrabajo',  'status' )->get();
        $ribbons = Ribbon::paginate(10);

        return view('ribbons.index', compact('ribbons'));
    }

    /*public function create(){

    }*/
    
    //funcion para crear relaciones con bobina
    public function createProduct(Request $request){
        $employees = Employee::all();
        //$nomenclatura = Coil::select('nomenclatura')->where('id', 1)->get()->first()->nomenclatura;
        $coil = Coil::find($request->coil);
        $nomenclatura = ($coil->nomenclatura) . '-' . ($coil->ribbons()->count()+1);
        $cintaBlancas = WhiteRibbon::where('status', '=', 'DISPONIBLE')->get();
        return view('ribbons.create', ['coilId' => $request->coil, 'nomenclatura' => $nomenclatura, 'employees' => $employees, 'cintaBlancas' => $cintaBlancas]);
    }

    public function edit(Ribbon $ribbon){
        $employees = Employee::all(); 
        $cintaBlancas = WhiteRibbon::where('status', '=', 'DISPONIBLE')->get();
        return view('ribbons.edit', compact('ribbon', 'employees', 'cintaBlancas'));
    }

    public function update(StoreRibbon $request, Ribbon $ribbon){
        $ribbon->nomenclatura =  $request->nomenclatura;
        $ribbon->status =  $request->status;
        $ribbon->fechaInicioTrabajo =  $request->fechaInicioTrabajo;
        $ribbon->horaInicioTrabajo =  $request->horaInicioTrabajo;
        $ribbon->largo =  $request->largo;
        $ribbon->fechaFinTrabajo =  $request->fechaFinTrabajo;
        $ribbon->horaFinTrabajo =  $request->horaFinTrabajo;
        $ribbon->peso =  $request->peso;
        $ribbon->pesoUtilizado =  $request->pesoUtilizado;
        $ribbon->temperatura =  $request->temperatura;
        $ribbon->velocidad = $request->velocidad;
        $ribbon->observaciones = $request->observaciones;

        $ribbon->save();

        //request->input('empleados') tiene los id's de los empleados
        $ribbon->employees()->sync($request->input('empleados')); 

        return redirect()->route('ribbon.show', compact('ribbon'));
    }

    public function show(Ribbon $ribbon){
        //obtenemos la bobina relacionada al rollo
        $coil = $ribbon->coils()->get()->first();
        //obtenemos todas las bolsas relacionadas al rollo
        $bags =  Ribbon::find($ribbon->id);
        $bags = $bags->related()->get();
        $bag = $bags;
        $tiempo1 = new DateTime($ribbon->fechaInicioTrabajo . 'T' . $ribbon->horaInicioTrabajo);
        $tiempo2 = new DateTime($ribbon->fechaFinTrabajo . 'T' . $ribbon->horaFinTrabajo);
        $tiempod = $tiempo1->diff($tiempo2);
        $minutosLaborados = $tiempod->h * 60 + $tiempod->i;

        //mandamos cintilla en caso de que haya
        $cinta =  $ribbon->whiteRibbons()->get();

        return view('ribbons.show', compact('ribbon', 'bag', 'coil', 'cinta', 'minutosLaborados' ));
    }
   

    public function store(StoreRibbon $request)
    {
        //busca la bobina
        $coil = Coil::find($request->coilId);
        //si el pesoutilizado mas el peso de rollo es menor o igual al peso de la bobina entonces crear el rollo
        //if($coil->pesoBruto >= ($request->peso + $coil->pesoUtilizado)){
          
        $ribbon =  new ribbon();

        $ribbon->nomenclatura =  $request->nomenclatura;
        $ribbon->status =  $request->status;
        $ribbon->fechaInicioTrabajo =  $request->fechaInicioTrabajo;
        $ribbon->horaInicioTrabajo =  $request->horaInicioTrabajo;
        $ribbon->largo =  $request->largo;
        $ribbon->fechaFinTrabajo =  $request->fechaFinTrabajo;
        $ribbon->horaFinTrabajo =  $request->horaFinTrabajo;
        $ribbon->peso =  $request->peso;
        $ribbon->pesoUtilizado =  $request->pesoUtilizado;
        $ribbon->temperatura =  $request->temperatura;
        $ribbon->velocidad = $request->velocidad;
        //$ribbon->white_ribbon_id = $request->white_ribbon_id;
        $ribbon->observaciones = $request->observaciones;
        
        $ribbon->save();

        //si agregaron un rollo se crea relación
        foreach ($request->input('white_ribbon_ids', []) as $i => $white_ribbon_id){
            if($white_ribbon_id != 'N/A' )
                 $ribbon->whiteRibbons()->attach($white_ribbon_id,['nomenclatura'=>$ribbon->nomenclatura,
                                                                    'status'=>$ribbon->status, 
                                                                    'fAdquisicion'=>$ribbon->fechaInicioTrabajo,
                                                                    'peso' => 0,
                                                                    'largo' => $request->input('largos.'. $i)]);
                                                            
        }
        
        //request->input('empleados') tiene los id's de los empleados
        $ribbon->employees()->attach($request->input('empleados'));        

        $addProduct = Ribbon::find($ribbon->id);
        $addProduct->coils()->attach($request->coilId, ['nomenclatura'=>$ribbon->nomenclatura,
                                     'status'=>$ribbon->status, 
                                     'fAdquisicion'=>$ribbon->fechaInicioTrabajo,
                                     'peso' => $ribbon->peso]);
        
        //actualiza la bobina
        $coil->pesoUtilizado = $request->peso + $coil->pesoUtilizado;
        /*if($coil->pesoUtilizado == $coil->pesoBruto){
            $coil->status = 'TERMINADA';                       
            $coil->pesoNeto = $coil->related()
                                    ->where('coil_product_type', '=', 'App\Models\Ribbon')
                                    ->orWhere('coil_product_type', '=', 'App\Models\WasteRibbon')
                                    ->sum('peso');
        }*/
        $coil->save();
        
        return redirect()->route('ribbon.show', compact('ribbon')); 
   /* }
        //en caso de que no pase el if regresamos el formulario con los valores y el mensaje de error
        else{
            return redirect()->back()->withInput($request->all())->withErrors('El peso del rollo sobrepasa el limite de peso de la bobina');
        }*/

    }
}
