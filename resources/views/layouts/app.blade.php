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

                    <!-- Navegation -->
                    <div class="hidden md:flex md:ml-10 md:space-x-8">
                        <a href="#" class="text-gray-300 hover:text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                            Inicio
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                            Publicaciones
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                            Categorias
                        </a>
                    </div>
                </div>

                <!-- autentificacion -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" 
                       class="text-gray-300 hover:text-white px-4 py-2 text-sm font-medium transition duration-150 ease-in-out hover:bg-gray-700 rounded-lg">
                        Login
                    </a>
                    <a href="{{ route('register') }}" 
                       class="px-4 py-2 rounded-lg text-sm font-semibold text-white bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 transition duration-150 ease-in-out transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-blue-500 shadow-lg shadow-blue-500/25">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- main -->
    <main class="flex-grow py-12 px-4 sm:px-6 lg:px-8">
        {{ $slot }}
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