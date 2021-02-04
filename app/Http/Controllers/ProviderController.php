<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::all();
        
        return view('providers.index', compact('providers'));
    }

    public function create()
    {
        return view('providers.create');
    }

    public function store(Request $request)
    {
        $provider = new Provider();

        $provider->nombreEmpresa =  $request->nombreEmpresa;
        $provider->paginaWeb     =  $request->paginaWeb;
        $provider->direccion     =  $request->direccion;
        $provider->estado        =  $request->estado;

        $provider->save();

        return redirect()->route('provider.index');
    }

    public function show()
    {

    }

    public function edit(Provider $provider) //14
    {
        return $provider;
    }

    public function delete()
    {

    }
}
