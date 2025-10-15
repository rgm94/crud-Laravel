<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
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
                <h1 class="capitalize text-3xl font-bol text-[#322e81]">Lista de usuarios</h1>
            </div>
            <a class="hidden md:flex lg:flex lg:w-md p-3 absolute lg:right-3 md:right-3 text-white rounded-md bg-[#322e81]" 
                href="{{route('create')}}"
                >
                Crear nuevo usuario
            </a>
            <a class="w-full md:hidden lg:hidden p-3 bg-[#322e81] text-white rounded-md" href="{{route('create')}}">
                Crear nuevo usuario
            </a>
        </header>
        @if (count($users) < 1)
            <div class="p-2 hidden md:w-1/2 lg:w-1/2 lg:flex md:flex">
                <img class="rounded-md" src="{{ asset('images/no-users-banner.png') }}" alt="No hay usuarios registrados">
            </div>
        @else
        <section class="w-full flex justify-center flex-wrap gap-4 p-2">
            @foreach ($users as $user)
                <article class="w-full rounded-md gap-3 flex flex-col lg:w-1/2 lg:flex lg:flex-row lg:justify-around 
                    border border-[#322e81] p-2"
                >
                    <div class="flex flex-col justify-center items-center">
                        <strong class="text-[#322e81]">Id</strong>
                        <p>{{ $user->id }}</p>
                    </div>
                    <div class="flex flex-col justify-center lg:items-center">
                        <strong class="text-[#322e81]">Nombre</strong>
                        <p>{{ $user->name }}</p>
                    </div>
                    <div class="flex flex-col justify-center lg:items-center">
                        <strong class="text-[#322e81]">Email</strong>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="flex flex-col justify-center lg:items-center">
                        <strong class="text-[#322e81]">Fecha de creación</strong>
                        <p>{{ $user->created_at }}</p>
                    </div>
                    <div class="flex flex-col justify-center lg:items-center">
                        <strong class="text-[#322e81]">Fecha de Actualización</strong>
                        <p>{{ $user->updated_at }}</p>
                    </div>
                    <a class="bg-[#322e81] p-2 rounded-md text-center flex justify-center items-center" 
                        href="{{route('edit',encrypt($user->id))}}"
                        >
                        <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" 
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 
                            0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 
                            13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 
                            1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 
                            18.092 8Z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <form class="bg-[#322e81] p-2 rounded-md flex justify-center items-center cursor-pointer" 
                        action="{{route('delete',encrypt($user->id))}}" 
                        method="POST"
                        >
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" 
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 
                                2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 
                                6h4V4h-4v2Zm1 4a1 1 0 1
                                0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" 
                                clip-rule="evenodd"
                                />
                            </svg>
                        </button>
                    </form>
                </article>
            @endforeach
        </section>
        @endif
    </div>
</body>
</html>