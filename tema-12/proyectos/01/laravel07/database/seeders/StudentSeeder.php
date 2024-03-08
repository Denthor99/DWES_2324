<?php

namespace Database\Seeders;

use App\models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('students')->insert([
        //     [
        //         'name' => 'Daniel Alfonso',
        //         'lastname' => 'Rodríguez Santos',
        //         'birth_date' => '1999/08/27',
        //         'phone' => '697667252',
        //         'dni' => '32899601x',
        //         'city' => 'Arcos',
        //         'email'=> 'darancuga@hotmail.com',
        //         'curso_id' => 2
        //     ]
        // ]);

        $student = Student::factory()->count(100)->create();
    }
}
