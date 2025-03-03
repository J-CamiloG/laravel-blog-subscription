<div>
    <div class="py-6 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-lg sm:rounded-xl border border-gray-700">
                <div class="p-6 bg-gray-800">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 gap-4">
                        <h2 class="text-2xl font-bold text-white flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                            Gestión de Publicaciones
                        </h2>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input 
                                wire:model.live="search" 
                                type="search" 
                                placeholder="Buscar publicaciones..." 
                                class="pl-10 block w-full rounded-lg border-2 border-gray-600 bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent py-2 text-sm transition duration-150 ease-in-out"
                            >
                        </div>
                    </div>

                    @if (session()->has('message'))
                        <div class="bg-green-900/50 border border-green-700 text-green-300 px-4 py-3 rounded-lg relative mb-6 flex items-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="block sm:inline">{{ session('message') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto rounded-lg border border-gray-700">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th wire:click="sortBy('id')" class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider cursor-pointer hover:bg-gray-600 transition-colors duration-150">
                                        <div class="flex items-center">
                                            ID
                                            @if ($sortField === 'id')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                                    @if ($sortDirection === 'asc')
                                                        <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                                                    @else
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    @endif
                                                </svg>
                                            @endif
                                        </div>
                                    </th>
                                    <th wire:click="sortBy('title')" class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider cursor-pointer hover:bg-gray-600 transition-colors duration-150">
                                        <div class="flex items-center">
                                            Título
                                            @if ($sortField === 'title')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                                    @if ($sortDirection === 'asc')
                                                        <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                                                    @else
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    @endif
                                                </svg>
                                            @endif
                                        </div>
                                    </th>
                                    <th wire:click="sortBy('published_at')" class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider cursor-pointer hover:bg-gray-600 transition-colors duration-150">
                                        <div class="flex items-center">
                                            Fecha de Publicación
                                            @if ($sortField === 'published_at')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                                    @if ($sortDirection === 'asc')
                                                        <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                                                    @else
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    @endif
                                                </svg>
                                            @endif
                                        </div>
                                    </th>
                                    <th wire:click="sortBy('user_id')" class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider cursor-pointer hover:bg-gray-600 transition-colors duration-150">
                                        <div class="flex items-center">
                                            Autor
                                            @if ($sortField === 'user_id')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
                                                    @if ($sortDirection === 'asc')
                                                        <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                                                    @else
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    @endif
                                                </svg>
                                            @endif
                                        </div>
                                    </th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-800 divide-y divide-gray-700">
                                @foreach ($posts as $post)
                                    <tr class="hover:bg-gray-700/50 transition-colors duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-300">{{ $post->id }}</td>
                                        <td class="px-6 py-4 text-gray-300">{{ $post->title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-300">
                                            @if($post->published_at)
                                                <span class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                    </svg>
                                                    {{ $post->published_at->format('d/m/Y H:i') }}
                                                </span>
                                            @else
                                                <span class="flex items-center text-yellow-400">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                    No publicado
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-300">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-8 w-8 mr-2">
                                                    <div class="h-8 w-8 rounded-full bg-gray-600 flex items-center justify-center">
                                                        <span class="text-sm text-gray-300">
                                                            {{ strtoupper(substr($post->user->name, 0, 1)) }}
                                                        </span>
                                                    </div>
                                                </div>
                                                {{ $post->user->name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <button 
                                                wire:click="confirmPostDeletion({{ $post->id }})"
                                                class="inline-flex items-center px-3 py-1 rounded-lg bg-red-900/30 text-red-300 hover:bg-red-900/50 transition-colors duration-150"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación de eliminación -->
    @if ($confirmingPostDeletion)
        <div class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-50">
            <div class="bg-gray-800 rounded-xl overflow-hidden shadow-2xl transform transition-all sm:max-w-lg sm:w-full border border-gray-700">
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-900/50 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-white">
                                Eliminar Publicación
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-300">
                                    ¿Estás seguro de que deseas eliminar esta publicación? Esta acción no se puede deshacer.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button 
                        wire:click="deletePost" 
                        type="button" 
                        class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm transition-colors duration-150"
                    >
                        Eliminar
                    </button>
                    <button 
                        wire:click="$set('confirmingPostDeletion', false)" 
                        type="button" 
                        class="mt-3 w-full inline-flex justify-center rounded-lg border border-gray-600 shadow-sm px-4 py-2 bg-gray-800 text-base font-medium text-gray-300 hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition-colors duration-150"
                    >
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- Estilos para la paginación -->
    <style>
        .pagination-link {
            @apply relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-gray-700 border border-gray-600 hover:bg-gray-600;
        }
        
        .pagination-active {
            @apply z-10 bg-blue-600 border-blue-600 text-white hover:bg-blue-700;
        }
    </style>
</div>