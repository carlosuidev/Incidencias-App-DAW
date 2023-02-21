<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="/dist/output.css" rel="stylesheet">-->
    <link rel="stylesheet" href="styles/general.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <aside class="shadow-md fixed top-0 bottom-0 lg:left-0 pl-5 overflow-y-auto bg-white flex flex-col justify-between">
        <div>
            <div class="flex justify-center pt-3 pb-16 pr-5 pt-6">
                <img src="svg/logo_baroja.svg" alt="IES PÍO BAROJA">
            </div>
            <p>MENÚ</p>
            <div class="mt-5">
                <a href="#" class="duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-teal-800 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/inicio_icon_sm.svg" alt="Icono de inicio" class="pr-3"> Inicio</a>
                <a href="#" class="duration-300 flex items-center font-bold text-sm rounded-l-lg transition ease-in border-4 border-gray-200 border-r-teal-800 bg-gray-200 hover:bg-gray-200 hover:bg-teal-800 hover:border-teal-800 hover:text-white px-4 py-2 flex mb-2">
                    <img src="svg/iconos/nueva_incidencia_icon_sm.svg" alt="Icono de nueva incidencia" class="pr-3"> Nueva incidencia</a>
                <a href="#" class="duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-orange-900 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/incidencias_activas_icon_sm.svg" alt="Icono de incidencias activas" class="pr-3"> Incidencias activas</a>
                <a href="#" class="duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-pink-900 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/historial_icon_sm.svg" alt="Icono de historial" class="pr-3"> Historial</a>
                <a href="#" class="duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-blue-900 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/educamadrid_icon_sm.png" alt="Icono de educamadrid" class="pr-3"> Educamadrid</a>
            </div>
        </div>
        <div class="pb-8 pr-8">
            <div class="flex flex-col pl-5">
                <a href="#" class="flex mb-3 text-sm hover:ml-3 hover:font-semibold duration-300">
                    <img src="svg/iconos/perfil_icon.svg" alt="Icono de usuario" class="mr-2"> Mi perfil</a>
                <a href="#" class="flex mb-3 text-sm hover:ml-3 hover:font-semibold duration-300">
                    <img src="svg/iconos/ajustes_icon.svg" alt="Iconod de ajustes" class="mr-2"> Ajustes</a>
                <a href="#" class="flex mb-3 text-sm text-red-500 hover:ml-3 hover:font-semibold duration-300">
                    <img src="svg/iconos/cerrar_sesion_icon.svg" alt="Icono de cerrar sesión" class="mr-2"> Cerrar sesión</a>
            </div>
            <hr class="border mt-4">
            <p class="text-xs mt-4 text-center text-gray-600">DAW &copy;2023</p>
        </div>
    </aside>
    <nav class="bg-white p-5">
        <div class="container mx-auto flex justify-between items-center">
            <h4 class="text-xl font-semibold">Bienvenid@ Raúl</h4>
            <div>
                <div class="flex items-center">
                    <img src="img/perfil.jpg" alt="Foto de perfil" width="42" class="rounded-full border border-gray-300">
                    <div class="ml-3">
                        <p class="text-sm mb">Raúl Blázquez</p>
                        <p class="text-xs text-gray-600">Profesor</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <section id="main-content" class="p-8">
        <div class="container mx-auto">
            <div class="bg-pink-900 rounded p-8 flex mb-5 shadow flex-col items-start justify-center">
                <div class="flex items-center mb-4">
                    <img src="svg/iconos/historial_icon_lg.svg" class="border border-white rounded-full mr-3" width="32">
                    <h2 class="text-white text-2xl font-bold">Historial</h2>
                </div>
                <p class="pl-10 text-white opacity-75 lg:w-1/2 sm:w-full">Revisa la información de todas las solicitudes que has realizado.</p>
            </div>

            <div class="rounded p-8 bg-white shadow">
                <div class="flex flex-wrap">
                    <div class="flex flex-col mr-5">
                        <label for="buscar" class="text-sm font-semibold">Asunto:</label>
                        <input type="text" name="buscar" id="buscar" placeholder="Ej: Ratón no funciona" class="bg-gray-100 p-2 rounded w-full border mt-2 border border-gray-300 text-sm">
                    </div>
                    <div class="flex flex-col mr-5">
                        <label for="fecha" class="text-sm font-semibold">Fecha:</label>
                        <input type="date" name="fecha" id="fecha" class="bg-gray-100 p-2 rounded w-full border mt-2 border border-gray-300 text-sm">
                    </div>
                </div>
                <hr class="my-5">
                <table class="table-auto text-left rounded-xl w-full text-sm">
                    <thead>
                        <tr class="border bg-gray-200 text-xs">
                            <th class="py-3 px-2">ASUNTO</th>
                            <th class="py-3 px-2">PLANTA</th>
                            <th class="py-3 px-2">AULA</th>
                            <th class="py-3 px-2">FECHA</th>
                            <th class="py-3 px-2">ESTADO</th>
                            <th class="py-3 px-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border border-white border-b-gray-300 hover:bg-gray-100">
                            <td class="py-3 px-2 font-semibold">Problema en el teclado</td>
                            <td class="py-3 px-2">1</td>
                            <td class="py-3 px-2">1.45</td>
                            <td class="py-3 px-2">12/05/2023</td>
                            <td class="py-3 px-2">Resuelto</td>
                            <td class="py-3 px-2"></td>
                        </tr>
                        <tr class="border border-white border-b-gray-300 hover:bg-gray-100">
                            <td class="py-3 px-2 font-semibold">Problema en el teclado</td>
                            <td class="py-3 px-2">1</td>
                            <td class="py-3 px-2">1.45</td>
                            <td class="py-3 px-2">12/05/2023</td>
                            <td class="py-3 px-2">Resuelto</td>
                            <td class="py-3 px-2"></td>
                        </tr>
                        <tr class="border border-white border-b-gray-300 hover:bg-gray-100">
                            <td class="py-3 px-2 font-semibold">Problema en el teclado</td>
                            <td class="py-3 px-2">1</td>
                            <td class="py-3 px-2">1.45</td>
                            <td class="py-3 px-2">12/05/2023</td>
                            <td class="py-3 px-2">Resuelto</td>
                            <td class="py-3 px-2"><button class="font-bold text-pink-700 hover:text-pink-900 duration-300">Ver más</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script src="js/main.js"></script>
</body>

</html>