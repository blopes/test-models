<?php

namespace Blopes\SharedModels\Database\Factories;

use Blopes\SharedModels\Models\UserDetails;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Blopes\SharedModels\Models\UserDetails>
 */
class UserDetailsFactory extends Factory
{
    protected $model = UserDetails::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'profession' => $this->faker->word(),
            'specialization' => $this->faker->word(),
            'academic_level' => $this->faker->word(),
            'prof_order_number' => $this->faker->numberBetween(100000000, 999999999),
            'country' => substr($this->faker->country(), 0, 50),
            'city' => substr($this->faker->city(), 0, 50),
        ];
    }
}
