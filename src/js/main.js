addEventListener('DOMContentLoaded', eventos);

const xhr = new XMLHttpRequest();

function eventos() {
    // REDIRECCIONES
    //document.getElementById("").addEventListener("click", irNuevaIncidencia);
    //document.getElementById("").addEventListener("click", irIncidenciasActivas);
    //document.getElementById("").addEventListener("click", irHistorial);
    document.getElementById("educamadridIncidencias").addEventListener("click", irEducamadrid);
    document.getElementById("cerrarSesion").addEventListener("click", peticionCerrarSesion);

    // NAVBAR
}

function irNuevaIncidencia() {
    window.location.href = "www.yoursite.com";
}

function irIncidenciasActivas() {
    window.location.href = "www.yoursite.com";
}

function irHistorial() {
    window.location.href = "www.yoursite.com";
}

function irEducamadrid() {
    window.location.href = "https://aulavirtual33.educa.madrid.org/ies.piobaroja.madrid/";
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
                window.location.href = "menu_inicio.php";
                break;
            case "mal":
                console.log("Error al iniciar sesión");
                break;
        }
    }
}