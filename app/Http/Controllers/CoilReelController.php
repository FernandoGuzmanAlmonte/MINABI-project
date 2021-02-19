<?php

namespace App\Http\Controllers;

use App\Models\CoilReel;
use Illuminate\Http\Request;

class CoilReelController extends Controller
{
    public function index(){
        $coilReels = CoilReel::select('nomenclatura')->get();
        $coilReels = coilReel::paginate(10);

        return view('coilReels.index', compact('coilReels'));
    }

    public function create(){
        return view('coilReels.create');
    }

    //funcion para crear relaciones con bobina
    public function createProduct(Request $request){
        return view('coilReels.create', ['coilId' => $request->coil]);
    }

    public function edit(CoilReel $coilReel){
        return view('coilReels.edit', compact('coilReel'));
    }

    public function update(Request $request, CoilReel $coilReel){
        $coilReel->nomenclatura =  $request->nomenclatura;
        $coilReel->peso =  $request->peso;
        $coilReel->observaciones =  $request->observaciones;
        $coilReel->fechaAlta =  $request->fechaAlta;
        $coilReel->status = $request->status;
       

        $coilReel->save();

        return redirect()->route('coilReel.show', compact('coilReel'));
    }

    public function show(CoilReel $coilReel){
        $coil = $coilReel->coils()->get()->first();
        return view('coilReels.show', compact('coilReel', 'coil'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nomenclatura' => 'required'
        ]);

        $coilReel =  new coilReel();

        $coilReel->nomenclatura =  $request->nomenclatura;
        $coilReel->peso =  $request->peso;
        $coilReel->observaciones =  $request->observaciones;
        $coilReel->fechaAlta =  $request->fechaAlta;
        $coilReel->status = $request->status;

        $coilReel->save();
        
        $addProduct = CoilReel::find($coilReel->id);
        $addProduct->coils()->attach($request->coilId, ['nomenclatura'=>$coilReel->nomenclatura,
                                     'status'=>'N/A', 
                                     'fAdquisicion'=>$coilReel->fechaAlta,
                                     'peso' => $coilReel->peso]);
        
        return redirect()->route('coilReel.show', compact('coilReel'));
    }
}
