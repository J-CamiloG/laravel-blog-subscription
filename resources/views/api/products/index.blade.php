@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="bg-gray-800 overflow-hidden shadow-sm rounded-lg">
        <div class="p-6 bg-gray-800 border-b border-gray-700">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-white">Productos (API Externa)</h2>
                <div class="flex items-center">
                    <form action="{{ route('api.products.index') }}" method="GET" class="flex">
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ $search }}"
                            placeholder="Buscar productos..." 
                            class="rounded-l-md border-gray-600 bg-gray-700 text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        >
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r-md hover:bg-blue-700">
                            Buscar
                        </button>
                    </form>
                    <a href="{{ route('api.products.create') }}" class="ml-4 bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">
                        Nuevo Producto
                    </a>
                </div>
            </div>

            @if (session('success'))
                <div class="bg-green-900 border border-green-600 text-green-100 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-900 border border-red-600 text-red-100 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-600">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Título</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @forelse ($products as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ $product['id'] }}</td>
                                <td class="px-6 py-4 text-gray-300">{{ $product['title'] }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('api.products.show', $product['id']) }}" class="text-blue-400 hover:text-blue-300 mr-3">Ver</a>
                                    <a href="{{ route('api.products.edit', $product['id']) }}" class="text-yellow-400 hover:text-yellow-300 mr-3">Editar</a>
                                    <form action="{{ route('api.products.destroy', $product['id']) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:text-red-300" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-400">No se encontraron productos</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection