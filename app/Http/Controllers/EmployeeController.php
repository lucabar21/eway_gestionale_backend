<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    // Lista di tutti i dipendenti
    public function index()
    {
        $employees = Employee::with('projects')->get(); // Include i progetti
        return response()->json($employees, 200);
    }

    // Visualizza un singolo dipendente
    public function show(Employee $employee)
    {
        $employee->load('projects'); // Carica i progetti associati
        return response()->json($employee, 200);
    }
    // Crea un nuovo dipendente
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:dipendenti,email',
            'specialization' => 'required|string|max:255',
        ]);

        $employee = Employee::create($validated);
        return response()->json($employee, 201);
    }

    // Aggiorna un dipendente esistente
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:dipendenti,email',
            'specialization' => 'required|string|max:255',
        ]);

        $employee->update($validated);
        return response()->json($employee, 200);
    }

    // Elimina un dipendente
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(['message' => 'Dipendente eliminato correttamente'], 200);
    }
}
