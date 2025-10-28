<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                <h1 class="text-4xl font-extrabold text-indigo-800 tracking-tight">Editar Usuario</h1>
            </div>
            
            <div class="hidden md:flex lg:absolute right-4 top-1/2 transform -translate-y-1/2 gap-3">
                <a class="p-3 text-white bg-indigo-500 hover:bg-indigo-600 transition duration-300 rounded-lg shadow-md font-semibold text-sm" 
                    href="{{route('create')}}"
                >
                    Crear usuario
                </a>
                <a class="p-3 text-white bg-indigo-700 hover:bg-indigo-800 transition duration-300 rounded-lg shadow-md font-semibold text-sm" 
                    href="{{route('index')}}"
                >
                    Ver todos los usuarios
                </a>
            </div>

            <div class="w-full md:hidden flex flex-col gap-2">
                <a class="w-full p-3 text-white rounded-lg bg-indigo-500 hover:bg-indigo-600 transition duration-300 shadow-md font-semibold" 
                    href="{{route('create')}}">
                    Crear usuario
                </a>
                <a class="w-full p-3 text-white rounded-lg bg-indigo-700 hover:bg-indigo-800 transition duration-300 shadow-md font-semibold" 
                    href="{{route('index')}}">
                    Ver todos los usuarios
                </a>
            </div>
        </header>

        <main id="content" class="w-full max-w-lg mx-auto p-4 my-8">
            
            @if ($errors->has('error'))
                <div class="w-full border-2 border-red-500 bg-red-100 text-red-700 rounded-lg p-4 mb-4 text-center font-medium" role="alert">
                    <p>{{ $errors->first('error') }}</p>
                </div>
            @endif

            @if (session('success'))
                <div class="w-full border-2 border-green-700 bg-green-100 text-green-700 rounded-lg p-4 mb-4 text-center font-semibold" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <form class="w-full p-8 flex flex-col gap-6 rounded-2xl bg-white shadow-2xl transform hover:shadow-indigo-500/50 transition duration-500" 
                action="{{ route('update',$user->id) }}"
                method="POST"
            >
                @csrf
                @method('PUT')
                
                <div class="w-full flex justify-center items-center mb-4">
                    <svg class="w-12 h-12 text-indigo-700" aria-hidden="true" 
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 
                        0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 
                        13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 
                        1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 
                        18.092 8Z" clip-rule="evenodd"/>
                    </svg>
                </div>
                
                <div class="w-full">
                    <label class="block text-indigo-700 text-sm font-bold mb-2" for="userName">Nombre:</label>
                    <input class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 
                    focus:border-indigo-500 outline-none transition duration-150" type="text" 
                        name="name"
                        id="userName"
                        required
                        value="{{ $user->name ?? '' }}"
                        placeholder="Ingresa el nombre completo"
                    >
                    @error('name')
                    <p class="text-red-500 text-xs italic mt-2">
                        {{ $message }} 
                    </p>
                    @enderror
                </div>
                
                <div class="w-full">
                    <label class="block text-indigo-700 text-sm font-bold mb-2" for="userEmail">Email:</label>
                    <input class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 
                    focus:border-indigo-500 outline-none transition duration-150" type="email" 
                        name="email" 
                        id="userEmail"
                        required
                        value="{{ $user->email ?? '' }}"
                        placeholder="ejemplo@dominio.com"
                    >
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-2">
                            {{ $message }} 
                        </p>
                    @enderror
                </div>
                
                <div class="w-full">
                    <label class="block text-indigo-700 text-sm font-bold mb-2" for="userPassword">Contraseña:</label>
                    <input class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 
                    focus:border-indigo-500 outline-none transition duration-150" type="password" name="password" 
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
                    <input class="w-full bg-indigo-700 text-white p-3 rounded-lg cursor-pointer font-bold uppercase 
                    hover:bg-indigo-800 transition duration-300 transform hover:scale-[1.01] shadow-lg" 
                    type="submit" 
                    value="Guardar cambios">
                </div>
            </form>
        </main>
    </div>
</body>
</html>