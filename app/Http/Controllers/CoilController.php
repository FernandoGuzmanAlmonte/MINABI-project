<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCoil;
use App\Models\Coil;
use App\Models\Provider;
use App\Models\CoilType;
use App\Models\RibbonProduct;
use App\Models\WhiteRibbonProduct;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use DateTime;

class CoilController extends Controller
{
    public function index(){
        $coils = Coil::select('nomenclatura', 'fArribo',  'status' , 'coil_type_id')->get();
        $coils = Coil::paginate(10);

        return view('coils.index', compact('coils'));
    }

    public function create(){
        $providers = Provider::all();
        $coilTypes = CoilType::select('id','alias')->where('tipo','=','CELOFAN')->get();
        
        return view('coils.create', compact('providers', 'coilTypes'));
    }

    public function createFromProvider(Provider $provider){
        return view('coils.create', compact('provider'));
    }
    
    public function edit(Coil $coil){
        $providers = Provider::all();
        $coilTypes = CoilType::select('id','alias')->where('tipo','=','CELOFAN')->get();

        return view('coils.edit', compact('coil', 'providers', 'coilTypes'));
    }

    public function update(StoreCoil $request, Coil $coil){
        $coil->provider_id = $request->provider_id;
        $coil->coil_type_id = $request->coil_type_id;

        $coil->nomenclatura =  $request->nomenclatura;
        $coil->status =  $request->status;
        $coil->fArribo =  $request->fArribo;
        $coil->pesoBruto =  $request->pesoBruto;
        $coil->pesoNeto =  $request->pesoNeto;
        $coil->observaciones =  $request->observaciones;
        $coil->diametroBobina =  $request->diametroBobina;
        $coil->diametroInterno =  $request->diametroInterno;
        $coil->diametroExterno =  $request->diametroExterno;
        $coil->largoM =  $request->largoM;
        $coil->costo =  $request->costo;
        $coil->pesoUtilizado = $request->pesoUtilizado;

        $coil->save();

        return redirect()->route('coil.show', compact('coil'));
    }

    public function show(Coil $coil){
        $ribbons =  Coil::find($coil->id);
        //Obtenemos todos los rollos relacionados a la bobina
        $ribbons = $ribbons->related()->get();
        //obtenemos todos las objetos relacionadas a los rollos
        $ribbonProduct =  new Collection();
        foreach($ribbons as $ribbon ){
            if($ribbon->coil_product_type == 'App\Models\Ribbon')
            $ribbonProduct =  $ribbonProduct->concat(RibbonProduct::where('ribbon_id', '=' , $ribbon->coil_product_id)->get());
        }
        
        return view('coils.show', compact('coil', 'ribbons', 'ribbonProduct'));
    }

    public function store(StoreCoil $request){
        $coil =  new Coil();

        $coil->provider_id = $request->provider_id;
        $coil->coil_type_id = $request->coil_type_id;
        $coil->nomenclatura =  $request->nomenclatura;
        $coil->status =  $request->status;
        $coil->fArribo =  $request->fArribo;
        $coil->pesoBruto =  $request->pesoBruto;
        $coil->pesoNeto =  $request->pesoNeto;
        $coil->observaciones =  $request->observaciones;
        $coil->diametroBobina =  $request->diametroBobina;
        $coil->diametroInterno =  $request->diametroInterno;
        $coil->diametroExterno =  $request->diametroExterno;
        $coil->largoM =  $request->largoM;
        $coil->costo =  $request->costo;
        $coil->pesoUtilizado = $request->pesoUtilizado;

        $coil->save();

        return redirect()->route('coil.show', $coil);
    }  

