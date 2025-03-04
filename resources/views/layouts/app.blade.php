<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel Blog') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-screen bg-gray-900 flex flex-col">
    <!-- Navbar -->
    <nav class="bg-gray-800 border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <!-- Logo y Navegación Principal -->
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="/" class="flex items-center space-x-3">
                            <!-- Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-2xl font-bold bg-gradient-to-r from-blue-400 to-blue-600 bg-clip-text text-transparent">
                                Laravel Blog
                            </span>
                        </a>
                    </div>

                </div>

                <!-- Menú de navegación -->
                <div class="flex items-center">
                    @auth
                    @if(auth()->user()->hasRole('admin'))
                        <a href="{{ route('admin.users') }}" 
                            class="text-gray-300 hover:text-white px-4 py-2 text-sm font-medium transition duration-150 ease-in-out hover:bg-gray-700 rounded-lg mr-4">
                            Gestionar Usuarios
                        </a>
                        <a href="{{ route('admin.posts') }}" 
                            class="text-gray-300 hover:text-white px-4 py-2 text-sm font-medium transition duration-150 ease-in-out hover:bg-gray-700 rounded-lg mr-4">
                            Gestionar Posts
                        </a>
                    @endif
                    <!-- Enlace a Productos API -->
                    <a href="{{ route('api.products.index') }}" 
                    class="text-gray-300 hover:text-white px-4 py-2 text-sm font-medium transition duration-150 ease-in-out hover:bg-gray-700 rounded-lg mr-4">
                    Productos API
                    </a>

                        @if(auth()->user()->is_active)
                            <a href="{{ route('posts.create') }}" 
                                class="text-gray-300 hover:text-white px-4 py-2 text-sm font-medium transition duration-150 ease-in-out hover:bg-gray-700 rounded-lg mr-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                                Crear Post
                            </a>
                        @endif

                        <!-- Usuario autenticado -->
                        <div class="flex items-center space-x-4">
                            <span class="text-gray-300 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                                {{ auth()->user()->name }}
                            </span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" 
                                    class="text-gray-300 hover:text-white px-4 py-2 text-sm font-medium transition duration-150 ease-in-out hover:bg-gray-700 rounded-lg flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                                    </svg>
                                    Cerrar sesión
                                </button>
                            </form>
                        </div>
                    @else
                        <!-- Usuario no autenticado -->
                        <a href="{{ route('login') }}" 
                            class="text-gray-300 hover:text-white px-4 py-2 text-sm font-medium transition duration-150 ease-in-out hover:bg-gray-700 rounded-lg">
                            Login
                        </a>
                        <a href="{{ route('register') }}" 
                            class="ml-4 px-4 py-2 rounded-lg text-sm font-semibold text-white bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 transition duration-150 ease-in-out transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-blue-500 shadow-lg shadow-blue-500/25">
                            Register
                        </a>
                    @endauth
</div>
            </div>
        </div>
    </nav>

    <!-- main -->
    <main class="flex-grow py-4 px-4 sm:px-6 lg:px-8">
    @hasSection('content')
        @yield('content')
    @else
        {{ $slot }}
    @endif
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 border-t border-gray-700 mt-auto">
        <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center space-y-4">
                <!-- Logo -->
                <a href="/" class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-lg font-semibold text-white">Laravel Blog</span>
                </a>

                <!-- Enlaces del Footer -->
                <nav class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white transition duration-150 ease-in-out text-sm">
                        Acerca de
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-150 ease-in-out text-sm">
                        Privacidad
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-150 ease-in-out text-sm">
                        Términos
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition duration-150 ease-in-out text-sm">
                        Contacto
                    </a>
                </nav>

                <!-- Copyright -->
                <p class="text-gray-400 text-sm">
                    © {{ date('Y') }} Laravel Blog. Todos los derechos reservados.
                </p>
            </div>
        </div>
    </footer>

    @livewireScripts

    <!-- background -->
    <div class="fixed inset-0 bg-gradient-to-br from-gray-900 to-gray-800 -z-10"></div>
</body>
</html>