<?php

namespace Blopes\SharedModels\Database\Factories;

use Blopes\SharedModels\Models\ClassificationSystem;
use Blopes\SharedModels\Models\Framework;
use Blopes\SharedModels\Models\Project;
use Blopes\SharedModels\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Blopes\SharedModels\Models\Project>
 */
class ProjectFactory extends Factory
{
    protected $model = Project::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title(),
            'reference' => $this->faker->postcode(),
            'country' => $this->faker->country(),
            'city' => $this->faker->city(),
            'framework_id' => Framework::first()->id,
            'classification_system_id' => ClassificationSystem::first()->id,
            'creator_id' => User::first()->id,
            'thumbnail_id' => 3,
        ];
    }
}
