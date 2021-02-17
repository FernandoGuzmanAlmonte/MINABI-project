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

    public function edit(Provider $provider)
    {
        return view('providers.edit', compact('provider'));
    }

    public function update(Request $request, $id)//$id de Provider o Contact
    {
        if($request->has('providerForm'))
        {
            $provider = Provider::find($id);

            $provider->nombreEmpresa =  $request->nombreEmpresa;
            $provider->paginaWeb     =  $request->paginaWeb;
            $provider->direccion     =  $request->direccion;
            $provider->estado        =  $request->estado;

            $provider->save();
        }
        else
        {
            $contact = Contact::find($id);
            
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

    public function destroy($id)
    {
        $contact = Contact::find($id);

        $provider = $contact->provider;

        $contact->delete();

        return redirect()->route('provider.show', $provider);
    }
}