    public function terminar(Coil $coil){
    $totalMetrosRollos = $coil->ribbons()->sum('largo');
    $pesoNetoBobina =  $coil->pesoBruto - $coil->coilReels()->get()->first()->peso;
    //echo 'Peso neto de la bobina = '. $pesoNetoBobina . '<br>'; 
    $coil->pesoNeto = $pesoNetoBobina;
    $coil->metrosUtilizados = $totalMetrosRollos; 
    foreach ($coil->ribbons()->get() as $ribbon){
        $ribbon->pesoCelofan = 0;
        $ribbon->pesoCinta = 0;
        $ribbon->save();
    }
    foreach ($coil->ribbons()->get() as $ribbon){
       $pesoNetoRollo = $ribbon->related()->where('ribbon_product_type', '=', 'App\Models\Bag')->orWhere('ribbon_product_type', '=', 'App\Models\WasteBag')->sum('peso');
       //obtenemos datos de las bolsas generadas
       $ribbon->pesoNeto = $pesoNetoRollo;
       //obtenemos datos de la cinta relacionada
       foreach($ribbon->whiteRibbons()->get() as $whiteRibbon){
           //echo 'Rollo de cinta blanca relacionada ' . $whiteRibbon->nomenclatura . '<br>';
           $huesoCinta =  $whiteRibbon->related()->where('white_ribbon_product_type', '=', 'App\Models\WhiteRibbonReel')->first();
           //echo 'El hueso de la cinta blanca pesa ' . $huesoCinta->peso. '<br>';
           $pesoNetoCinta = ($whiteRibbon->peso - $huesoCinta->peso);
           $whiteRibbon->pesoNeto = $pesoNetoCinta; 
           //echo 'El peso neto de la cinta blanca es ' . $pesoNetoCinta . '<br>';
           $largoCinta =$whiteRibbon->related()->where('white_ribbon_product_type', '=', 'App\Models\Ribbon')->where('white_ribbon_product_id', '=', $ribbon->id)->get();
           //echo 'Largo de la cinta utilizado ' . $largoCinta;
           $pesoXMetroCinta = ( $pesoNetoCinta / $largoCinta->first()->largo);
           $whiteRibbon->kiloMetro = round($pesoXMetroCinta,4);
           //echo 'El peso por metro de la cinta blanca es ' . $pesoXMetroCinta . '<br>';
           $pesoCinta = ($pesoXMetroCinta * $largoCinta->first()->largo);
           $ribbon->pesoCinta = $ribbon->pesoCinta + $pesoCinta;
           //echo 'El peso por toda la cinta blanca del rollo es ' . $pesoCinta . '<br>';
           $pesoCelofan = $pesoNetoRollo - $pesoCinta;
           $ribbon->pesoCelofan = $pesoCelofan;
           //echo 'El peso del celofan del rollo es '. $pesoCelofan . '<br>';
           $costoCelofan = ($coil->costo * $pesoCelofan) / $pesoNetoBobina;
           $ribbon->costoCelofan = $costoCelofan;
           //echo 'El costo del celofan es ' . $costoCelofan . '<br>';
           $costoCinta = ($whiteRibbon->costo * $pesoCinta) / $pesoNetoCinta;
           $ribbon->costoCinta = $ribbon->costoCinta + $costoCinta;
           $whiteRibbon->status = 'TERMINADA';
           $whiteRibbon->save();
           //echo 'El costo de la cinta blanca es '. $costoCinta . '<br>';
       }
       $ribbon->status = 'TERMINADA';
       $tiempo1 = new DateTime($ribbon->fechaInicioTrabajo . 'T' . $ribbon->horaInicioTrabajo);
       $tiempo2 = new DateTime($ribbon->fechaFinTrabajo . 'T' . $ribbon->horaFinTrabajo);
       $tiempod = $tiempo1->diff($tiempo2);
       $minutosLaborados = $tiempod->h * 60 + $tiempod->i;
       $costoManoObra = $ribbon->employees->sum('sueldoHora')*$minutosLaborados;
       $ribbon->costoTotal =  round($costoCelofan + $costoCinta + $costoManoObra, 4);
       $ribbon->save();

       $pesoTotalBolsas = $ribbon->related()->where('ribbon_product_type', '=', 'App\Models\Bag')->orWhere('ribbon_product_type', '=', 'App\Models\RibbonWaste')->sum('peso');
       foreach ($ribbon->bags()->get() as $bag){
          
        $bag->costoTotal = (($ribbon->costoTotal/$pesoTotalBolsas) * $bag->peso);
        $bag->save();
       }
       // echo '<br>';
    }
    $coil->status = 'TERMINADA';
    
    $coil->save();
    //echo 'El total de metros de todos los rollos es  = ' . $totalMetrosRollos;
    return redirect()->route('coil.show', $coil);
    }
}
