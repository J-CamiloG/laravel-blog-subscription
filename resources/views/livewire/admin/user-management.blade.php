<div>
    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-lg sm:rounded-xl border border-gray-700">
                <div class="p-6 bg-gray-800">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-white">Gestión de Usuarios</h2>
                        <div class="flex space-x-3">
                            <button class="px-4 py-2 bg-gray-700 text-gray-300 rounded-lg hover:bg-gray-600 transition-colors duration-150 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                                </svg>
                                Filtrar
                            </button>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-900/50 text-green-300 rounded-lg border border-green-700 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-900/50 text-red-300 rounded-lg border border-red-700 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto rounded-lg border border-gray-700">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead class="bg-gray-700">
                                <tr>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Fecha de Registro
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Estado
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-gray-800 divide-y divide-gray-700">
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-700/50 transition-colors duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <div class="h-10 w-10 rounded-full bg-gray-600 flex items-center justify-center">
                                                        <span class="text-lg text-gray-300">
                                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-200">
                                                        {{ $user->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-300">
                                                {{ $user->email }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-300">
                                                {{ $user->created_at->format('d/m/Y') }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->is_active ? 'bg-green-900/50 text-green-300 border border-green-700' : 'bg-red-900/50 text-red-300 border border-red-700' }}">
                                                <span class="flex items-center">
                                                    <span class="h-2 w-2 rounded-full {{ $user->is_active ? 'bg-green-400' : 'bg-red-400' }} mr-2"></span>
                                                    {{ $user->is_active ? 'Activo' : 'Inactivo' }}
                                                </span>
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <button 
                                                wire:click="toggleUserStatus({{ $user->id }})"
                                                class="inline-flex items-center px-3 py-1 rounded-lg {{ $user->is_active ? 'bg-red-900/30 text-red-300 hover:bg-red-900/50' : 'bg-green-900/30 text-green-300 hover:bg-green-900/50' }} transition-colors duration-150"
                                            >
                                                @if($user->is_active)
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd" />
                                                    </svg>
                                                    Desactivar
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                    </svg>
                                                    Activar
                                                @endif
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .pagination-link {
            @apply relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-gray-700 border border-gray-600 hover:bg-gray-600;
        }
        
        .pagination-active {
            @apply z-10 bg-blue-600 border-blue-600 text-white hover:bg-blue-700;
        }
    </style>
</div>