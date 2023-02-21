<!doctype html>
<html>
<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("Location: index.php");
    }else if($_SESSION['id'] == 1){
        header("Location: adm_menu_inicio.php");
    }
?>
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
            <div class="bg-teal-800 rounded p-8 flex mb-5 shadow flex-col items-start justify-center">
                <div class="flex items-center mb-4">
                    <img src="svg/iconos/nueva_incidencia_icon_lg.svg" class="border border-white rounded-full mr-3" width="32">
                    <h2 class="text-white text-2xl font-bold">Nueva incidencia</h2>
                </div>
                <p class="pl-10 text-white opacity-75 lg:w-1/2 sm:w-full">Solicita ayuda para que el equipo TIC pueda resolver los problemas que surgan en las aulas.</p>
            </div>

            <div class="bg-white rounded p-8 shadow grid lg:grid-cols-2 md:grid-cols-1 gap-16">
                <form>
                    <div class="flex flex-col mb-5">
                        <label for="asunto" class="font-semibold">Asunto</label>
                        <input type="text" name="asunto" id="asunto" class="bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm" placeholder="Motivo de la incidencia">
                    </div>
                    <div class="grid lg:grid-cols-3 md:grid-cols-1 gap-4 mb-5">
                        <div class="flex flex-col">
                            <label for="planta" class="font-semibold">Planta</label>
                            <select name="planta" id="planta" class="bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm">
                                <option value="0">Planta 0</option>
                                <option value="1">Planta 1</option>
                                <option value="2">Planta 2</option>
                                <option value="3">Sótano</option>
                            </select>
                        </div>
                        <div class="flex flex-col col-span-2">
                            <label for="aula" class="font-semibold">Aula</label>
                            <select name="aula" id="aula" class="bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm">
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="descripcion" class="font-semibold">Descripción</label>
                        <textarea name="descripcion" id="descripcion"  placeholder="Detalla la incidencia" cols="30" rows="10" class="bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm"></textarea>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="imagen" class="font-semibold">Imagen <span class="text-xs font-normal">(Opcional)</span></label>
                        <input type="file" name="imagen" id="imagen" class="bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm"> 
                    </div>
                    <input type="button" value="Enviar incidencia" class="px-3 py-2 w-full bg-teal-800 hover:bg-teal-900 transition ease-in rounded text-white font-semibold mt-3">
                </form>
                <img src="svg/nueva_incidencia_illustration.svg" alt="Mujer arreglando un robot" class="w-full p-8">
            </div>
        </div>
    </section>
    <script src="js/main.js"></script>
</body>

</html>