<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::first();

        // Post para hoy
        Post::create([
            'title' => 'Primer Post del Blog',
            'description' => 'Este es el contenido del primer post del blog.',
            'user_id' => $admin->id,
            'published_at' => now(),
        ]);

        // Post para ayer
        Post::create([
            'title' => 'Segundo Post del Blog',
            'description' => 'Este es el contenido del segundo post del blog.',
            'user_id' => $admin->id,
            'published_at' => now()->subDay(),
        ]);

        // Post para la semana pasada
        Post::create([
            'title' => 'Tercer Post del Blog',
            'description' => 'Este es el contenido del tercer post del blog.',
            'user_id' => $admin->id,
            'published_at' => now()->subWeek(),
        ]);
    }
}
