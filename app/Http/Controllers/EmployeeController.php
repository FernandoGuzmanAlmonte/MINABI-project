<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);
        
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }
    
    public function store(Request $request)
    {
        $employee = new Employee();

        $employee->nombre       =   $request->nombre;
        $employee->fNacimiento  =   $request->fNacimiento;
        $employee->fIngreso     =   $request->fIngreso;
        $employee->antiguedad   =   $request->antiguedad;
        $employee->sueldoHora   =   $request->sueldoHora;
        $employee->telefono     =   $request->telefono;
        $employee->status       =   $request->status;
        
        $employee->save();
        
        return redirect()->route('employee.show', $employee);
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $employee->nombre       =   $request->nombre;
        $employee->fNacimiento  =   $request->fNacimiento;
        $employee->fIngreso     =   $request->fIngreso;
        $employee->antiguedad   =   $request->antiguedad;
        $employee->sueldoHora   =   $request->sueldoHora;
        $employee->telefono     =   $request->telefono;
        $employee->status       =   $request->status;

        $employee->save();
        
        return redirect()->route('employee.show', $employee);
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employee.index');
    }
}
