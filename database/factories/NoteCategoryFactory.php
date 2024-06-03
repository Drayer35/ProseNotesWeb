<?php

namespace Database\Factories;
use App\Models\NoteCategory;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NoteCategory>
 */
class NoteCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model =NoteCategory::class;
    public function definition(): array
    {
        return [
            'id_note' => fake()->numberBetween(1,50),
            'id_category' =>fake()->numberBetween(1,4)
        ];
    }
}
