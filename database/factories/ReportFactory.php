<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;

class ReportFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(2),
            'project_id' => Project::inRandomOrder()->first()->id, // Seleziona un progetto casuale
        ];
    }
}

