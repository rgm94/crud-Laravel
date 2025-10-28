<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Crear Usuario</title>
    </head>
<body class="font-sans antialiased">
    <div id="layout" class="min-h-screen w-full flex flex-col items-center bg-gray-100">
        
        <header class="w-full p-4 flex flex-col md:flex-row gap-4 justify-center items-center 
        bg-white shadow-lg border-b-4 border-indigo-700 text-center relative"
        >
            <div class="w-full flex justify-center items-center gap-3">
                <svg class="h-10 w-10 text-indigo-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <h1 class="text-4xl font-extrabold text-indigo-800 tracking-tight">Crear Usuario</h1>
            </div>
            
            <a class="hidden md:inline-flex lg:absolute right-4 top-1/2 transform -translate-y-1/2 p-3 text-white 
            bg-indigo-700 hover:bg-indigo-600 transition duration-300 rounded-lg shadow-md font-semibold text-sm" 
                href="{{route('index')}}"
            >
                Ver todos los usuarios
            </a>

            <a class="w-full md:hidden p-3 text-white rounded-lg bg-indigo-700 hover:bg-indigo-600 transition duration-300 
            shadow-md font-semibold" href="{{route('index')}}">
                Ver todos los usuarios
            </a>
        </header>
        
        <main id="content" class="w-full max-w-sm sm:max-w-md lg:max-w-lg mx-auto p-4 my-10">
            
            @if ($errors->has('error'))
                <div class="w-full border-2 border-red-500 bg-red-100 text-red-700 rounded-lg p-4 mb-4 
                text-center font-medium" role="alert">
                    <p>{{ $errors->first('error') }}</p>
                </div>
            @endif

            @if (session('success'))
                <div class="w-full border-2 border-green-700 bg-green-100 text-green-700 rounded-lg p-4 mb-4 
                text-center font-semibold" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <form class="w-full p-8 flex flex-col gap-6 rounded-2xl bg-white shadow-2xl hover:shadow-indigo-500/50 
            transition duration-500 ease-in-out transform hover:-translate-y-1" 
                action="{{route('save')}}"
                method="POST"
            >
                @csrf
                <div class="w-full flex justify-center items-center mb-4">
                    <svg class="w-12 h-12 text-indigo-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" 
                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24"
                    >
                        <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 
                        2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 
                        0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                    </svg>
                </div>
                
                <div class="w-full">
                    <label class="block text-indigo-700 text-sm font-semibold mb-2" for="userName">Nombre:</label>
                    <input class="w-full p-3 border border-gray-300 rounded-lg text-gray-800 placeholder-gray-400
                    focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition duration-150" type="text" 
                        name="name"
                        id="userName"
                        required
                        placeholder="Ingresa el nombre completo"
                    >
                    @error('name')
                    <p class="text-red-500 text-xs italic mt-2">
                        {{ $message }} 
                    </p>
                    @enderror
                </div>
                
                <div class="w-full">
                    <label class="block text-indigo-700 text-sm font-semibold mb-2" for="userEmail">Email:</label>
                    <input class="w-full p-3 border border-gray-300 rounded-lg text-gray-800 placeholder-gray-400
                    focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition duration-150" type="email" 
                        name="email" 
                        id="userEmail"
                        required
                        placeholder="ejemplo@dominio.com"
                    >
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-2">
                            {{ $message }} 
                        </p>
                    @enderror
                </div>
                
                <div class="w-full">
                    <label class="block text-indigo-700 text-sm font-semibold mb-2" for="userPassword">Contraseña:</label>
                    <input class="w-full p-3 border border-gray-300 rounded-lg text-gray-800 placeholder-gray-400
                    focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition duration-150" type="password" 
                    name="password" 
                    id="userPassword"
                    required
                    placeholder="Mínimo 8 caracteres"
                    >
                    @error('password')
                        <p class="text-red-500 text-xs italic mt-2">
                            {{ $message }} 
                        </p>
                    @enderror
                </div>
                
                <div class="w-full mt-4">
                    <input class="w-full bg-indigo-700 text-white p-3 rounded-lg cursor-pointer font-extrabold uppercase 
                    hover:bg-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-300 transition duration-300 
                    shadow-lg hover:shadow-xl transform hover:scale-[1.01]" 
                    type="submit" 
                    value="Crear Usuario">
                </div>
            </form>
        </main>
    </div>
</body>
</html>