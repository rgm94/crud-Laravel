<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
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
                <h1 class="capitalize text-3xl font-bol">Lista de usuarios</h1>
            </div>
            <a class="hidden md:flex lg:flex lg:w-md p-3 border absolute lg:right-3 md:right-3 rounded-md" 
                href="{{route('create')}}"
                >
                Crear Nuevo Usuario
            </a>

            <a class="w-full md:hidden lg:hidden border p-3 rounded-md" href="{{route('create')}}">
                Crear Nuevo Usuario
            </a>
        </header>
    </div>
</body>
</html>