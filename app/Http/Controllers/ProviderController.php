<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Contact;
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
        if($request->has('providerForm'))
        {
            $provider = new Provider();

            $provider->nombreEmpresa =  $request->nombreEmpresa;
            $provider->paginaWeb     =  $request->paginaWeb;
            $provider->direccion     =  $request->direccion;
            $provider->estado        =  $request->estado;

            $provider->save();
        }
        else
        {
            $contact = new Contact();
            
            $contact->provider_id       =  $request->provider_id;
            $contact->telefono          =  $request->telefono;
            $contact->nombre            =  $request->nombre;
            $contact->correoElectronico =  $request->correoElectronico;
            $contact->apellidos         =  $request->apellidos;

            $contact->save();

            $provider = $contact->provider;
        }
        
        return redirect()->route('provider.show', $provider);
    }

    public function show(Provider $provider)
    {
        $contacts = $provider->contacts;

        return view('providers.show', compact('provider', 'contacts'));
    }

    public function edit(Provider $provider)//Provider $provider
    {
        //if($request->has('providerForm'))
        //{
            return view('providers.edit', compact('provider'));
        //}
        //else
        //{
        //    $contact = Contact::find($provider);
        //    $ribbons =  Coil::find(1);
        //    return view('contacts.edit', compact('$contact'));
        //}
    }

    public function update(Request $request, Provider $provider)
    {
        return $request;
        
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
