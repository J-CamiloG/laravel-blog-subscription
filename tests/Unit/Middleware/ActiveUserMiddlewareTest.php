<?php

namespace Tests\Unit\Middleware;

use App\Http\Middleware\ActiveUserMiddleware;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class ActiveUserMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_redirects_inactive_users_to_home()
    {
        // Configurar
        $middleware = new ActiveUserMiddleware();
        $request = new Request();
        
        // Crear un usuario inactivo
        $user = User::factory()->create([
            'is_active' => false
        ]);
        
        // Autenticar al usuario
        Auth::login($user);
        
        // Ejecutar
        $response = $middleware->handle($request, function () {
            return 'next was called';
        });
        
        // Verificar
        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);
        $this->assertEquals(route('home'), $response->headers->get('Location'));
    }

    /** @test */
    public function it_allows_active_users_to_proceed()
    {
        // Configurar
        $middleware = new ActiveUserMiddleware();
        $request = new Request();
        
        // Crear un usuario activo
        $user = User::factory()->create([
            'is_active' => true
        ]);
        
        // Autenticar al usuario
        Auth::login($user);
        
        // Ejecutar
        $response = $middleware->handle($request, function () {
            return 'next was called';
        });
        
        // Verificar
        $this->assertEquals('next was called', $response);
    }
}