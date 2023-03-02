<!doctype html>
<html>
<?php 
    session_start();
    if(isset($_SESSION['id']) && $_SESSION['id'] == 1){
        header("Location: adm_menu_inicio.php");
    }else if(isset($_SESSION['id'])){
        header("Location: menu_inicio.php");
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="/dist/output.css" rel="stylesheet">-->
    <link rel="stylesheet" href="styles/general.css">
    <link rel="stylesheet" href="styles/entrada.css">
    <link rel="stylesheet" href="styles/animaciones.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="svg/favicon.svg" type="image/x-icon">
    <title>Sistema de Incidencias del IES Pío Baroja</title>
</head>

<body class="bg-teal-900 text-gray-800">
    <div>
        <div class="flex flex-col justify-center items-center mt-16 mb-16 mx-auto" id="formulario-entrada">
            <div class="p-16 formulario-entrada" id="fondo-cabecera">
                <h2 class="font-bold text-center text-white text-5xl">Resolución de incidencias</h2>
            </div>
            <form class="bg-white rounded p-16" id="formularioRegistro">
                <img src="svg/logo_baroja.svg" alt="IES PÍO BAROJA" class="mb-5" width="132px">
                <h3 class=" font-bold text-3xl">Regístrate</h3>
                <p class="mb-8 mt-3">Consulta y resuelve tus incidencias que ocurran en el centro. ¿Ya tienes cuenta? <a
                        href="index.php" class="font-semibold text-teal-800 hover:text-teal-900">Inicia sesión</a>.</p>
                <div class="flex grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1 gap-5">
                    <div class="lg:col-span-1 md:col-span-1 sm:col-span-3 flex flex-col mb-0.5">
                        <label for="nombre" class="font-semibold">Nombre</label>
                        <input type="text" name="nombre" id="nombre"
                            class="bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm"
                            placeholder="Tu nombre">
                        <small id="nombreAlert" class="hidden text-red-400 mt-1 pl-2">Usa un nombre válido</small>
                    </div>
                    <div class="lg:col-span-2 md:col-span-2 sm:col-span-3 flex flex-col mb-5">
                        <label for="apellidos" class="font-semibold">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos"
                            class="bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm"
                            placeholder="Tu apellido o apellidos">
                        <small id="apellidosAlert" class="hidden text-red-400 mt-1 pl-2">Escriba un apellido válido</small>
                    </div>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="usuario" class="font-semibold">Nombre de usuario</label>
                    <input type="text" name="usuario" id="usuario"
                        class="bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm"
                        placeholder="Tu nombre de usuario para entrar">
                    <small id="usuarioAlert" class="hidden text-red-400 mt-1 pl-2"></small>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="correo" class="font-semibold">Correo electrónico</label>
                    <input type="email" name="correo" id="correo"
                        class="bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm"
                        placeholder="Tu correo electrónico de educamadrid">
                    <small id="correoAlert" class="hidden text-red-400 mt-1 pl-2"></small>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="contrasena" class="font-semibold">Contraseña</label>
                    <input type="password" name="contrasena" id="contrasena"
                        class="bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm"
                        placeholder="Tu contraseña">
                    <small id="contrasenaAlert" class="hidden text-red-400 mt-1 pl-2">Escriba una contraseña con mínimo una mayúscula y un número</small>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="departamento" class="font-semibold">Departamento</label>
                    <select name="departamento" id="departamento" class="bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm">
                    </select>
                </div>
                <div class="flex items-baseline">
                    <input type="checkbox" name="terminos" id="terminos"><label for="terminos" class="text-sm ml-2 text-gray-500">He leído y acepto la <a href="politica_privacidad.html" target="_blank" class="underline underline-offset-4">Política de privacidad</a> por parte del IES Pío Baroja</label>
                </div>
                <small id="checkAlert" class="hidden text-red-400 mt-1 pl-2">Debes aceptar los términos y condiciones además de la política de privacidad</small>
                <input type="button" id="registrar" value="Crear cuenta"
                    class="px-3 py-2 w-full bg-teal-800 hover:bg-teal-900 transition ease-in rounded text-white font-semibold mt-8">
            </form>
        </div>
    </div>
    </div>
    <script src="js/registro_entrada.js"></script>
</body>

</html>