<!doctype html>
<html>
<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location: index.php");
    } else if ($_SESSION['id'] != 1) {
        header("Location: menu_inicio.php");
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="/dist/output.css" rel="stylesheet">-->
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/animaciones.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="svg/favicon.svg" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <title>Sistema de Incidencias del IES Pío Baroja</title>
</head>

<body class="bg-gray-100 text-gray-800">
    <aside class="lg:flex md:hidden hidden lg:w-56 md:w-full w-full shadow-md fixed top-0 bottom-0 lg:left-0 pl-5 overflow-y-auto bg-white flex flex-col justify-between">
        <input type="hidden" id="idProfesor" value="<?php echo $_SESSION['id'] ?>">
        <div>
            <div class="lg:hidden md:flex flex pt-8 pr-8 justify-end cursor-pointer" id="close">
                <img src="svg/iconos/cross.svg" alt="Cerrar">
            </div>
            <div class="flex justify-center pt-3 pb-16 pr-5 pt-6 cursor-pointer" id="inicioLogo">
                <img src="svg/logo_baroja.svg" alt="IES PÍO BAROJA">
            </div>
            <p>MENÚ</p>
            <div class="mt-5">
                <a href="adm_menu_inicio.php" class="duration-300 flex items-center font-bold text-sm rounded-l-lg transition ease-in border-4 border-gray-200 border-r-teal-800 bg-gray-200 hover:bg-gray-200 hover:bg-teal-800 hover:border-teal-800 hover:text-white px-4 py-2 flex mb-2">
                    <img src="svg/iconos/inicio_icon_sm.svg" alt="Icono de inicio" class="pr-3"> Inicio</a>
                <a href="adm_incidencias.php" class="tracking-tight duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-orange-900 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/incidencias_activas_icon_sm.svg" alt="Icono de resolver incidencias" class="pr-3">Resolver incidencias</a>
                <a href="adm_historial.php" class="duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-pink-900 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/historial_icon_sm.svg" alt="Icono de historial" class="pr-3"> Historial</a>
                <a href="https://aulavirtual33.educa.madrid.org/ies.piobaroja.madrid/" class="duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-blue-900 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/educamadrid_icon_sm.png" alt="Icono de educamadrid" class="pr-3"> Educamadrid</a>
            </div>
        </div>
        <div class="pb-8 pr-8 pt-32">
            <div class="p-3 bg-gray-800 rounded mb-5 flex justify-center items-center rounded-lg" id="cajaTiempo">
                <img id="iconoTiempo" width="42">
                <div class="ml-3">
                    <p id="tiempoNum" class="text-white text-xl font-light"></p>
                    <p class="text-xs text-white opacity-80 font-light">Madrid</p>
                </div>
            </div>
            <div class="flex flex-col pl-5">
                <a href="adm_perfil.php" class="flex mb-3 text-sm hover:ml-3 hover:font-semibold duration-300">
                    <img src="svg/iconos/perfil_icon.svg" alt="Icono de usuario" class="mr-2"> Mi perfil</a>
                <a id="cerrarSesion" class="flex mb-3 text-sm hover:ml-3 text-red-700 hover:font-semibold duration-300 cursor-pointer">
                    <img src="svg/iconos/cerrar_sesion_icon.svg" alt="Icono de cerrar sesión" class="mr-2"> Cerrar sesión</a>
            </div>
            <hr class="border mt-4">
            <p class="text-xs mt-4 text-center text-gray-600">DAW &copy;2023</p>
        </div>
    </aside>
    <nav class="bg-white p-5 lg:ml-56 md:m-0 ml-0">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <button class="mr-3" id="hamburger"><img src="svg/iconos/hamburger.svg" class="lg:hidden md:block block" alt="Abrir menú"></button>
                <button class="lg:hidden md:block block" id="inicioRespLogo"><img src="svg/favicon.svg" alt="Pío"></button>
                <h4 class="text-xl font-semibold lg:block md:hidden hidden" id="welcome">Bienvenid@ <?php echo $_SESSION["nombre"] ?></h4>
            </div>
            <div>
                <div class="flex cursor-pointer" id="perfilDatos">
                    <img src="svg/iconos/profile.svg" alt="Usuario" class="mr-3">
                    <div>
                        <p class="text-sm font-medium flex"><?php echo $_SESSION["nombre"] ?><span class="ml-1 lg:block md:hidden hidden"><?php echo $_SESSION["apellidos"] ?></span></p>
                        <p class="text-xs text-orange-400"><?php echo $_SESSION["rol"] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <section id="main-content" class="p-3 lg:ml-56 md:m-0 ml-0">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-2">
                <div id="incidencias" class="cursor-pointer py-4 px-8 bg-orange-100 w-full overflow-hidden border border-orange-300 rounded-xl hover:border-orange-900 hover:shadow-lg transition duration-300 flex justify-between items-center flex-wrap">
                    <div>
                        <h2 class="text-2xl font-bold text-orange-900 mb-3">Resolver incidencias</h2>
                        <img src="svg/iconos/incidencias_activas_icon_lg.svg" alt="Icono de resolver incidencias">
                    </div>
                    <div class="flex justify-end img-btn">
                        <img src="svg/incidencias_activas_illustration.svg" alt="Robot utilanzdo tecnología futurista" width="196px">
                    </div>
                </div>
                <div id="historialIncidencias" class="cursor-pointer py-4 px-8 bg-pink-100 w-full overflow-hidden border border-pink-300 rounded-xl hover:border-pink-900 hover:shadow-lg transition duration-300 flex justify-between items-center flex-wrap">
                    <div>
                        <h2 class="text-2xl font-bold text-pink-900 mb-3">Historial</h2>
                        <img src="svg/iconos/historial_icon_lg.svg" alt="Icono de historial">
                    </div>
                    <div class="flex justify-end img-btn">
                        <img  src="svg/historial_illustration.svg" alt="Mujer revisando una pizarra" width="196px">
                    </div>
                </div>
                <div id="educamadridIncidencias" class="cursor-pointer py-9 px-8 bg-blue-100 w-full overflow-hidden border border-blue-300 rounded-xl hover:border-blue-900 hover:shadow-lg transition duration-300 flex justify-between items-center flex-wrap">
                    <div>
                        <h2 class="text-2xl font-bold text-blue-900 mb-3">Educamadrid</h2>
                        <img src="svg/iconos/educamadrid_icon_lg.svg" alt="Icono de Educamadrid">
                    </div>
                    <div class="flex justify-end img-btn">
                        <img src="svg/educamadrid_illustration.png" alt="Educamadrid logotipo" width="128px">
                    </div>
                </div>
                <div class="pt-16 pb-14 bg-white w-full overflow-hidden border border-gray-400 rounded-xl transition duration-300 flex justify-center items-center opacity-50" id="proximamente">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3">Próximamente</h2>
                </div>
            </div>
        </div>
    </section>
    <script src="js/admin/main_admin.js"></script>
    <script src="js/extras_jquery.js"></script>
</body>

</html>