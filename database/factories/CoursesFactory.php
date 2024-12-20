<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Courses>
 */
class CoursesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Coursename' => fake()->word(),  
            'Coursenumber' => fake()->unique()->numerify('C-###'),  
            'Coursefeculty' => fake()->word(),  
            'faculty_id' => fake()->numberBetween(0,3)
        ];
    }
}
