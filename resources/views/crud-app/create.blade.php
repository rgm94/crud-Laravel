<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div id="layout" class="w-full flex flex-col justify-center items-center gap-6">
        <header class="w-full h-32 p-3 flex flex-col lg:flex-row md:flex-row gap-4 justify-center 
        items-center border-2 text-center"
        >
            <div class="w-full flex justify-center items-center gap-3">
                <svg class="h-8 w-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <h1 class="capitalize text-3xl font-bol">crear usuarios</h1>
            </div>
            <a class="hidden md:flex lg:flex lg:w-md p-3 border absolute lg:right-3 md:right-3 rounded-md" 
                href="{{route('index')}}"
                >
                Ver Todos los usuarios
            </a>

            <a class="w-full md:hidden lg:hidden border p-3 rounded-md" href="{{route('index')}}">
                Ver todos los usuarios
            </a>
        </header>
        <main id="content" class="w-full flex flex-col gap-2 lg:w-1/4 p-2">
            @if ($errors->has('error'))
                <div class="w-full border-2 rounded-lg p-4 text-center" role="alert">
                    <p>{{ $errors->first('error') }}</p>
                </div>
            @endif

            @if (session('success'))
                <div class="w-full border-2 rounded-lg p-4 text-center" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <form class="w-full p-2 flex flex-col items-center justify-center gap-3 border-2 rounded-lg" 
            action="{{route('save')}}"
            method="POST"
            >
                @csrf
                <div class="w-full text-center p-2">
                    <h1 class="capitalize text-xl font-bol">crear nuevo usuario</h1>
                </div>
                <div class="w-full border-2 rounded-md p-2">
                    <input class="w-full outline-none cursor-pointer" type="text" name="name" 
                    placeholder="Introduce Nombre" 
                    required
                    >
                    @error('name')
                    <span class="text-red text-md">
                        {{ $message }} 
                    </span>
                    @enderror
                </div>
                <div class="w-full border-2 rounded-md p-2">
                    <input class="w-full outline-none cursor-pointer" type="email" name="email" 
                    placeholder="Introduce Email" 
                    required
                    >
                    @error('email')
                        <span class="text-red text-md">
                            {{ $message }} 
                        </span>
                    @enderror
                </div>
                <div class="w-full border-2 rounded-md p-2">
                    <input class="w-full outline-none cursor-pointer" type="password" name="password" placeholder="Introduce Contraseña" 
                    required
                    >
                    @error('password')
                        <span class="text-red text-md">
                            {{ $message }} 
                        </span>
                    @enderror
                </div>
                <div class="w-full flex justify-center rounded-md p-2">
                    <input class="w-full bg-black text-white p-2 rounded-md cursor-pointer" type="submit" 
                    value="Crear Usuario">
                </div>
            </form>
        </main>
    </div>
</body>
</html>
