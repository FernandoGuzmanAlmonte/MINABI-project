<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWhiteWaste;
use App\Models\WhiteCoil;
use App\Models\WhiteWaste;
use Illuminate\Http\Request;

class WhiteWasteController extends Controller
{
    public function index(){
        $whiteWastes = WhiteWaste::select('nomenclatura', 'fAlta' )->get();
        $whiteWastes = WhiteWaste::paginate(10);

        return view('whiteWastes.index', compact('whiteWastes'));
    }

    public function create(){
        return view('whiteWastes.create');
    }

    //funcion para crear relaciones con bobina
    public function createProduct(Request $request){
        $coil = WhiteCoil::find($request->whiteCoil);
        $nomenclatura = 'MER-' . $coil->nomenclatura . '-' . ($coil->whiteRibbons()->count()+1);
        return view('whiteWastes.create', ['whiteCoilId' => $request->whiteCoil, 'nomenclatura' => $nomenclatura]);
    }

    public function edit(WhiteWaste $whiteWaste){
         return view('whiteWastes.edit', compact('whiteWaste'));
    }

    public function update(StoreWhiteWaste $request, WhiteWaste $whiteWaste){
        $whiteWaste->nomenclatura =  $request->nomenclatura;
        $whiteWaste->largo =  $request->largo;
        $whiteWaste->peso =  $request->peso;
        $whiteWaste->status =  $request->status;
        $whiteWaste->fAlta =  $request->fAlta;
    
        $whiteWaste->save();

        return redirect()->route('whiteWaste.show', compact('whiteWaste'));
    }

    public function show(WhiteWaste $whiteWaste){
        //obtenemos bobina relacionada
        $whiteCoil = $whiteWaste->whiteCoils()->get()->first();

        return view('whiteWastes.show', compact('whiteWaste', 'whiteCoil'));
    }

    public function store(StoreWhiteWaste $request)
    {
        //busca la bobina
        $whiteCoil = WhiteCoil::find($request->whiteCoilId);
        //si el pesoutilizado mas el peso de rollo es menor o igual al peso de la bobina entonces crear el rollo
        if($whiteCoil->peso >= ($request->peso + $whiteCoil->pesoUtilizado)){
        $whiteWaste =  new WhiteWaste();

        $whiteWaste->nomenclatura =  $request->nomenclatura;
        $whiteWaste->largo =  $request->largo;
        $whiteWaste->peso =  $request->peso;
        $whiteWaste->status =  'N/A';
        $whiteWaste->fAlta =  $request->fAlta;
        $whiteWaste->observaciones = $request->observaciones;

        $whiteWaste->save();
        
        $addProduct = WhiteWaste::find($whiteWaste->id);
        $addProduct->whiteCoils()->attach($request->whiteCoilId, ['nomenclatura'=>$whiteWaste->nomenclatura,
                                     'status'=>"N/A", 
                                     'fAdquisicion'=>$whiteWaste->fAlta,
                                     'peso' =>$whiteWaste->peso]);
        
        //actualiza la bobina
        $whiteCoil->pesoUtilizado = $request->peso + $whiteCoil->pesoUtilizado;
        if($whiteCoil->pesoUtilizado == $whiteCoil->peso)
        $whiteCoil->status = 'TERMINADA';                           
        $whiteCoil->save();
        
        return redirect()->route('whiteWaste.show', compact('whiteWaste'));  
        }
        //en caso de que no pase el if regresamos el formulario con los valores y el mensaje de error
        else{
            return redirect()->back()->withInput($request->all())->withErrors('El peso de la merma sobrepasa el limite de peso de la bobina');
        }
    }
}
