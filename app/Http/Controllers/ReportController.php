<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    // Lista di tutti i report
    public function index()
    {

        return response()->json(Report::with('project')->get(), 200);
    }

    // Visualizza un singolo report
    public function show(Report $report)
    {
        return response()->json($report->load('project'), 200);
    }

    // Crea un nuovo report
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'project_id' => 'required|exists:project,id',
        ]);

        $report = Report::create($validated);
        return response()->json($report->load('project'), 201);
    }

    // Aggiorna un report esistente
    public function update(Request $request, Report $report)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'project_id' => 'required|exists:project,id',
        ]);

        $report->update($validated);
        return response()->json($report->load('project'), 200);
    }

    // Elimina un report
    public function destroy(Report $report)
    {
        $report->delete();
        return response()->json(['message' => 'Report eliminato correttamente.'], 200);
    }
}
