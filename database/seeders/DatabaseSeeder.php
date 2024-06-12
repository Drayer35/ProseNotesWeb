<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Etiquette;
use App\Models\Image;
use App\Models\Note;
use App\Models\NoteCategory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->withPersonalTeam()->create();
        User::factory()->withPersonalTeam()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        User::factory()->withPersonalTeam()->create([
            'name' => 'Drayer',
            'email' => 'jdcyonel2@gmail.com',
        ]);
        Etiquette::factory(4)->create();
        Note::factory(50)->create();
        Image::factory(2)->create();
    }
}
