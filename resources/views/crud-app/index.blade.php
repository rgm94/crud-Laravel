<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <script src="https://cdn.tailwindcss.com"></script>
    </head>
<body class="font-sans antialiased">
    <div id="layout" class="min-h-screen w-full flex flex-col items-center bg-gray-100 pb-10">
        
        <header class="w-full p-4 flex flex-col md:flex-row gap-4 justify-center items-center 
        bg-white shadow-lg border-b-4 border-indigo-700 text-center relative"
        >
            <div class="w-full flex justify-center items-center gap-3">
                <svg class="h-10 w-10 text-indigo-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                <h1 class="text-4xl font-extrabold text-indigo-800 tracking-tight">Lista de Usuarios</h1>
            </div>
            
            <a class="hidden md:inline-flex lg:absolute right-4 top-1/2 transform -translate-y-1/2 p-3 text-white 
            bg-indigo-700 hover:bg-indigo-600 transition duration-300 rounded-lg shadow-md font-semibold text-sm" 
                href="{{route('create')}}"
            >
                Crear nuevo usuario
            </a>

            <a class="w-full md:hidden p-3 text-white rounded-lg bg-indigo-700 hover:bg-indigo-600 transition duration-300 shadow-md font-semibold" href="{{route('create')}}">
                Crear nuevo usuario
            </a>
        </header>

        @if (session('status'))
            <div class="w-full max-w-5xl mt-6">
                <div class="p-4 bg-green-100 text-green-700 border border-green-300 rounded-lg font-medium text-center">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        @if (count($users) < 1)
            <div class="w-full lg:w-1/2 mt-12 p-6 bg-white shadow-xl rounded-xl text-center">
                <p class="text-xl font-semibold text-gray-700 mb-4">¡Vaya! Parece que no hay usuarios registrados.</p>
                <div class="p-2">
                    <img class="rounded-md mx-auto" src="{{ asset('images/no-users-banner.png') }}" alt="No hay usuarios registrados">
                </div>
                <a href="{{route('create')}}" class="mt-4 inline-block bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg hover:bg-indigo-600 transition">
                    Sé el primero en crear uno.
                </a>
            </div>
            
        @else
        <section class="w-full p-4 mt-8 max-w-7xl mx-auto flex flex-wrap justify-center gap-6">
            
            @foreach ($users as $user)
            <article class="w-full sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] bg-white p-6 rounded-xl shadow-lg border-t-4 border-indigo-500 
            flex flex-col gap-3 transform hover:shadow-xl hover:scale-[1.02] transition duration-300">
                
                <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                    <span class="text-xs font-bold uppercase text-indigo-700 tracking-wider">ID: {{ $user->id }}</span>
                    <div class="flex gap-2">
                        <a href="{{route('edit',encrypt($user->id))}}" class="text-indigo-600 hover:text-indigo-900 p-1 rounded-full hover:bg-indigo-100 transition duration-150" title="Editar">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M5 8a4 4 0 1 1 7.796 1.263l-2.533 2.534A4 4 0 0 1 5 8Zm4.06 5H7a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h2.172a2.999 2.999 0 0 1-.114-1.588l.674-3.372a3 3 0 0 1 .82-1.533L9.06 13Zm9.032-5a2.907 2.907 0 0 0-2.056.852L9.967 14.92a1 1 0 0 0-.273.51l-.675 3.373a1 1 0 0 0 1.177 1.177l3.372-.675a1 1 0 0 0 .511-.273l6.07-6.07a2.91 2.91 0 0 0-.944-4.742A2.907 2.907 0 0 0 18.092 8Z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <form action="{{route('delete',encrypt($user->id))}}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 p-1 rounded-full hover:bg-red-100 transition duration-150" title="Eliminar">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <p class="text-gray-900 text-lg font-bold">
                    <span class="text-indigo-700 font-extrabold">Nombre:</span> {{ $user->name }}
                </p>
                <p class="text-gray-600 break-words">
                    <span class="text-indigo-700 font-semibold">Email:</span> {{ $user->email }}
                </p>

                <div class="text-xs text-gray-500 pt-3 border-t border-gray-100 mt-auto">
                    <p class="mb-1">
                        <strong class="font-semibold text-indigo-500">Creado:</strong> {{ $user->created_at }}
                    </p>
                    <p>
                        <strong class="font-semibold text-indigo-500">Actualizado:</strong> {{ $user->updated_at }}
                    </p>
                </div>
            </article>
            @endforeach
        </section>
        @endif
    </div>
</body>
</html>