<div>
    <div class=" bg-gray-900 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Encabezado  -->
            <div class="relative pb-12 mb-8">
                <h1 class="text-4xl font-bold text-white tracking-tight">
                    Blog Posts
                </h1>
                <p class="mt-3 text-xl text-gray-400">
                    Explora nuestras últimas publicaciones
                </p>
                <div class="absolute bottom-0 left-0 w-32 h-1 bg-blue-600 rounded-full"></div>
            </div>

            <!-- Buscador por fecha  -->
            <div class="mb-10 max-w-md bg-gray-800 p-6 rounded-xl shadow-lg">
                <label for="search_date" class="block text-lg font-semibold text-white mb-3">
                    Buscar por fecha
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <input 
                        type="date" 
                        wire:model.live="search_date"
                        id="search_date"
                        class="block w-full pl-12 pr-4 py-3 text-base rounded-lg border-2 border-gray-600 bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"
                    >
                </div>
            </div>

            <!-- Lista de posts con  -->
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($posts as $post)
                    <article class="bg-gray-800 rounded-xl overflow-hidden hover:transform hover:scale-105 transition-all duration-300 border border-gray-700 hover:border-blue-500 group">


                        <div class="p-6">
                            <!-- Fecha y autor -->
                            <div class="flex items-center text-sm text-gray-400 mb-4">
                                <span class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $post->published_at->format('d M, Y') }}
                                </span>
                                <span class="mx-2 text-gray-600">•</span>
                                <span class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    {{ $post->user->name }}
                                </span>
                            </div>

                            <!-- Título y descripción -->
                            <h2 class="text-xl font-bold text-white mb-3 group-hover:text-blue-400 transition-colors duration-200">
                                {{ $post->title }}
                            </h2>
                            <p class="text-gray-400 mb-4 line-clamp-3">
                                {{ Str::limit($post->description, 150) }}
                            </p>

                            <!-- por ahora comentado -->
                            <!-- Botón leer más -->
                            <!-- <div class="pt-4 border-t border-gray-700">
                                <a href="#" class="inline-flex items-center text-blue-400 hover:text-blue-300 transition-colors duration-200">
                                    Leer más
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform duration-200" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div> -->
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Paginación  -->
            <div class="mt-12">
                {{ $posts->links() }}
            </div>
        </div>
    </div>

    <!-- Estilos  paginación -->
    <style>
        .pagination-link {
            @apply relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-800 border border-gray-600 hover:bg-gray-700;
        }
        
        .pagination-active {
            @apply z-10 bg-blue-600 border-blue-600 text-white hover:bg-blue-700;
        }
    </style>
</div>