<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
            'student_name' => fake()->name(),
            'student_lastname' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => '0898882404',
            'country' => 'Bulgaria',
            'city' => 'Sofia',
            'language' => 'Bulgarian',
            'languageScore' => '1',
            'repository' => 'github.com/whatever',
            'information' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."
        ];
    }
}
