<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida - CRUD Básico</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=delete" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        h1 {
            /* Asegura que los h1 se vean más grandes y claros */
            font-size: 1.875rem; /* text-3xl */
            font-weight: 700; /* font-bold */
            line-height: 2.25rem;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">
    <div id="layout" class="min-h-screen">
        
        <header class="w-full p-8 flex flex-col justify-center items-center bg-white shadow-md">
            <h1 class="text-3xl lg:text-4xl font-extrabold text-indigo-700">
                ¡Bienvenido/a a la Administración Básica de Usuarios! 🚀
            </h1>
            <a href="{{ route('index') ?? '#' }}" 
                class="mt-4 px-6 py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition duration-300">
                Ir a la Gestión de Usuarios
            </a>
        </header>
        
        <section class="w-full flex flex-col justify-center items-center gap-10 p-5 md:p-10">
            
            <article class="w-full lg:w-3/5 xl:w-1/2 p-4 bg-white rounded-lg shadow-lg">
                <p class="text-base leading-relaxed text-gray-600">
                    ¡Hola! Estás en la página de inicio de nuestra aplicación **CRUD de Usuarios**. Esta es una herramienta ágil
                    y eficiente construida sobre el framework **Laravel**. Mi objetivo es proporcionarte una interfaz
                    sencilla e intuitiva para gestionar tus datos de usuario y dominar las operaciones fundamentales.
                </p>
            </article>
            
            <article class="w-full lg:w-3/5 xl:w-1/2 flex flex-col items-center bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-bold text-center mb-5 text-indigo-600">
                    ¿Cuál es el Objetivo de esta Aplicación? 🎯
                </h2>
                
                <p class="mb-4 text-center text-gray-700">
                    El propósito principal aquí es dominar el **flujo de datos** entre tu aplicación Laravel y la base de
                    datos, sin distracciones de lógica avanzada. Nos centramos en:
                </p>
                
                <div class="w-full flex flex-wrap justify-center gap-4 mt-3">
                    <div class="w-full sm:w-1/4 flex flex-col gap-2 justify-center items-center p-4 border border-indigo-200 bg-indigo-50 rounded-lg shadow-sm">
                        <span class="material-symbols-outlined text-4xl text-indigo-600">add_circle</span>
                        <span class="font-semibold text-sm">Create (Crear)</span>
                    </div>
                    <div class="w-full sm:w-1/4 flex flex-col gap-2 justify-center items-center p-4 border border-green-200 bg-green-50 rounded-lg shadow-sm">
                        <span class="material-symbols-outlined text-4xl text-green-600">update</span>
                        <span class="font-semibold text-sm">Update (Actualizar)</span>
                    </div>
                    <div class="w-full sm:w-1/4 flex flex-col gap-2 justify-center items-center p-4 border border-red-200 bg-red-50 rounded-lg shadow-sm">
                        <span class="material-symbols-outlined text-4xl text-red-600">delete</span>
                        <span class="font-semibold text-sm">Delete (Eliminar)</span>
                    </div>
                </div>
                
                <strong class="mt-4 text-sm text-gray-500">
                    Nota: La función de **Leer (Read)** se hace de forma inherente al listar y editar un usuario.
                </strong>
            </article>

            <article class="w-full lg:w-3/5 xl:w-1/2 flex flex-col items-center gap-4">
                <h2 class="text-2xl font-bold text-center text-indigo-600">
                    Lo que Puedes Practicar Aquí 🛠️
                </h2>
                <span class="text-center text-gray-700">Esta es una herramienta ideal para entender cómo Laravel maneja los siguientes aspectos:</span>

                <div class="relative overflow-x-auto w-full border border-gray-200 rounded-lg shadow-md">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 w-1/3">
                                    Aspecto de Laravel
                                </th>
                                <th scope="col" class="px-6 py-3 w-2/3">
                                    Lo que practicarás
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                                    Modelos y Migraciones
                                </th>
                                <td class="px-6 py-4">
                                    Crear la tabla `users` y definir el **modelo** que interactúa con ella.
                                </td>
                            </tr>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                                    Formularios y Peticiones
                                </th>
                                <td class="px-6 py-4">
                                    Enviar datos al servidor y manejar las peticiones **POST** y **PUT/PATCH**.
                                </td>
                            </tr>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                                    Validación Básica
                                </th>
                                <td class="px-6 py-4">
                                    Asegurar que los campos (como el nombre y el correo) tengan el formato correcto.
                                </td>
                            </tr>
                            <tr class="bg-white hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                                    Rutas y Controladores
                                </th>
                                <td class="px-6 py-4">
                                    Conectar las URL (rutas) a los métodos del controlador que realizan las
                                    acciones (guardar, modificar, borrar).
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </article>

        </section>
    </div>
    
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</body>

</html>