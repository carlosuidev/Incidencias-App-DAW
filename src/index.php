<!doctype html>
<?php 
    session_start();
    if(isset($_SESSION['id']) && $_SESSION['id'] == 1){
        header("Location: adm_menu_inicio.php");
    }else if(isset($_SESSION['id'])){
        header("Location: menu_inicio.php");
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="/dist/output.css" rel="stylesheet">-->
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/entrada.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="svg/favicon.svg" type="image/x-icon">
</head>

<body class="bg-teal-900 text-gray-800">
    <div class="container mx-auto">
        <div class="flex flex-col justify-center items-center mt-16 mb-16 mx-auto" id="formulario-entrada">
            <div class="p-16 formulario-entrada" id="fondo-cabecera">
                <h2 class="font-bold text-center text-white text-5xl">Resolución de incidencias</h2>
            </div>
            <form class="bg-white rounded p-16">
            <p id="msgError" class="hidden text-sm rounded text-red-700 p-3 mb-8 bg-red-200 border border-red-700 mr-3 ml text-center">Los datos introducidos <b>no son válidos.</b> Inténtalo de nuevo.</p>
                <img src="svg/logo_baroja.svg" alt="IES PÍO BAROJA" class="mb-5" width="132px">
                <h3 class=" font-bold text-3xl">Inicia Sesión</h3>
                <p class="mb-8 mt-3">Consulta y resuelve tus incidencias que ocurran en el centro. ¿Aún no tienes cuenta? <a href="registro.html" class="font-semibold text-teal-800 hover:text-teal-900">Regístrate</a>.</p>
                <div class="flex flex-col mb-5">
                    <label for="usuario" class="font-semibold">Nombre de usuario</label>
                    <input type="text" name="usuario" id="usuario" class="bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm" placeholder="Tu nombre de usuario">
                    <small id="usuarioAlert" class="hidden text-red-400 mt-1 pl-2">Escriba un usuario válido</small>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="contrasena" class="font-semibold">Contraseña</label>
                    <input type="password" name="contrasena" id="contrasena" class="bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm" placeholder="Tu contraseña">
                    <small id="contrasenaAlert" class="hidden text-red-400 mt-1 pl-2">Escriba un contraseña válida</small>
                </div>
                <input type="button" value="Entrar" id="entrar" class="px-3 py-2 w-full bg-teal-800 hover:bg-teal-900 transition ease-in rounded text-white font-semibold mt-3">
            </form>
        </div>
    </div>
    <script src="js/inicio_sesion.js"></script>
</body>

</html>