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
                <a href="adm_menu_inicio.php" class="duration-300 flex items-center text-sm rounded-l-lg transition ease-in border-4 border-white hover:bg-gray-200 hover:bg-teal-800 hover:border-teal-800 hover:text-white px-4 py-2 flex mb-2">
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
            <div class="mt-2 bg-white rounded p-8">
                <div class="flex justify-between items-center flex-wrap">
                    <div class="flex">
                        <img src="svg/iconos/profile.svg" alt="Perfil" width="42" class="rounded-full mr-3">
                        <div>
                            <h2 class="text-xl font-semibold"><?php echo $_SESSION['nombre']." ".$_SESSION['apellidos'] ?></h2>
                            <p class="text-sm text-gray-600"><?php echo $_SESSION['rol'] ?></p>
                        </div>
                    </div>
                </div>
                <hr class="border my-5">
                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 p-5">
                    <input type="hidden" name="idProfesor" id="idProfesor" value="<?php echo $_SESSION['id'] ?>">
                    <p class="font-semibold">Usuario: <span class="font-normal" id="datoUsuario"></span></p>
                    <p class="font-semibold">Nombre: <span class="font-normal" id="datoNombre"></span></p>
                    <p class="font-semibold">Apellidos: <span class="font-normal" id="datoApellidos"></span></p>
                    <p class="font-semibold">Departamento: <span class="font-normal" id="datoDepartamento"></span></p>
                    <p class="font-semibold">Correo electrónico: <span class="font-normal" id="datoCorreo"></span></p>
                    <p class="font-semibold">Contraseña: <span class="font-normal">********</span></p>
                </div>

                <form class="bg-white rounded p-5 mx-auto mt-16 lg:w-3/6 md:w-full sm:w-full">
                    <p id="salidaUpdate"></p>
                    <h3 class=" font-bold text-xl">Actualiza tu contraseña</h3>
                    <hr class="my-5">
                    <div class="flex flex-col mb-5">
                        <label for="contrasenaActual" class="font-semibold">Contraseña actual</label>
                        <input type="password" name="contrasenaActual" id="contrasenaActual"
                        class="bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm"
                        placeholder="Tu contraseña actual">
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="contrasenaNueva" class="font-semibold">Contraseña nueva</label>
                        <input type="password" name="contrasenaNueva" id="contrasenaNueva"
                            class="bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm"
                            placeholder="Tu contraseña nueva">
                        <small id="contrasenaAlert" class="hidden text-red-400 mt-1 pl-2">Escriba una contraseña con mínimo una mayúscula y un número</small>
                    </div>
                    <input type="button" id="actualizar" value="Actualizar datos" class="px-3 py-2 w-full bg-teal-800 hover:bg-teal-900 transition ease-in rounded text-white font-semibold mt-8">
                </form>
            </div>
        </div>
    </section>
    <script src="js/admin/main_admin.js"></script>
    <script src="js/extras_jquery.js"></script>
    <script src="js/perfil.js"></script>
</body>

</html>