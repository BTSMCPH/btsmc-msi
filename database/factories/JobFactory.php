<?php

namespace Database\Factories;

use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_title' => $this->faker->jobTitle,
            'job_type' => $this->faker->word,
            'location' => $this->faker->city,
            'schedule' => $this->faker->word,
            'job_requirements' => $this->faker->paragraph,
            'job_description' => $this->faker->paragraph,
        ];
    }
}
