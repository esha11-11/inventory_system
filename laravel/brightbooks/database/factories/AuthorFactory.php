<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class AuthorFactory extends Factory
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
          'designation' => $this->faker->jobTitle,
          'dob' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
          'country' => $this->faker->country,
          'email' => $this->faker->safeEmail,
          'phone' => $this->faker->phoneNumber,
          'description' => $this->faker->text($maxNbChars = 400),
          'author_feature' => $this->faker->randomElement(['yes', 'no']),
          'facebook_id' => $this->faker->Email(),
          'twitter_id' => $this->faker->safeEmail,
          'pinterest_id' => $this->faker->safeEmail,
          'youtube_id' => $this->faker->safeEmail,
          'author_img' => 'No image found',
          'status' => $this->faker->randomElement(['DEACTIVE', 'ACTIVE']),
          'created_by' => '1',
          'updated_by' => '1',
        ];
    }
}
