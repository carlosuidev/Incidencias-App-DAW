<!doctype html>
<html>
<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.php");
} else if ($_SESSION['id'] == 1) {
    header("Location: adm_menu_inicio.php");
}

include('server/ver_img_perfil.php');
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
                <a href="menu_inicio.php" class="duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-teal-800 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/inicio_icon_sm.svg" alt="Icono de inicio" class="pr-3"> Inicio</a>
                <a href="nueva_incidencia.php" class="duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-teal-800 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/nueva_incidencia_icon_sm.svg" alt="Icono de nueva incidencia" class="pr-3"> Nueva incidencia</a>
                <a href="incidencias_activas.php" class="tracking-tight duration-300 flex items-center text-sm rounded-l-lg transition ease-in hover:bg-orange-900 hover:text-white px-5 py-3 flex mb-2">
                    <img src="svg/iconos/incidencias_activas_icon_sm.svg" alt="Icono de incidencias activas" class="pr-3"> Incidencias activas</a>
                <a href="historial.php" class="duration-300 flex items-center font-bold text-sm rounded-l-lg transition ease-in border-4 border-gray-200 border-r-pink-800 bg-gray-200 hover:bg-gray-200 hover:bg-pink-800 hover:border-pink-800 hover:text-white px-4 py-2 flex mb-2">
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
                <div class="flex cursor-pointer items-center" id="perfilDatos">
                    <div class="shadow rounded-full overflow-hidden flex items-center w-10 h-10 mr-3 bg-gray-300">
                        <?php if(isset($contenido)){
                                    echo "<img src='data:image/jpeg; base64,".base64_encode($contenido)."'>";
                                }else{
                                    echo "<img src=''>";
                                }
                        ?>
                    </div>
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
            <div class="mt-2 bg-pink-900 rounded p-8 flex mb-5 shadow flex-col items-start justify-center">
                <div class="flex items-center mb-4">
                    <img src="svg/iconos/historial_icon_lg.svg" class="border border-white rounded-full mr-3" width="32">
                    <h2 class="text-white text-2xl font-bold">Historial</h2>
                </div>
                <p class="pl-10 text-white opacity-75 lg:w-1/2 sm:w-full">Revisa la información de todas las solicitudes que has realizado.</p>
            </div>

            <div class="rounded p-8 bg-white shadow">
                <div class="flex flex-wrap gap-5">
                    <input type="hidden" value="<?php echo $_SESSION['id'] ?>" id="idProfesor">
                    <div class="flex flex-col">
                        <label for="asunto" class="text-sm font-semibold">Asunto</label>
                        <input type="text" name="asunto" id="asunto" placeholder="Ej: Ratón no funciona" class="bg-gray-100 p-2 rounded w-full border mt-2 border border-gray-300 text-sm">
                    </div>
                    <div class="flex flex-col">
                        <label for="estado" class="text-sm font-semibold">Estado</label>
                        <select name="estado" id="estado" class="bg-gray-100 p-2 rounded w-full border mt-2 border border-gray-300 text-sm">
                            <option value="-">Cualquiera</option>
                            <option value="EN PROCESO">EN PROCESO</option>
                            <option value="TERMINADA">TERMINADA</option>
                            <option value="ARCHIVADA">ARCHIVADA</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label for="tipo" class="text-sm font-semibold">Tipo</label>
                        <select name="tipo" id="tipo" class="bg-gray-100 p-2 rounded w-full border mt-2 border border-gray-300 text-sm">
                            <option value="0">Todos</option>
                            <option value="1">Hardware</option>
                            <option value="2">Software</option>
                            <option value="3">Conectividad</option>
                            <option value="4">Recursos EducaMadrid</option>
                            <option value="5">PDI</option>
                            <option value="6">Impresión</option>
                        </select>
                    </div>
                </div>
                <hr class="my-5">
                
                <div id="fichaCompleta">
                </div>
                
                <div class="overflow-x-auto w-full">
                    <table class="lg:table-fixed md:table-auto sm:table-auto text-left rounded-lg w-full text-sm">
                        <thead>
                            <tr class="border bg-gray-200 text-xs">
                                <th class="py-3 px-2">ASUNTO</th>
                                <th class="py-3 px-2">TIPO</th>
                                <th class="py-3 px-2">AULA</th>
                                <th class="py-3 px-2">GRUPO</th>
                                <th class="py-3 px-2">ESTADO</th>
                                <th class="py-3 px-2">FECHA</th>
                                <th class="py-3 px-2"></th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    

    <script src="js/main_user.js"></script>
    <script src="js/historial.js"></script>
    <script src="js/extras_jquery.js"></script>
</body>

</html>