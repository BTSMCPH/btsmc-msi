<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacancy>
 */
class VacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vacancy_banner_image' => $this->faker->imageUrl,
            'vacancy_banner_title' => $this->faker->title,
            'vacancy_banner_subtitle' => $this->faker->paragraph
        ];
    }
}
