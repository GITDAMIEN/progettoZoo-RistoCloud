<?php

namespace Database\Factories;

use App\Models\Animal;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    protected $model = Animal::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'description' => fake()->name(),
            'image' => fake()->name(),
            'category_id' => fake()->randomNumber(),
            'age' => fake()->randomNumber(),
        ];
    }
}
