<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model =Category::class;

    public function definition(): array
    {
        return [
            'category' =>$this -> faker->randomElement(['CATEGORIA1','CATEGORIA2','CATEGORIA3','CATEGORIA4']),
            'IsEnabled' =>$this -> faker->randomElement([true,false]),
        ];
    }
}
