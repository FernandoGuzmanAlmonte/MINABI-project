<?php

namespace App\Http\Controllers;

use App\Models\Bag;
use App\Models\Ribbon;
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
        return view('bags.create', ['ribbonId' => $request->ribbon]);
    }

    public function store(Request $request)
    {
        $bag = new Bag();

        $bag->fechaInicioTrabajo = $request->fechaInicioTrabajo;
        $bag->fechaFinTrabajo    = $request->fechaFinTrabajo;
        $bag->horaInicioTrabajo  = $request->horaInicioTrabajo;
        $bag->horaFinTrabajo     = $request->horaFinTrabajo;
        $bag->nomenclatura       = $request->nomenclatura;  
        $bag->clienteStock       = $request->clienteStock;
        $bag->tipo               = $request->tipo;
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

        $addProduct = Bag::find($bag->id);
        $addProduct->ribbons()->attach($request->ribbonId, ['nomenclatura'=>$bag->nomenclatura,
                                     'status'=>$bag->status, 
                                     'fAdquisicion'=>$bag->fechaInicioTrabajo]);

        return redirect()->route('bag.show', $bag);
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
        return view('bags.edit', compact('bag'));
    }

    public function update(Request $request, Bag $bag)
    {
        $bag->fechaInicioTrabajo = $request->fechaInicioTrabajo;
        $bag->fechaFinTrabajo    = $request->fechaFinTrabajo;
        $bag->horaInicioTrabajo  = $request->horaInicioTrabajo;
        $bag->horaFinTrabajo     = $request->horaFinTrabajo;
        $bag->nomenclatura       = $request->nomenclatura;  
        $bag->clienteStock       = $request->clienteStock;
        $bag->tipo               = $request->tipo;
        $bag->tipoUnidad         = $request->tipoUnidad;
        $bag->pestania           = $request->pestania;
        $bag->cantidad           = $request->cantidad;
        $bag->medida             = $request->medida;
        $bag->status             = $request->status;
        $bag->temperatura        = $request->temperatura;
        $bag->velocidad          = $request->velocidad;
        $bag->observaciones      = $request->observaciones;
              
        $bag->save();

        return redirect()->route('bag.show', $bag);
    }

    public function delete()
    {

    }
}
