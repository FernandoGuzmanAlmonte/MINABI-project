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
        return view('wasteBags.show', compact('wasteBag'));
    }

    public function edit(WasteBag $wasteBag)
    {
        return view('wasteBags.edit', compact('wasteBag'));
    }

    public function update(Request $request, WasteBag $wasteBags)
    {
        $wasteBags->fInicioTrabajo = $request->fInicioTrabajo;
        $wasteBags->fFinTrabajo    = $request->fFinTrabajo;
        $wasteBags->peso           = $request->peso;
        $wasteBags->largo          = $request->largo;
        $wasteBags->temperatura    = $request->temperatura;  
        $wasteBags->velocidad      = $request->velocidad;
        $wasteBags->status         = $request->status;
        $wasteBags->tipoUnidad     = $request->tipoUnidad;
        $wasteBags->cantidad       = $request->cantidad;
        $wasteBags->observaciones  = $request->observaciones;

        $wasteBags->save();

        return redirect()->route('wasteBag.show', $wasteBags);
    }

    public function delete()
    {

    }
}
