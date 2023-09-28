<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $parent = Department::whereNull('parent_id')->inRandomOrder()->first();
        return [
            'name' => fake()->colorName,
            'parent_id' => $parent->id,
        ];
    }
}
