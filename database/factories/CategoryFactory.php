<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   $title = $this->faker->sentence();
        return [
            "title" => $title,
            "slug" => Str::slug($title),
            "image" => $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }
}
