<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel Blog') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="h-full">
    <!-- Navbar -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="/" class="text-xl font-bold text-gray-800">
                            Laravel Blog
                        </a>
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="ml-4 text-gray-600 hover:text-gray-900">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="py-12">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-sm mt-auto">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-gray-500">
                © {{ date('Y') }} Laravel Blog. All rights reserved.
            </p>
        </div>
    </footer>

    @livewireScripts
</body>
</html>