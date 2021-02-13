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

    public function store(Request $request)
    {
        $wasteBags = new WasteBag();

        $wasteBags->fInicioTrabajo = $request->fInicioTrabajo;
        $wasteBags->fFinTrabajo    = $request->fFinTrabajo;
        $wasteBags->peso           = $request->peso;
        $wasteBags->largo          = $request->largo;
        $wasteBags->temperatura    = $request->temperatura;  
        $wasteBags->velocidad      = $request->velocidad;
        $wasteBags->observaciones  = $request->observaciones;
        $wasteBags->status         = $request->status;
        $wasteBags->tipoUnidad     = $request->tipoUnidad;
        $wasteBags->cantidad       = $request->cantidad;

        $wasteBags->save();

        return redirect()->route('wasteBags.show', $wasteBags);
    }

    public function show(WasteBag $wasteBag)
    {
        return view('wasteBags.show', compact('wasteBag'));
    }

    public function edit(WasteBag $wasteBag)
    {
        return view('wasteBags.edit', compact('wasteBag'));
    }

    public function update(Request $request, WasteBag $wasteBag)
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

        return redirect()->route('wasteBag.show', $wasteBag);
    }

    public function delete()
    {

    }
}
