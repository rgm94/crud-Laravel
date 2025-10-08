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
        @if (count($users) < 1)
            <div class="w-full lg:w-1/2 p-4 border-2 text-center">
                <strong>En estos momentos no tenemos usuarios registrados en la base de datos</strong>
            </div>
        @else
            <section class="w-full flex gap-4 p-2">
                @foreach ($users as $user)
                    <article class="w-full rounded-md gap-3 flex flex-col lg:w-1/2 lg:flex lg:flex-row lg:justify-around p-2 border-2">
                        <div class="flex flex-col justify-center items-center">
                            <strong>Id</strong>
                            <p>{{ $user->id }}</p>
                        </div>
                        <div class="flex flex-col justify-center lg:items-center">
                            <strong>Nombre</strong>
                            <p>{{ $user->name }}</p>
                        </div>
                        <div class="flex flex-col justify-center lg:items-center">
                            <strong>Email</strong>
                            <p>{{ $user->email }}</p>
                        </div>
                        <div class="flex flex-col justify-center lg:items-center">
                            <strong>Fecha de creación</strong>
                            <p>{{ $user->created_at }}</p>
                        </div>
                        <div class="flex flex-col justify-center lg:items-center">
                            <strong>Fecha de Actualización</strong>
                            <p>{{ $user->updated_at }}</p>
                        </div>
                        <a class="bg-black text-white p-2 rounded-md text-center flex justify-center items-center" 
                            href="{{route('edit',encrypt($user->id))}}"
                            >
                            Editar
                        </a>
                        <a class="bg-black text-white p-2 rounded-md flex justify-center items-center" href="#">
                            Eliminar
                        </a>
                    </article>
                @endforeach
            </section>
        @endif
    </div>
</body>
</html>