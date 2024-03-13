<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Student::class;
    public function definition(): array
    {
        // Obtén una lista de los IDs de los cursos existentes
        $courseIds = Course::all()->pluck('id')->toArray();
        return [
            'name' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'birth_date' => fake()->date(),
            'phone' => fake()->numerify('6########'),
            'dni' => fake()->unique()->regexify('\d{8}[trwagmyfpdxbnjzsqvhlcke]'),
            'city' => fake()->city(),
            'email' => fake()->unique()->safeEmail(),
            'course_id' => fake()->randomElement($courseIds)
        ];
    }
}
