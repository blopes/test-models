<?php

namespace Blopes\SharedModels\Database\Factories;

use Blopes\SharedModels\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Blopes\SharedModels\Models\Organization>
 */
class OrganizationFactory extends Factory
{
    protected $model = Organization::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'email' => $this->faker->email(),
            'phone_number' => '9' . $this->faker->numberBetween(10000000, 99999999),
            'sector' => $this->faker->sentence(1),
            'description' => $this->faker->sentence(5),
            'is_registered' => $this->faker->numberBetween(0, 1),
            'thumbnail_id' => 2
        ];
    }
}
