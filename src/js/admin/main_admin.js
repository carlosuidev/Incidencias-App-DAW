addEventListener('DOMContentLoaded', eventos);

const xhr = new XMLHttpRequest();
const xhrSesion = new XMLHttpRequest();

let tituloAnterior = document.title;
window.addEventListener("blur", cambiarTitulo);
window.addEventListener("focus", volverTitulo);

function eventos() {
    // REDIRECCIONES
    try {
        document.getElementById("educamadridIncidencias").addEventListener("click", irEducamadrid);
    } catch (error) {
        console.log("Sin redirigir a EducaMadrid");
    }

    try {
        document.getElementById("incidencias").addEventListener("click", irIncidencias);
    } catch (error) {
        console.log("Sin redirigir a Incidencias");
    }

    try {
        document.getElementById("historialIncidencias").addEventListener("click", irHistorial);
    } catch (error) {
        console.log("Sin redirigir a Historial");
    }

    document.getElementById("inicioLogo").addEventListener("click", irInicio);
    document.getElementById("perfilDatos").addEventListener("click", irPerfil);

    // TIEMPO
    mostrarTiempo();

    // CERRAR SESIÓN
    document.getElementById("cerrarSesion").addEventListener("click", peticionCerrarSesion);
}

function cambiarTitulo(){
    tituloAnterior = document.title;
    document.title = "¿Ya has terminado? Vuelve 🤔";
}

function volverTitulo() {
    document.title = tituloAnterior;
}

function irInicio() {
    window.location.href = "adm_menu_inicio.php";
}

function irIncidencias() {
    window.location.href = "adm_incidencias.php";
}

function irHistorial() {
    window.location.href = "adm_historial.php";
}

function irEducamadrid() {
    window.location.href = "https://aulavirtual33.educa.madrid.org/ies.piobaroja.madrid/";
}

function irPerfil(){
    window.location.href = "adm_perfil.php";
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

function mostrarTiempo(){
    const clave = "48d76f5f2a0303eae4f6f047b4a48281";
    fetch(`https://api.openweathermap.org/data/2.5/weather?q=Madrid&units=metric&appid=${clave}`)
        .then(response => response.json())
        .then(json => {
            if(json.cod == '404'){
                document.getElementById("tiempoNum").textContent = `-`;
            }else{
                let iconoTiempoResultado;
                switch (json.weather[0].main) {
                    case 'Clear':
                        let hora = new Date().getHours();
                        if(hora>=20 && hora<=23 || hora>=0 && hora<=6){
                            iconoTiempoResultado = './svg/tiempo/luna.svg';
                        }else{
                            iconoTiempoResultado = './svg/tiempo/soleado.svg';
                        }
                    break;

                    case 'Rain':
                    iconoTiempoResultado = './svg/tiempo/lluvia.svg';
                    break;

                    case 'Snow':
                    iconoTiempoResultado = './svg/tiempo/nieve.svg';
                    break;

                    case 'Clouds':
                    iconoTiempoResultado = './svg/tiempo/nublado.svg';
                    break;

                    case 'Haze':
                    iconoTiempoResultado = './svg/tiempo/niebla.svg';
                    break;

                    default:
                    image.src = '';
                }
                
                document.getElementById("iconoTiempo").setAttribute("src", iconoTiempoResultado);
                document.getElementById("tiempoNum").textContent = `${json.main.temp}º`;
            }
        });
}