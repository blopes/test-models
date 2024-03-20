<?php

namespace Blopes\SharedModels\Database\Factories;

use Blopes\SharedModels\Models\ProjectDetails;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Blopes\SharedModels\Models\ProjectDetails>
 */
class ProjectDetailsFactory extends Factory
{
    protected $model = ProjectDetails::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->sentence(3),
            'address' => $this->faker->address(),
            'budget' => $this->faker->numberBetween(50000, 50000000),
        ];
    }
}
