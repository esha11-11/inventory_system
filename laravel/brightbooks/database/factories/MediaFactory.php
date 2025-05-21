<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->name;
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'media_type' => $this->faker->randomElement(['gallery', 'slider']),
            'description' => $this->faker->text($maxNbChars = 400),
            'media_img' => 'No image found',
            'status' => $this->faker->randomElement(['DEACTIVE', 'ACTIVE']),
            'created_by' => '1',
            'updated_by' => '1',
            
        ];
    }
}
