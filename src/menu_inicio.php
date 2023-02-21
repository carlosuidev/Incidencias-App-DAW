<!doctype html>
<html>
<?php
    session_start();
    if(isset($_SESSION['id']) && $_SESSION['id'] == 1){
        header("Location: adm_menu_inicio.php");
    }else if(!isset($_SESSION['existe'])){
        header("Location: index.php");
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="/dist/output.css" rel="stylesheet">-->
    <link rel="stylesheet" href="styles/general.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="svg/favicon.svg" type="image/x-icon">
</head>

<body class="bg-gray-100 text-gray-800">
    <aside class="shadow-md fixed top-0 bottom-0 lg:left-0 pl-5 overflow-y-auto bg-white flex flex-col justify-between">
        <div>
            <div class="flex justify-center pt-3 pb-16 pr-5 pt-6">
                <img src="svg/logo_baroja.svg" alt="IES PÍO BAROJA">
            </div>
            <p>MENÚ</p>
            <div class="mt-5">
                <a href="menu_inicio.php" class="duration-300 flex items-center font-bold text-sm rounded-l-lg transition ease-in border-4 border-gray-200 border-r-teal-800 bg-gray-200 hover:bg-gray-200 hover:bg-teal-800 hover:border-teal-800 hover:text-white px-4 py-2 flex mb-2">
                    <img src="svg/iconos/inicio_icon_sm.svg" alt="Icono de inicio" class="pr-3"> Inicio</a>
                <a href="nueva_incidencia.php" class="duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-teal-800 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/nueva_incidencia_icon_sm.svg" alt="Icono de nueva incidencia" class="pr-3"> Nueva incidencia</a>
                <a href="incidencias_activas.php" class="duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-orange-900 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/incidencias_activas_icon_sm.svg" alt="Icono de incidencias activas" class="pr-3"> Incidencias activas</a>
                <a href="historial.php" class="duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-pink-900 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/historial_icon_sm.svg" alt="Icono de historial" class="pr-3"> Historial</a>
                <a href="https://aulavirtual33.educa.madrid.org/ies.piobaroja.madrid/" class="duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-blue-900 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/educamadrid_icon_sm.png" alt="Icono de educamadrid" class="pr-3"> Educamadrid</a>
            </div>
        </div>
        <div class="pb-8 pr-8">
            <div class="flex flex-col pl-5">
                <a href="perfil.php" class="flex mb-3 text-sm hover:ml-3 hover:font-semibold duration-300">
                    <img src="svg/iconos/perfil_icon.svg" alt="Icono de usuario" class="mr-2"> Mi perfil</a>
                <a id="cerrarSesion" class="flex mb-3 text-sm hover:ml-3 text-red-700 hover:font-semibold duration-300 cursor-pointer">
                    <img src="svg/iconos/cerrar_sesion_icon.svg" alt="Icono de cerrar sesión" class="mr-2"> Cerrar sesión</a>
            </div>
            <hr class="border mt-4">
            <p class="text-xs mt-4 text-center text-gray-600">DAW &copy;2023</p>
        </div>
    </aside>
    <nav class="bg-white p-5">
        <div class="container mx-auto flex justify-between items-center">
            <h4 class="text-xl font-semibold">Bienvenid@ <?php echo $_SESSION["nombre"] ?></h4>
            <div>
                <div>
                    <img src="" alt="">
                    <div>
                        <p class="text-sm"><?php echo $_SESSION["nombre"];echo " ".$_SESSION["apellidos"] ?></p>
                        <p class="text-xs text-gray-600"><?php echo $_SESSION["rol"]?></p>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <section id="main-content" class="p-8">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div id="nuevaIncidencia" class="cursor-pointer py-4 px-8 bg-green-100 w-full overflow-hidden border border-emerald-300 rounded-xl hover:border-teal-900 hover:shadow-lg transition duration-300 flex justify-between items-center flex-wrap">
                    <div>
                        <h2 class="text-2xl font-bold text-teal-900 mb-3">Nueva incidencia</h2>
                        <img src="svg/iconos/nueva_incidencia_icon_lg.svg" alt="Icono de nueva incidencia">
                    </div>
                    <div>
                        <img  src="svg/nueva_incidencia_illustration.svg" alt="Mujer reperando un robot">
                    </div>
                    
                </div>
                <div id="incidenciasActivas" class="cursor-pointer py-4 px-8 bg-orange-100 w-full overflow-hidden border border-orange-300 rounded-xl hover:border-orange-900 hover:shadow-lg transition duration-300 flex justify-between items-center flex-wrap">
                    <div>
                        <h2 class="text-2xl font-bold text-orange-900 mb-3">Incidencias activas</h2>
                        <img src="svg/iconos/incidencias_activas_icon_lg.svg" alt="Icono de incidencias activas">
                    </div>
                    <div class="justify-items-end">
                        <img  src="svg/incidencias_activas_illustration.svg" alt="Robot utilanzdo tecnología futurista">
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                <div id="historialIncidencias" class="cursor-pointer py-4 px-8 bg-pink-100 w-full overflow-hidden border border-pink-300 rounded-xl hover:border-pink-900 hover:shadow-lg transition duration-300 flex justify-between items-center flex-wrap">
                    <div>
                        <h2 class="text-2xl font-bold text-pink-900 mb-3">Historial</h2>
                        <img src="svg/iconos/historial_icon_lg.svg" alt="Icono de historial">
                    </div>
                    <div class="justify-items-end">
                        <img  src="svg/historial_illustration.svg" alt="Mujer revisando una pizarra">
                    </div>
                </div>
                <div id="educamadridIncidencias" class="cursor-pointer py-4 px-8 bg-blue-100 w-full overflow-hidden border border-blue-300 rounded-xl hover:border-blue-900 hover:shadow-lg transition duration-300 flex justify-between items-center flex-wrap">
                    <div>
                        <h2 class="text-2xl font-bold text-blue-900 mb-3">Educamadrid</h2>
                        <img src="svg/iconos/educamadrid_icon_lg.svg" alt="Icono de Educamadrid">
                    </div>
                    <div class="justify-items-end">
                        <img  src="svg/educamadrid_illustration.png" alt="Educamadrid logotipo">
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-1 mt-4">
                <div class="pt-16 pb-14 bg-white w-full overflow-hidden border border-gray-400 rounded-xl transition duration-300 flex justify-center items-center opacity-50">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3">Próximamente</h2>
                </div>
            </div>
        </div>
    </section>
    <script src="js/main.js"></script>
</body>

</html>