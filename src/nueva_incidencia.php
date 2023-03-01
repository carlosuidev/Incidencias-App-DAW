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
    <link rel="shortcut icon" href="svg/favicon.svg" type="image/x-icon">
    <script
        src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous"></script>
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
                <a href="menu_inicio.php" class="duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-teal-800 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/inicio_icon_sm.svg" alt="Icono de inicio" class="pr-3"> Inicio</a>
                <a href="nueva_incidencia.php" class="duration-300 flex items-center font-bold text-sm rounded-l-lg transition ease-in border-4 border-gray-200 border-r-teal-800 bg-gray-200 hover:bg-gray-200 hover:bg-teal-800 hover:border-teal-800 hover:text-white px-4 py-2 flex mb-2">
                    <img src="svg/iconos/nueva_incidencia_icon_sm.svg" alt="Icono de nueva incidencia" class="pr-3"> Nueva incidencia</a>
                <a href="incidencias_activas.php" class="tracking-tight duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-orange-900 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/incidencias_activas_icon_sm.svg" alt="Icono de incidencias activas" class="pr-3"> Incidencias activas</a>
                <a href="historial.php" class="duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-pink-900 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/historial_icon_sm.svg" alt="Icono de historial" class="pr-3"> Historial</a>
                <a href="https://aulavirtual33.educa.madrid.org/ies.piobaroja.madrid/" class="duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-blue-900 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/educamadrid_icon_sm.png" alt="Icono de educamadrid" class="pr-3"> Educamadrid</a>
            </div>
        </div>
        <div class="pb-8 pr-8 pt-32">
            <div class="p-3 bg-gray-800 rounded mb-5 flex justify-center items-center rounded-lg">
                <img id="iconoTiempo" width="42">
                <div class="ml-3">
                    <p id="tiempoNum" class="text-white text-xl font-light"></p>
                    <p class="text-xs text-white opacity-80 font-light">Madrid</p>
                </div>
            </div>
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
                        <p class="text-xs text-gray-400"><?php echo $_SESSION["rol"] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <section id="main-content" class="p-3 lg:ml-56 md:m-0 ml-0">
        <div class="container mx-auto">
            <div class="bg-teal-800 rounded mt-2 p-8 flex mb-5 shadow flex-col items-start justify-center">
                <div class="flex items-center mb-4">
                    <img src="svg/iconos/nueva_incidencia_icon_lg.svg" class="border border-white rounded-full mr-3" width="32">
                    <h2 class="text-white text-2xl font-bold">Nueva incidencia</h2>
                </div>
                <p class="pl-10 text-white opacity-75 lg:w-1/2 sm:w-full">Solicita ayuda para que el equipo TIC pueda resolver los problemas que surgan en las aulas.</p>
            </div>

            <div class="bg-white rounded p-8 shadow grid lg:grid-cols-2 md:grid-cols-1 gap-16">
                
                <form>
                <p id="msgError" class="hidden mb-5 text-center text-sm p-3 bg-red-200 rounded border text-red-700 border-red-700">No se ha podido procesar su solicitud. Si persigue contacte con el administrador.</p>
                    <div class="flex flex-col mb-5">
                        <label for="asunto" class="font-semibold">Asunto</label>
                        <input type="text" name="asunto" id="asunto" placeholder="Motivo de la incidencia" class="bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm">
                        <small id="asuntoAlert" class="hidden text-red-400 mt-1 pl-2">Debes escribir un asunto válido</small>
                    </div>
                    <div class="grid lg:grid-cols-2 md:grid-cols-1 gap-4 mb-5">
                        <div class="flex flex-col">
                            <label for="aula" class="font-semibold">Aula</label>
                            <select name="aula" id="aula" class="bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm">
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label for="grupo" class="font-semibold">Grupo</label>
                            <select name="grupo" id="grupo" class="bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm">
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="tipo" class="font-semibold">Tipo de incidencia</label>
                        <select name="tipo" id="tipo" class="bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm">
                            <option value="1">Hardware</option>
                            <option value="2">Software</option>
                            <option value="3">Conectividad</option>
                            <option value="4">Recursos EducaMadrid</option>
                            <option value="5">PDI</option>
                            <option value="6">Impresión</option>
                        </select>
                    </div>
                    <div class="flex flex-col mb-5">
                        <label for="descripcion" class="font-semibold">Descripción</label>
                        <textarea name="descripcion" id="descripcion" placeholder="Detalla la incidencia" cols="30" rows="10" class="bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm"></textarea>
                        <small id="descripcionAlert" class="hidden text-red-400 mt-1 pl-2">Debes escribir una descripción válida</small>
                    </div>
                    <input type="hidden" id="profesor" value="<?php echo $_SESSION['id'] ?>">
                    <input type="button" id="crearIncidencia" value="Enviar incidencia" class="px-3 py-2 w-full bg-teal-800 hover:bg-teal-900 transition ease-in rounded text-white font-semibold mt-3">
                </form>
                <img src="svg/nueva_incidencia_illustration.svg" alt="Mujer arreglando un robot" class="animate__animated animate__pulse animate__delay-1s w-full p-8">
            </div>
        </div>
    </section>
    <script src="js/main_user.js"></script>
    <script src="js/nueva_incidencia.js"></script>
    <script src="js/extras_jquery.js"></script>
</body>

</html>