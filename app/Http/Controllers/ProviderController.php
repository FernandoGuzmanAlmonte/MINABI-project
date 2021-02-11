<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::paginate(10);
        
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

        return redirect()->route('provider.show', $provider);
    }

    public function show(Provider $provider)
    {
        return view('providers.show', compact('provider'));
    }

    public function edit(Provider $provider)
    {
        return view('providers.edit', compact('provider'));
    }

    public function update(Request $request, Provider $provider)
    {
        $provider->nombreEmpresa =  $request->nombreEmpresa;
        $provider->paginaWeb     =  $request->paginaWeb;
        $provider->direccion     =  $request->direccion;
        $provider->estado        =  $request->estado;

        $provider->save();

        return redirect()->route('provider.show', $provider);
    }

    public function delete()
    {

    }
}
