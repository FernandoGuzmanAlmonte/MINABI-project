<?php

namespace App\Http\Controllers;

use App\Models\CoilProduct;
use App\Models\WasteBag;
use App\Models\Ribbon;
use App\Models\Employee;
use Illuminate\Http\Request;

class WasteBagController extends Controller
{
    public function index()
    {
        $wasteBags = WasteBag::paginate(10);
        
        return view('wasteBags.index', compact('wasteBags'));
    }

    public function create()
    {
        return view('wasteBags.create');
    }

    public function createProduct(Request $request){
        $ribbon = Ribbon::find($request->ribbon);
        $employees = Employee::all();

        $nomenclatura = 'MER-' . $ribbon->nomenclatura . '-' . ($ribbon->wasteBags()->count()+1);
        return view('wasteBags.create', ['ribbonId' => $request->ribbon, 'nomenclatura' => $nomenclatura, 'employees' => $employees]);
    }

    public function store(Request $request)
    {
        //busca la bobina
        $ribbon = Ribbon::find($request->ribbonId);
        //si el pesoutilizado mas el peso de rollo es menor o igual al peso de la bobina entonces crear el rollo
        //if($ribbon->peso >= ($request->peso + $ribbon->pesoUtilizado)){
        $wasteBag = new WasteBag();

        $wasteBag->fechaInicioTrabajo = $request->fechaInicioTrabajo;
        $wasteBag->fechaFinTrabajo    = $request->fechaFinTrabajo;
        $wasteBag->peso           = $request->peso;
        $wasteBag->largo          = $request->largo;
        $wasteBag->temperatura    = $request->temperatura;  
        $wasteBag->velocidad      = $request->velocidad;
        $wasteBag->observaciones  = $request->observaciones;
        $wasteBag->status         = $request->status;
        $wasteBag->tipoUnidad     = $request->tipoUnidad;
        $wasteBag->cantidad       = $request->cantidad;
        $wasteBag->nomenclatura   = $request->nomenclatura;

        $wasteBag->save();

        //request->input('empleados') tiene los id's de los empleados, verificamos si
        //hay empleados antes de agregar
        $empleados = $request->input('empleados');
        if($empleados[0] != null) $wasteBag->employees()->attach($empleados);   

        $addProduct = WasteBag::find($wasteBag->id);
        $addProduct->ribbons()->attach($request->ribbonId, ['nomenclatura'=>$wasteBag->nomenclatura,
                                     'status'=>'N/A', 
                                     'fAdquisicion'=>$wasteBag->fechaInicioTrabajo,
                                     'peso'=>$wasteBag->peso]);

        $ribbon->pesoUtilizado = $request->peso + $ribbon->pesoUtilizado;
       /* if($ribbon->pesoUtilizado == $ribbon->peso){
            $ribbon->status = 'TERMINADA';   
            $coilProduct = CoilProduct::where('coil_product_id','=', $ribbon->id)->first();
            $coilProduct->status = 'TERMINADA';
            $coilProduct->save();  
         }              */        
        $ribbon->save();
                                    
        return redirect()->route('wasteBag.show', compact('wasteBag'));  
        /*}
        //en caso de que no pase el if regresamos el formulario con los valores y el mensaje de error
        else{
            return redirect()->back()->withInput($request->all())->withErrors('El peso del hueso sobrepasa el limite de peso del rollo');
        }*/
    }

    public function show(WasteBag $wasteBag)
    {
        //obtenemos rollo relacionado
        $ribbon = $wasteBag->ribbons()->get()->first();
        //obtenemos la bobina relacionada
        $coil = $ribbon->coils()->get()->first();

        return view('wasteBags.show', compact('wasteBag', 'ribbon', 'coil'));
    }

    public function edit(WasteBag $wasteBag)
    {
        $employees = Employee::all(); 

        return view('wasteBags.edit', compact('wasteBag', 'employees'));
    }

    public function update(Request $request, WasteBag $wasteBag)
    {
        $wasteBag->fechaInicioTrabajo = $request->fechaInicioTrabajo;
        $wasteBag->fechaFinTrabajo    = $request->fechaFinTrabajo;
        $wasteBag->peso           = $request->peso;
        $wasteBag->largo          = $request->largo;
        $wasteBag->temperatura    = $request->temperatura;  
        $wasteBag->velocidad      = $request->velocidad;
        $wasteBag->status         = $request->status;
        $wasteBag->tipoUnidad     = $request->tipoUnidad;
        $wasteBag->cantidad       = $request->cantidad;
        $wasteBag->observaciones  = $request->observaciones;
        $wasteBag->nomenclatura  = $request->nomenclatura;

        $wasteBag->save();

        //request->input('empleados') tiene los id's de los empleados
        $wasteBag->employees()->sync($request->input('empleados')); 

        return redirect()->route('wasteBag.show', $wasteBag);
    }

    public function delete()
    {

    }
}
