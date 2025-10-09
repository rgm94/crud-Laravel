<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div id="layout" class="h-screen w-full flex flex-col items-center gap-6 bg-[#f1f5f9]">
        <header class="w-full h-32 p-3 flex flex-col lg:flex-row md:flex-row gap-4 justify-center 
        items-center border border-b-[#322e81] text-center"
        >
            <div class="w-full flex justify-center items-center gap-3">
                <svg class="h-8 w-8 text-[#322e81]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <h1 class="capitalize text-3xl font-bol text-[#322e81]">editar usuario</h1>
            </div>
            <a class="hidden md:flex lg:flex lg:w-md p-3 text-white bg-[#322e81] absolute lg:right-40 md:right-6 rounded-md" 
                href="{{route('index')}}"
                >
                Ver todos los usuarios
            </a>
            <a class="hidden md:flex lg:flex lg:w-md p-3 text-white bg-[#322e81] absolute lg:right-3 md:right-3 rounded-md" 
                href="{{route('create')}}"
                >
                Crear usuario.
            </a>

            <a class="w-full md:hidden lg:hidden border p-3 text-white rounded-md bg-[#322e81]" 
                href="{{route('index')}}">
                Ver todos los usuarios
            </a>
             <a class="w-full md:hidden lg:hidden border p-3 text-white rounded-md bg-[#322e81]" 
                href="{{route('create')}}">
                Crear usuarios.
            </a>
        </header>
        <main id="content" class="w-full flex flex-col gap-2 md:w-1/2 lg:w-1/5 p-2">
            @if ($errors->has('error'))
                <div class="w-full border-2 rounded-lg p-4 text-center" role="alert">
                    <p>{{ $errors->first('error') }}</p>
                </div>
            @endif

            @if (session('success'))
                <div class="w-full border-2 border-green-700 bg-green-200 text-green-700 rounded-lg p-4 text-center" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <form class="w-full p-4 flex flex-col items-center justify-center gap-5 rounded-xl bg-white shadow-2xl" 
                action="{{route('update',$user->id)}}"
                method="POST"
            >
                @csrf
                <div class="w-full flex justify-center items-center p-2 rounded-lg">
                    <svg class="w-8 h-10 text-[#322e81] dark:text-white" aria-hidden="true" 
                    xmlns="http://www.w3.org/2000/svg" 
                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24"
                    >
                        <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 
                        2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 
                        0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="w-full">
                    <label class="text-[#322e81]" for="userName">Nombre:</label>
                    <input class="w-full outline-none text-[#322e81] cursor-pointer border rounded-md p-1 
                        border-[#322e81]" type="text" 
                        name="name"
                        id="userName"
                        required
                    >
                    @error('name')
                    <span class="text-red-600 text-md">
                        {{ $message }} 
                    </span>
                    @enderror
                </div>
                <div class="w-full">
                    <label class="text-[#322e81]" for="">Email:</label>
                    <input class="w-full outline-none text-[#322e81] cursor-pointer border border-[#322e81] p-1 rounded-md" type="email" 
                        name="email" 
                        required
                    >
                    @error('email')
                        <span class="text-red-600 text-md">
                            {{ $message }} 
                        </span>
                    @enderror
                </div>
                <div class="w-full">
                    <label class="text-[#322e81]" for="">Contraseña:</label>
                    <input class="w-full outline-none cursor-pointer p-1 border border-[#322e81] rounded-md" type="password" name="password" 
                    required
                    >
                    @error('password')
                        <span class="text-red-600 text-md">
                            {{ $message }} 
                        </span>
                    @enderror
                </div>
                <div class="w-full">
                    <input class="w-full bg-[#322e81] text-white p-2 rounded-md cursor-pointer" type="submit" 
                    value="Guardar cambios">
                </div>
            </form>
        </main>
    </div>
</body>
</html>
