<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {       $title = $this->faker->name;
              return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->text($maxNbChars = 400),
            'status' => $this->faker->randomElement(['DEACTIVE', 'ACTIVE']),
            'created_by' => '1',
            'updated_by' => '1',
        ];
    }
}
