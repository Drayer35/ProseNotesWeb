<?php

namespace Database\Factories;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model =Note::class;

    public function definition(): array
    {
        return [
            'id_user' =>1,
            'title' =>$this -> faker->randomElement(['TITULO1','TITULO2','TITULO3','TITULO']),
            'note' =>$this -> faker->paragraph(),
            'IsArchived' =>$this -> faker->randomElement([true,false]),
            'IsFixed' =>$this -> faker->randomElement([true,false]),
            'IsFinished' =>$this -> faker->randomElement([true,false]),
        ];
    }
}
