<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Encabezado -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Blog Posts</h1>
        <p class="mt-2 text-gray-600">Explora nuestras últimas publicaciones</p>
    </div>

    <!-- Buscador por fecha -->
    <div class="mb-6 max-w-md">
        <label for="search_date" class="block text-sm font-medium text-gray-700">
            Buscar por fecha
        </label>
        <input 
            type="date" 
            wire:model.live="search_date"
            id="search_date"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
        >
    </div>

    <!-- Lista de posts -->
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach($posts as $post)
            <article class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-2">
                        {{ $post->title }}
                    </h2>
                    <p class="text-gray-600 mb-4">
                        {{ Str::limit($post->description, 150) }}
                    </p>
                    <div class="flex items-center text-sm text-gray-500">
                        <span>{{ $post->published_at->format('d M, Y') }}</span>
                        <span class="mx-2">•</span>
                        <span>Por {{ $post->user->name }}</span>
                    </div>
                </div>
            </article>
        @endforeach
    </div>

    <!-- Paginación -->
    <div class="mt-8">
        {{ $posts->links() }}
    </div>
</div>