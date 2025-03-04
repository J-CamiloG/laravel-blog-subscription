<?php

namespace Tests\Unit\Middleware;

use App\Http\Middleware\AdminMiddleware;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AdminMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_redirects_guests_to_home()
    {
        // Configurar
        $middleware = new AdminMiddleware();
        $request = new Request();
        
        // Asegurarse de que no hay usuario autenticado
        Auth::logout();
        
        // Ejecutar
        $response = $middleware->handle($request, function () {
            return 'next was called';
        });
        
        // Verificar
        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);
        $this->assertEquals(route('home'), $response->headers->get('Location'));
    }

    /** @test */
    public function it_redirects_non_admin_users_to_home()
    {
        // Configurar
        $middleware = new AdminMiddleware();
        $request = new Request();
        
        // Crear un usuario regular
        $user = User::factory()->create();
        
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
    public function it_allows_admin_users_to_proceed()
    {
        // Configurar
        $middleware = new AdminMiddleware();
        $request = new Request();
        
        // Crear un usuario admin
        $admin = User::factory()->create();
        $admin->assignRole('admin');
        
        // Autenticar al admin
        Auth::login($admin);
        
        // Ejecutar
        $response = $middleware->handle($request, function () {
            return 'next was called';
        });
        
        // Verificar
        $this->assertEquals('next was called', $response);
    }
}