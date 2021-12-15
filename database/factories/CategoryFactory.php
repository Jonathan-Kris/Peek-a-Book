<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_name' => $this->faker->unique()->randomElement([
                'Manga (Japan)',
                'Manhwa (Korean)',
                'Manhua (Chinese)',
                'Light Novel',
                'Visual Novel',
                'Web Novel'])
        ];
    }
}
