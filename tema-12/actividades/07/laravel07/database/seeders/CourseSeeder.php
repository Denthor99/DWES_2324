<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Añadimos varios cursos
        DB::table('courses')->insert([
            [
                'course' => '1DAW',
                'grade' => 'Desarrollo de Aplicaciones Web',
            ],
            [
                'course' => '2DAW',
                'grade' => 'Desarrollo de Aplicaciones Web',
            ],
            [
                'course' => '1DAM',
                'grade' => 'Desarrollo de Aplicaciones Multiplataformas',
            ],
            [
                'course' => '2DAM',
                'grade' => 'Desarrollo de Aplicaciones Multiplataformas',
            ],
        ]);
    }
}
