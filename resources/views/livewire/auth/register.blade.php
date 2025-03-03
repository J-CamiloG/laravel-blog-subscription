<div class="min-h-screen flex items-center justify-center bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-xl w-full space-y-8 bg-gray-800 rounded-xl shadow-2xl overflow-hidden">
        <div class="px-8 py-10 bg-gradient-to-r from-gray-800 to-gray-900 border-b border-gray-700">
            <h2 class="text-center text-4xl font-bold tracking-tight text-white">
                Crear una cuenta
            </h2>
            <p class="mt-3 text-center text-lg text-gray-300">
                Únete a nuestra plataforma y comienza tu experiencia
            </p>
        </div>
        
        <div class="px-8 py-10">
            <form wire:submit="register" class="space-y-8">
                <!-- Nombre -->
                <div class="space-y-3">
                    <label for="name" class="block text-lg font-semibold text-white">
                        Nombre completo
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input 
                            wire:model="name" 
                            id="name" 
                            type="text" 
                            required
                            class="pl-12 block w-full rounded-lg border-2 border-gray-600 bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent py-3 text-lg transition duration-150 ease-in-out"
                            placeholder="Tu nombre completo"
                        >
                    </div>
                    @error('name') 
                        <p class="mt-2 text-base text-red-400">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Email -->
                <div class="space-y-3">
                    <label for="email" class="block text-lg font-semibold text-white">
                        Correo electrónico
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </div>
                        <input 
                            wire:model="email" 
                            id="email" 
                            type="email" 
                            required
                            class="pl-12 block w-full rounded-lg border-2 border-gray-600 bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent py-3 text-lg transition duration-150 ease-in-out"
                            placeholder="tu@ejemplo.com"
                        >
                    </div>
                    @error('email') 
                        <p class="mt-2 text-base text-red-400">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Fecha de nacimiento -->
                <div class="space-y-3">
                    <label for="birth_date" class="block text-lg font-semibold text-white">
                        Fecha de nacimiento
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input 
                            wire:model="birth_date" 
                            id="birth_date" 
                            type="date" 
                            required
                            class="pl-12 block w-full rounded-lg border-2 border-gray-600 bg-gray-700 text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent py-3 text-lg transition duration-150 ease-in-out"
                        >
                    </div>
                    @error('birth_date') 
                        <p class="mt-2 text-base text-red-400">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Contraseña -->
                <div class="space-y-3">
                    <label for="password" class="block text-lg font-semibold text-white">
                        Contraseña
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input 
                            wire:model="password" 
                            id="password" 
                            type="password" 
                            required
                            class="pl-12 block w-full rounded-lg border-2 border-gray-600 bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent py-3 text-lg transition duration-150 ease-in-out"
                            placeholder="Mínimo 8 caracteres"
                        >
                    </div>
                    @error('password') 
                        <p class="mt-2 text-base text-red-400">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Confirmar Contraseña -->
                <div class="space-y-3">
                    <label for="password_confirmation" class="block text-lg font-semibold text-white">
                        Confirmar contraseña
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input 
                            wire:model="password_confirmation" 
                            id="password_confirmation" 
                            type="password" 
                            required
                            class="pl-12 block w-full rounded-lg border-2 border-gray-600 bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent py-3 text-lg transition duration-150 ease-in-out"
                            placeholder="Repite tu contraseña"
                        >
                    </div>
                </div>

                <div class="pt-4">
                    <button 
                        type="submit"
                        class="group relative w-full flex justify-center py-4 px-4 border border-transparent text-lg font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out transform hover:-translate-y-0.5"
                    >
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-300 group-hover:text-blue-200" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        Registrarse
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center">
                <p class="text-base text-gray-400">
                    ¿Ya tienes una cuenta?
                    <a href="#" class="font-medium text-blue-400 hover:text-blue-300 transition duration-150 ease-in-out ml-2">
                        Inicia sesión
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>