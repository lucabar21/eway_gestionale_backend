<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Aggiungi alcuni progetti di esempio
        Project::create([
            'name' => 'Conad',
            'description' => 'Gestionale per i dipendenti interni',
        ]);

        Project::create([
            'name' => 'Vodafone',
            'description' => 'Gestionale per le risorse di impresa',
        ]);
        Project::create([
            'name' => 'Mediaworld',
            'description' => 'Sito Web E-commerce',
        ]);
        Project::create([
            'name' => 'Sky',
            'description' => 'Sito Web Aziendale',
        ]);

    }
}
