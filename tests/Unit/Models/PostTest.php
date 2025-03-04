<?php

namespace Tests\Unit\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_belongs_to_a_user()
    {
        // Crear un usuario
        $user = User::factory()->create();
        
        // Crear un post asociado al usuario
        $post = Post::factory()->create([
            'user_id' => $user->id
        ]);
        
        // Verificar que el post pertenece al usuario correcto
        $this->assertInstanceOf(User::class, $post->user);
        $this->assertEquals($user->id, $post->user->id);
    }

    /** @test */
    public function it_can_be_published()
    {
        // Crear un post sin fecha de publicación
        $post = Post::factory()->create([
            'published_at' => null
        ]);
        
        // Verificar que el post no está publicado
        $this->assertNull($post->published_at);
        
        // Publicar el post
        $post->published_at = now();
        $post->save();
        
        // Verificar que el post está publicado
        $this->assertNotNull($post->fresh()->published_at);
    }

    /** @test */
    public function it_can_be_filtered_by_date()
    {
        // Crear posts con diferentes fechas
        $oldPost = Post::factory()->create([
            'published_at' => now()->subDays(10)
        ]);
        
        $middlePost = Post::factory()->create([
            'published_at' => now()->subDays(5)
        ]);
        
        $newPost = Post::factory()->create([
            'published_at' => now()
        ]);
        
        // Filtrar por fecha (últimos 7 días)
        $recentPosts = Post::query()
            ->whereDate('published_at', '>=', now()->subDays(7))
            ->get();
        
        // Verificar que solo se obtienen los posts recientes
        $this->assertCount(2, $recentPosts);
        $this->assertTrue($recentPosts->contains($middlePost));
        $this->assertTrue($recentPosts->contains($newPost));
        $this->assertFalse($recentPosts->contains($oldPost));
    }
}