<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        $roles = Role::paginate(10);
        return view('roles.index', compact('roles'));
    }

    public function create(){
        $permisos = Permission::all();
        return view('roles.create', compact('permisos'));
    }

    public function store(Request $request){
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permisos'));
        
        return redirect()->route('rol.index');
    }

    public function edit(Role $rol)
    {
        $permisos = $rol->permissions()->select('id')->get()->makeHidden('pivot');
        $arreglo = [];
        //$permisos =  Permission::all();
        foreach($permisos as $permiso)
        array_push($arreglo, $permiso->id);

        $permisos = Permission::all();

        return view('roles.edit', compact('rol', 'arreglo', 'permisos'));
        
    }

    public function update(Request $request){
        echo $request;
        /*$role = Role::findById($request->id);
        $role->permissions()->sync($request->input('permisos'));
        
        return redirect()->route('rol.show');*/
    }

    public function show(Role $rol)
    {
        $permisos = $rol->permissions()->get();

        return view('roles.show', compact('permisos', 'rol'));
        
    }
}
