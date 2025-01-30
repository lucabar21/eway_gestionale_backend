<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Report;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        // Ottieni tutti i progetti
        $projects = Project::all();

        // Assicurati di avere progetti nel database
        if ($projects->isEmpty()) {
            $this->command->warn('Nessun progetto trovato. Creane alcuni prima di eseguire questo seeder.');
            return;
        }

        // Genera 50 report con un progetto casuale
        foreach (range(1, 5) as $index) {
            Report::create([
                'title' => fake()->sentence(4),
                'description' => fake()->paragraph(2),
                'project_id' => $projects->random()->id, // Assegna un progetto casuale
            ]);
        }
    }
}
