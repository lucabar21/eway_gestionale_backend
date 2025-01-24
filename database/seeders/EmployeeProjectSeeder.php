<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Database\Seeder;

class EmployeeProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ottieni tutti i dipendenti
        $employees = Employee::all();

        // Ottieni tutti i progetti
        $projects = Project::all();

        // Associa ogni dipendente a più progetti casuali (ad esempio, 2 progetti)
        foreach ($employees as $employee) {
            // Seleziona 2 progetti casuali per ogni dipendente
            $randomProjects = $projects->random(3); // Puoi cambiare il numero per più o meno progetti

            foreach ($randomProjects as $project) {
                // Associa il dipendente a ciascun progetto
                $employee->projects()->attach($project->id);
            }
        }
    }
}
