<?php

namespace Database\Factories;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     // Especifico el modelo
    protected $model = Course::class;
    public function definition(): array
    {
        return [
            'course' =>fake()->randomElement(['1SMR','2SMR','1AD','2AD','1RAE','2RAE','1ASIR','2ASIR']),
            'grade' =>fake()->randomElement(['Sistemas Microinformáticos y Redes','Administración de Sistemas Informáticos en Red','Realización Audiovisual','Administración y Dirección de Empresas'])
        ];
    }
}
