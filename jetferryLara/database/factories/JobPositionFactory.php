<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobPosition>
 */
class JobPositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            "title"=>fake()->jobTitle(),
            "salary"=>fake()->numberBetween(1000,5000)."$",
            "employer_id"=>Employer::factory()
        ];
    }
}
