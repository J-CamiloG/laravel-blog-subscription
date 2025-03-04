@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="bg-gray-800 overflow-hidden shadow-sm rounded-lg">
        <div class="p-6 bg-gray-800 border-b border-gray-700">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-white">Crear Nuevo Producto</h2>
                <div>
                    <a href="{{ route('api.products.index') }}" class="text-blue-400 hover:text-blue-300">Volver a la lista</a>
                </div>
            </div>

            @if (session('error'))
                <div class="bg-red-900 border border-red-600 text-red-100 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <form action="{{ route('api.products.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Título</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title"
                        value="{{ old('title') }}"
                        class="w-full rounded-md border-gray-600 bg-gray-700 text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        placeholder="Título del producto"
                    >
                    @error('title')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="body" class="block text-sm font-medium text-gray-300 mb-2">Descripción</label>
                    <textarea 
                        name="body" 
                        id="body"
                        rows="6"
                        class="w-full rounded-md border-gray-600 bg-gray-700 text-white shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                        placeholder="Descripción del producto"
                    >{{ old('body') }}</textarea>
                    @error('body')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button 
                        type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-800"
                    >
                        Crear Producto
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection