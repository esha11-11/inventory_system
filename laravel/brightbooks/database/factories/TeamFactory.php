<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
             'fullname' =>$this->faker->name,
            'designation' =>$this->faker->jobTitle,
            'telephone' =>$this->faker->phoneNumber,
            'mobile' =>$this->faker->e164PhoneNumber,
            'email' =>$this->faker->unique()->safeEmail,
            'facebook_id' =>$this->faker->unique()->freeEmail,
            'twitter_id' =>$this->faker->unique()->freeEmail,
            'pinterest_id' =>$this->faker->unique()->freeEmail,
            'profile' =>$this->faker->paragraph,
            'team_img' => 'No image found',
            'status' =>$this->faker->randomElement(array('DEACTIVE','ACTIVE')),
            'created_by' => '1',
            'updated_by' => '1',
        ];
    }
}
