<?php

namespace App\Http\Controllers;

use App\Models\WasteBag;
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
        return view('wasteBags.create', ['ribbonId' => $request->ribbon]);
    }

    public function store(Request $request)
    {
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
                                     'status'=>$wasteBags->status, 
                                     'fAdquisicion'=>$wasteBags->fechaInicioTrabajo]);

        return redirect()->route('wasteBag.show', $wasteBags);
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
