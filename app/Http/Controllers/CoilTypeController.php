<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoilType;
use App\Models\BagMeasure;
use App\Http\Requests\StoreCoilType;

class CoilTypeController extends Controller
{
    public function index()
    {
        $coilTypes = CoilType::paginate(10);
        
        return view('coilTypes.index', compact('coilTypes'));
    }

    public function create()
    {
        return view('coilTypes.create');
    }
    
    public function store(Request $request)
    {
        if($request->has('coilTypeForm'))
        {
            $coilType = new CoilType();

            $coilType->alias         =  $request->alias;
            $coilType->anchoCm       =  $request->anchoCm;
            $coilType->largoM        =  $request->largoM;
            $coilType->densidad      =  $request->densidad;
            $coilType->material      =  $request->material;
            $coilType->calibre       =  $request->calibre;
            $coilType->tipo          =  $request->tipo;
            $coilType->observaciones =  $request->observaciones;

            $coilType->save();
        }
        else
        {
            $bagMeasure = new BagMeasure();
            
            $bagMeasure->coil_type_id  =  $request->coil_type_id;
            $bagMeasure->ancho         =  $request->ancho;
            $bagMeasure->largo         =  $request->largo;

            $bagMeasure->save();

            $coilType = $bagMeasure->coilType;
        }
        
        return redirect()->route('coilType.show', $coilType);
    }

    public function show(CoilType $coilType)
    {
        $bagMeasures = $coilType->bagMeasures;

        return view('coilTypes.show', compact('coilType', 'bagMeasures'));
    }

    public function edit(CoilType $coilType)
    {
        return view('coilTypes.edit', compact('coilType'));
    }

    public function update(StoreCoilType $request, $id)//$id de CoilType o BagMeasure
    {
        if($request->has('coilTypeForm'))
        {
            $coilType = CoilType::find($id);

            $coilType->alias         =  $request->alias;
            $coilType->anchoCm       =  $request->anchoCm;
            $coilType->largoM        =  $request->largoM;
            $coilType->densidad      =  $request->densidad;
            $coilType->material      =  $request->material;
            $coilType->calibre       =  $request->calibre;
            $coilType->tipo          =  $request->tipo;
            $coilType->observaciones =  $request->observaciones;

            $coilType->save();
        }
        else
        {
            $bagMeasure = BagMeasure::find($id);
            
            $bagMeasure->coil_type_id  =  $request->coil_type_id;
            $bagMeasure->ancho         =  $request->ancho;
            $bagMeasure->largo         =  $request->largo;

            $bagMeasure->save();

            $coilType = $bagMeasure->coilType;
        }
        
        return redirect()->route('coilType.show', $coilType);
    }

    public function destroy($id)
    {
        $bagMeasure = BagMeasure::find($id);

        $coilType = $bagMeasure->coilType;

        $bagMeasure->delete();

        return redirect()->route('coilType.show', $coilType);
    }
}
