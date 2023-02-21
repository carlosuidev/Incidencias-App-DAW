addEventListener('DOMContentLoaded', eventos);

const xhr = new XMLHttpRequest();

function eventos() {
    // REDIRECCIONES
    document.getElementById("inicioLogo").addEventListener("click", irInicio);
    document.getElementById("nuevaIncidencia").addEventListener("click", irNuevaIncidencia);
    document.getElementById("incidenciasActivas").addEventListener("click", irIncidenciasActivas);
    document.getElementById("historialIncidencias").addEventListener("click", irHistorial);
    document.getElementById("educamadridIncidencias").addEventListener("click", irEducamadrid);
    document.getElementById("perfilDatos").addEventListener("click", irPerfil);

    // CERRAR SESIÓN
    document.getElementById("cerrarSesion").addEventListener("click", peticionCerrarSesion);
}

function irInicio() {
    window.location.href = "menu_inicio.php";
}

function irNuevaIncidencia() {
    window.location.href = "nueva_incidencia.php";
}

function irIncidenciasActivas() {
    window.location.href = "incidencias_activas.php";
}

function irHistorial() {
    window.location.href = "historial.php";
}

function irEducamadrid() {
    window.location.href = "https://aulavirtual33.educa.madrid.org/ies.piobaroja.madrid/";
}

function irPerfil(){
    window.location.href = "perfil.php";
}

function peticionCerrarSesion(){
    xhr.onreadystatechange = respuestaCerrarSesion;
    xhr.open("POST", "server/cerrar_sesion.php", true);
    xhr.send(null);
}

function respuestaCerrarSesion(){
    if(xhr.readyState == 4 && xhr.status == 200){
        console.log(xhr.responseText);
        let respuestaJson = JSON.parse(xhr.responseText);

        switch(respuestaJson[0].msg){
            case "bien":
                window.location.href = "index.php";
                break;
            case "mal":
                console.log("Error al cerrar sesión");
                break;
        }
    }
}