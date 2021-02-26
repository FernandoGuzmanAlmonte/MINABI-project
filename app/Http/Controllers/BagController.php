<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBag;
use App\Models\Bag;
use App\Models\Ribbon;
use App\Models\Employee;
use Illuminate\Http\Request;

class BagController extends Controller
{
    public function index()
    {
        $bags = Bag::paginate(10);
        
        return view('bags.index', compact('bags'));
    }

    public function create()
    {
        return view('bags.create');
    }

    public function createProduct(Request $request){   
        $ribbon = Ribbon::find($request->ribbon);
        $employees = Employee::all();

        $nomenclatura = $ribbon->nomenclatura . '-' . ($ribbon->bags()->count()+1);
        return view('bags.create', ['ribbonId' => $request->ribbon, 'nomenclatura' => $nomenclatura, 'employees' => $employees]);
    }

    public function store(StoreBag $request)
    {
        $ribbon = Ribbon::find($request->ribbonId);
        //si el pesoutilizado mas el peso de rollo es menor o igual al peso de la bobina entonces crear el rollo
        if($ribbon->peso >= ($request->peso + $ribbon->pesoUtilizado)){
        $bag = new Bag();

        $bag->fechaInicioTrabajo = $request->fechaInicioTrabajo;
        $bag->fechaFinTrabajo    = $request->fechaFinTrabajo;
        $bag->horaInicioTrabajo  = $request->horaInicioTrabajo;
        $bag->horaFinTrabajo     = $request->horaFinTrabajo;
        $bag->nomenclatura       = $request->nomenclatura;  
        $bag->clienteStock       = $request->clienteStock;
        $bag->peso               = $request->peso;
        $bag->tipoUnidad         = $request->tipoUnidad;
        $bag->pestania           = $request->pestania;
        $bag->cantidad           = $request->cantidad;
        $bag->medida             = $request->medida;
        $bag->status             = $request->status;
        $bag->temperatura        = $request->temperatura;
        $bag->velocidad          = $request->velocidad;
        $bag->observaciones      = $request->observaciones;
        
        $bag->save();

        //request->input('empleados') tiene los id's de los empleados
        $bag->employees()->attach($request->input('empleados'));    

        $addProduct = Bag::find($bag->id);
        $addProduct->ribbons()->attach($request->ribbonId, ['nomenclatura'=>$bag->nomenclatura,
                                     'status'=>$bag->status, 
                                     'fAdquisicion'=>$bag->fechaInicioTrabajo]);

         //actualiza la bobina
         $ribbon->pesoUtilizado = $request->peso + $ribbon->pesoUtilizado;
         if($ribbon->pesoUtilizado == $ribbon->peso)
         $ribbon->status = 'TERMINADA';                       
         $ribbon->save();
         
         return redirect()->route('ribbon.show', compact('ribbon'));  
         }
         //en caso de que no pase el if regresamos el formulario con los valores y el mensaje de error
         else{
             return redirect()->back()->withInput($request->all())->withErrors('El peso de la bolsa sobrepasa el limite de peso del rollo');
         }
    }

    public function show(Bag $bag)
    {
        //obtenemos rollo relacionado
        $ribbon = $bag->ribbons()->get()->first();
        //obtenemos la bobina relacionada
        $coil = $ribbon->coils()->get()->first();
        return view('bags.show', compact('bag', 'coil', 'ribbon' ));
    }

    public function edit(Bag $bag)
    {
        $employees = Employee::all(); 

        return view('bags.edit', compact('bag', 'employees'));
    }

    public function update(StoreBag $request, Bag $bag)
    {
        $bag->fechaInicioTrabajo = $request->fechaInicioTrabajo;
        $bag->fechaFinTrabajo    = $request->fechaFinTrabajo;
        $bag->horaInicioTrabajo  = $request->horaInicioTrabajo;
        $bag->horaFinTrabajo     = $request->horaFinTrabajo;
        $bag->nomenclatura       = $request->nomenclatura;  
        $bag->clienteStock       = $request->clienteStock;
        $bag->tipoUnidad         = $request->tipoUnidad;
        $bag->pestania           = $request->pestania;
        $bag->cantidad           = $request->cantidad;
        $bag->medida             = $request->medida;
        $bag->status             = $request->status;
        $bag->temperatura        = $request->temperatura;
        $bag->velocidad          = $request->velocidad;
        $bag->observaciones      = $request->observaciones;
              
        $bag->save();

        //request->input('empleados') tiene los id's de los empleados
        $bag->employees()->sync($request->input('empleados')); 

        return redirect()->route('bag.show', $bag);
    }

    public function delete()
    {

    }
}
