<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ProductController extends Controller
{
    protected $apiUrl = 'https://jsonplaceholder.typicode.com';

    public function index(Request $request)
    {
        // Obtener
        $response = Http::get("{$this->apiUrl}/posts");
        $products = $response->json();

        // Filtros
        if ($request->has('search')) {
            $search = strtolower($request->search);
            $products = array_filter($products, function($product) use ($search) {
                return str_contains(strtolower($product['title']), $search);
            });
        }

        return view('api.products.index', [
            'products' => $products,
            'search' => $request->search ?? ''
        ]);
    }

    public function show($id)
    {
        $response = Http::get("{$this->apiUrl}/posts/{$id}");
        
        if ($response->failed()) {
            return redirect()->route('api.products.index')
                ->with('error', 'Producto no encontrado');
        }

        return view('api.products.show', [
            'product' => $response->json()
        ]);
    }

    public function create()
    {
        return view('api.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:10',
        ]);

        $response = Http::post("{$this->apiUrl}/posts", [
            'title' => $request->title,
            'body' => $request->body,
            'userId' => 1, 
        ]);

        if ($response->successful()) {
            return redirect()->route('api.products.index')
                ->with('success', 'Producto creado correctamente');
        }

        return back()->with('error', 'Error al crear el producto');
    }

    public function edit($id)
    {
        $response = Http::get("{$this->apiUrl}/posts/{$id}");
        
        if ($response->failed()) {
            return redirect()->route('api.products.index')
                ->with('error', 'Producto no encontrado');
        }

        return view('api.products.edit', [
            'product' => $response->json()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:10',
        ]);

        $response = Http::put("{$this->apiUrl}/posts/{$id}", [
            'title' => $request->title,
            'body' => $request->body,
            'userId' => 1,
        ]);

        if ($response->successful()) {
            return redirect()->route('api.products.show', $id)
                ->with('success', 'Producto actualizado correctamente');
        }

        return back()->with('error', 'Error al actualizar el producto');
    }

    public function destroy($id)
    {
        $response = Http::delete("{$this->apiUrl}/posts/{$id}");

        if ($response->successful()) {
            return redirect()->route('api.products.index')
                ->with('success', 'Producto eliminado correctamente');
        }

        return back()->with('error', 'Error al eliminar el producto');
    }
}