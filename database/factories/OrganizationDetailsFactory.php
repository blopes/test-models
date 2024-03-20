<?php

namespace Blopes\SharedModels\Database\Factories;

use Blopes\SharedModels\Models\OrganizationSize;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Blopes\SharedModels\Models\OrganizationDetails>
 */
class OrganizationDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'areas_experience' => $this->faker->word(),
            'website' => $this->faker->url(),
            'address' => $this->faker->address(),
            'country' => $this->faker->country(),
            'city' => $this->faker->city(),
            'creator_id' => $this->faker->numberBetween(1, 100),
            'size_id' => OrganizationSize::first()->id
        ];
    }
}
