<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    // Lista di tutti i progetti
    public function index()
    {
        // Assicurati di usare 'employees', non 'employee'
        $projects = Project::with('employees')->get();
        return response()->json($projects, 200);
    }

    // Visualizza un singolo progetto
    public function show(Project $project)
    {
        return response()->json($project->load('employee'), 200);
    }

    // Crea un nuovo progetto
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'descrption' => 'required|string',
            'employees' => 'required|array|min:1',
            'employees.*' => 'exists:employees,id',
        ]);

        $project = Project::create($request->only(['name', 'description']));
        $project->employees()->attach($validated['employees']);

        return response()->json($project->load('employees'), 201);
    }

    // Aggiorna un progetto esistente
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'descrption' => 'required|string',
            'employees' => 'required|array|min:1',
            'employees.*' => 'exists:employees,id',
        ]);

        $project->update($request->only(['name', 'description']));

        if (isset($validated['employees'])) {
            $project->employees()->sync($validated['employees']);
        }

        return response()->json($project->load('employees'), 200);
    }

    // Elimina un progetto
    public function destroy(Project $project)
    {
        $project->employees()->detach();
        $project->delete();
        return response()->json(['message' => 'Progetto eliminato correttamente.'], 200);
    }
}
