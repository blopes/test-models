<?php

namespace Blopes\SharedModels\Database\Factories;

use Blopes\SharedModels\Models\UnitDetails;
use Blopes\SharedModels\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Blopes\SharedModels\Models\UnitDetails>
 */
class UnitDetailsFactory extends Factory
{
    protected $model = UnitDetails::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'address' => $this->faker->address(),
            'country' => $this->faker->country(),
            'city' => $this->faker->city(),
            'creator_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
