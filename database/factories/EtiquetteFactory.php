<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Etiquette;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etiquette>
 */
class EtiquetteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model =Etiquette::class;

    public function definition(): array
    {
        return [
            'description' =>$this -> faker->randomElement(['CATEGORIA1','CATEGORIA2','CATEGORIA3','CATEGORIA4']),
            'IsEnabled' =>$this -> faker->randomElement([true,false]),
        ];
    }
}
