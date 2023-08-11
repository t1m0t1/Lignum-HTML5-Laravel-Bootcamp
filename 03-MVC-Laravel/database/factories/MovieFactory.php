<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake() -> sentence(4),
            'year'=> fake() -> dateTime(),
            'duration'=> fake()-> randomFloat(2,60,120),
            'synopsis'=> fake()-> paragraph(),
            'imageMovie'=> fake()-> url(),
        ];
    }
}
