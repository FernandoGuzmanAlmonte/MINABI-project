<?php

namespace App\Http\Controllers;

use App\Models\WasteBag;
use App\Models\Ribbon;
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
        $nomenclatura = 'MER-' . $ribbon->nomenclatura . '-' . ($ribbon->wasteBags()->count()+1);
        return view('wasteBags.create', ['ribbonId' => $request->ribbon, 'nomenclatura' => $nomenclatura]);
    }

    public function store(Request $request)
    {
        //busca la bobina
        $ribbon = Ribbon::find($request->ribbonId);
        //si el pesoutilizado mas el peso de rollo es menor o igual al peso de la bobina entonces crear el rollo
        if($ribbon->peso >= ($request->peso + $ribbon->pesoUtilizado)){
        $wasteBags = new WasteBag();

        $wasteBags->fechaInicioTrabajo = $request->fechaInicioTrabajo;
        $wasteBags->fechaFinTrabajo    = $request->fechaFinTrabajo;
        $wasteBags->peso           = $request->peso;
        $wasteBags->largo          = $request->largo;
        $wasteBags->temperatura    = $request->temperatura;  
        $wasteBags->velocidad      = $request->velocidad;
        $wasteBags->observaciones  = $request->observaciones;
        $wasteBags->status         = $request->status;
        $wasteBags->tipoUnidad     = $request->tipoUnidad;
        $wasteBags->cantidad       = $request->cantidad;
        $wasteBags->nomenclatura   = $request->nomenclatura;


        $wasteBags->save();

        $addProduct = WasteBag::find($wasteBags->id);
        $addProduct->ribbons()->attach($request->ribbonId, ['nomenclatura'=>$wasteBags->nomenclatura,
                                     'status'=>'N/A', 
                                     'fAdquisicion'=>$wasteBags->fechaInicioTrabajo]);

        $ribbon->pesoUtilizado = $request->peso + $ribbon->pesoUtilizado;
        if($ribbon->pesoUtilizado == $ribbon->peso)
        $ribbon->status = 'TERMINADA';                           
        $ribbon->save();
                                    
        return redirect()->route('ribbon.show', compact('ribbon'));  
        }
        //en caso de que no pase el if regresamos el formulario con los valores y el mensaje de error
        else{
            return redirect()->back()->withInput($request->all())->withErrors('El peso del hueso sobrepasa el limite de peso del rollo');
        }
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
        return view('wasteBags.edit', compact('wasteBag'));
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

        return redirect()->route('wasteBag.show', $wasteBag);
    }

    public function delete()
    {

    }
}
