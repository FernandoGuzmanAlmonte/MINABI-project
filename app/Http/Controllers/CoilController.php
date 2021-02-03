<?php

namespace App\Http\Controllers;

use App\Models\Coil;
use Illuminate\Http\Request;

class CoilController extends Controller
{
    public function index(){
        return view('coils.index');
    }

    public function create(){
        return view('coils.create');
    }

    public function show(){}

    public function store(Request $request)
    {
        $request->all();
    }
}
