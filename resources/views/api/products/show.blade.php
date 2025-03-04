@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="bg-gray-800 overflow-hidden shadow-sm rounded-lg">
        <div class="p-6 bg-gray-800 border-b border-gray-700">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-white">Detalle del Producto</h2>
                <div>
                    <a href="{{ route('api.products.index') }}" class="text-blue-400 hover:text-blue-300">Volver a la lista</a>
                </div>
            </div>

            @if (session('success'))
                <div class="bg-green-900 border border-green-600 text-green-100 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-gray-700 p-6 rounded-lg">
                <h3 class="text-xl font-bold text-white mb-4">{{ $product['title'] }}</h3>
                <p class="text-gray-300 mb-4">{{ $product['body'] }}</p>
                
                <div class="mt-6 flex space-x-4">
                    <a href="{{ route('api.products.edit', $product['id']) }}" class="bg-yellow-600 text-white px-4 py-2 rounded-md hover:bg-yellow-700">Editar</a>
                    <form action="{{ route('api.products.destroy', $product['id']) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection