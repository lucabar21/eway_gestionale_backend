<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Aggiungi alcuni dipendenti di esempio
        Employee::create([
            'name' => 'Mario',
            'surname' => 'Rossi',
            'email' => 'mario.rossi@example.com',
            'specialization' => 'Software Developer',
        ]);

        Employee::create([
            'name' => 'Luigi',
            'surname' => 'Verdi',
            'email' => 'luigi.verdi@example.com',
            'specialization' => 'Designer',
        ]);
        Employee::create([
            'name' => 'Francesco',
            'surname' => 'Bianchi',
            'email' => 'francesco.bianchi@example.com',
            'specialization' => 'Backend Developer',
        ]);
        Employee::create([
            'name' => 'Giuseppe',
            'surname' => 'Azzurri',
            'email' => 'giuseppe.azzurri@example.com',
            'specialization' => 'Frontend Developer',
        ]);
    }
}
