<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'hrac1',
            'password' => Hash::make('czechSkills2024'),
        ]);

        User::create([
            'username' => 'admin',
            'password' => Hash::make('WebSkills2024'),
        ]);

        Post::create([
            'title' => 'ntza',
            'content' => 'this is the content'
        ]);
    }
}
