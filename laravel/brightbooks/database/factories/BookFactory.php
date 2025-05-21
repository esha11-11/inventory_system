<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class BookFactory extends Factory
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
            'category_id' => $this->faker->numberBetween($min = 1, $max = 50),
            'author_id' => $this->faker->numberBetween($min = 1, $max = 50),
            'title' => $title,
            'slug' => Str::slug($title),
            'availability' => $this->faker->randomElement(['Stock', 'out of Stock']),
            'price' => $this->faker->numberBetween($min = 1000, $max = 10000),
            'rating' => 'rating',
            'publisher' => $this->faker->company,
            'country_of_publisher' => $this->faker->country,
            'isbn' => $this->faker->isbn13,
            'isbn-10' => $this->faker->isbn10,
            'audience' => $this->faker->randomElement(['General','Audult', 'Kids']),
            'format' => $this->faker->randomElement(['ePUB','eBook', 'PDF', 'DOC']),
            'language' => $this->faker->languageCode,
            'description' => $this->faker->text($maxNbChars = 500),
            'total_pages' => $this->faker->numberBetween($min = 100, $max = 1000),
            'downloaded' => $this->faker->numberBetween($min = 1, $max = 1000),
            'edition_number' => $this->faker->randomElement(['1st Edition','2nd Edition', '3rd Edition']),
            'recommended' => $this->faker->boolean,
            'book_upload' => 'No pdf found',
            'book_img' => 'No image found',
            'status' => $this->faker->randomElement(['DEACTIVE','ACTIVE', 'UPCOMING']),
            'created_by' => '1',
            'updated_by' => '1',
            
        ];
    }
}
