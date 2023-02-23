<!doctype html>
<html>
<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
} else if ($_SESSION['id'] == 1) {
    header("Location: adm_menu_inicio.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="/dist/output.css" rel="stylesheet">-->
    <link rel="stylesheet" href="styles/general.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="svg/favicon.svg" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <title>Sistema de Incidencias del IES Pío Baroja</title>
</head>

<body class="bg-gray-100 text-gray-800">
    
    <aside class="hidden sm:flex w-full sm:w-56 shadow-md fixed top-0 bottom-0 lg:left-0 pl-5 overflow-y-auto bg-white flex flex-col justify-between">
        <input type="hidden" id="idProfesor" value="<?php echo $_SESSION['id'] ?>">
        <div>
            <div class="sm:hidden flex pt-8 pr-8 justify-end cursor-pointer" id="close">
                <img src="svg/iconos/cross.svg" alt="Cerrar">
            </div>
            <div class="flex justify-center pt-3 pb-16 pr-5 pt-6 cursor-pointer" id="inicioLogo">
                <img src="svg/logo_baroja.svg" alt="IES PÍO BAROJA">
            </div>
            <p>MENÚ</p>
            <div class="mt-5">
                <a href="menu_inicio.php" class="duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-teal-800 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/inicio_icon_sm.svg" alt="Icono de inicio" class="pr-3"> Inicio</a>
                <a href="nueva_incidencia.php" class="duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-teal-800 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/nueva_incidencia_icon_sm.svg" alt="Icono de nueva incidencia" class="pr-3"> Nueva incidencia</a>
                <a href="incidencias_activas.php" class="duration-300 flex items-center font-bold tracking-tight text-sm rounded-l-lg transition ease-in border-4 border-gray-200 border-r-orange-900 bg-gray-200 hover:bg-gray-200 hover:bg-orange-900 hover:border-orange-900 hover:text-white px-4 py-2 flex mb-2">
                    <img src="svg/iconos/incidencias_activas_icon_sm.svg" alt="Icono de incidencias activas" class="pr-3"> Incidencias activas</a>
                <a href="historial.php" class="duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-pink-900 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/historial_icon_sm.svg" alt="Icono de historial" class="pr-3"> Historial</a>
                <a href="https://aulavirtual33.educa.madrid.org/ies.piobaroja.madrid/" class="duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-blue-900 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/educamadrid_icon_sm.png" alt="Icono de educamadrid" class="pr-3"> Educamadrid</a>
            </div>
        </div>
        <div class="pb-8 pr-8 pt-32">
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
    <nav class="bg-white p-5 ml-0 sm:ml-56">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex">
                <button class="mr-3" id="hamburger"><img src="svg/iconos/hamburger.svg" alt="Abrir menú"></button>
                <h4 class="text-xl font-semibold sm:block hidden">Bienvenid@ <?php echo $_SESSION["nombre"] ?></h4>
            </div>
            <div>
                <div class="flex cursor-pointer" id="perfilDatos">
                    <img src="svg/iconos/profile.svg" alt="Usuario" class="mr-3">
                    <div>
                        <p class="text-sm font-medium flex"><?php echo $_SESSION["nombre"] ?><span class="sm:block hidden ml-1"><?php echo $_SESSION["apellidos"] ?></span></p>
                        <p class="text-xs text-gray-400"><?php echo $_SESSION["rol"] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <section id="main-content" class="p-8 ml-0 sm:ml-56">
        <div class="container mx-auto">
            <div class="bg-orange-900 rounded p-8 flex mb-5 shadow flex-col items-start justify-center">
                <div class="flex items-center mb-4">
                    <img src="svg/iconos/incidencias_activas_icon_lg.svg" class="border border-white rounded-full mr-3" width="32">
                    <h2 class="text-white text-2xl font-bold">Incidencias activas</h2>
                </div>
                <p class="pl-10 text-white opacity-75 lg:w-1/2 sm:w-full">Controla el estado de tus solicitudes y recibe respuestas por parte del equipo de administración.</p>
            </div>

            <div id="listaIncidencias" class="p-8 grid lg:grid-cols-2 md:grid-cols-1 gap-5">
            </div>
        </div>
    </section>
    <script src="js/main_user.js"></script>
    <script src="js/extras_jquery.js"></script>
    <script src="js/incidencias_usuario.js"></script>
    <script src="js/components/incidenciaBox.js"></script>
</body>

</html>