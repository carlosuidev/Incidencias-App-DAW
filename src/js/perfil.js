window.addEventListener('DOMContentLoaded', iniciarEventos);

const xhrDatos = new XMLHttpRequest();
const xhrActualizar = new XMLHttpRequest();

function iniciarEventos() {
    peticionDatosProfesor();
    document.getElementById("contrasenaNueva").addEventListener("input", validarContrasena);
    document.getElementById("actualizar").addEventListener("click", peticionActualizar);
}

function peticionDatosProfesor(){
    const idProfesor =  document.getElementById("idProfesor");
    xhrDatos.onreadystatechange = mostrarDatosProfesor;
    xhrDatos.open("POST", "server/ver_datos.php", true);
    xhrDatos.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhrDatos.send(`id=${idProfesor.value}`);
}

function mostrarDatosProfesor(){
    if(xhrDatos.readyState == 4 && xhrDatos.status == 200){
        let datosProfesor = JSON.parse(xhrDatos.responseText);
        datosProfesor.forEach(profesor => {
            document.getElementById("datoUsuario").textContent = `${profesor.usuario}`;
            document.getElementById("datoNombre").textContent = `${profesor.nombre}`;
            document.getElementById("datoApellidos").textContent = `${profesor.apellidos}`;
            document.getElementById("datoCorreo").textContent = `${profesor.correo}`;
            document.getElementById("datoDepartamento").textContent = `${profesor.departamento}`;
        });
    }
}

function validarContrasena(){
    let contrasena = document.getElementById("contrasenaNueva");
    let contrasenaAlert = document.getElementById("contrasenaAlert");

    if(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)([A-Za-z\d$@$!%*?&]|[^ ]){8,16}$/.test(contrasena.value)){
        contrasenaAlert.style.display = "none";
        contrasena.style.border = "1px solid green";
        return true;
    }else{
        contrasenaAlert.style.display = "block";
        contrasena.style.border = "1px solid red";
        return false;
    }
}

function peticionActualizar() {
    if(validarContrasena() == false){
        return false;
    }else{
        let contrasenaActual = document.getElementById("contrasenaActual");
        let contrasenaNueva = document.getElementById("contrasenaNueva");
        xhrActualizar.onreadystatechange = actualizarContrasena;
        xhrActualizar.open("POST", "server/actualizar_contrasena.php", true);
        xhrActualizar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        const idProfesor =  document.getElementById("idProfesor");
        xhrActualizar.send(`id=${idProfesor.value}&contrasenaActual=${contrasenaActual.value}&contrasenaNueva=${contrasenaNueva.value}`);
    }
}

function actualizarContrasena(){
    if(xhrActualizar.readyState == 4 && xhrActualizar.status == 200){
        let respuestaJson = JSON.parse(xhrActualizar.responseText);
        const salidaUpd = document.getElementById("salidaUpdate");
        if(respuestaJson[0].msg == "guardado"){
            salidaUpd.setAttribute("class", "text-center text-xs rounded mb-5 p-2 bg-green-200 border border-green-800 text-green-800");
            salidaUpd.textContent = "Contraseña guardada correctamente";
        }else if(respuestaJson[0].msg == "mal"){
            salidaUpd.setAttribute("class", "text-center text-xs rounded mb-5 p-2 bg-red-200 border border-red-800 text-red-800");
            salidaUpd.textContent = "Contraseña incorrecta. Prueba otra vez";
        }else{
            salidaUpd.setAttribute("class", "text-center text-xs rounded mb-5 p-2 bg-red-200 border border-red-800 text-red-800");
            salidaUpd.textContent = "Ha ocurrido un error en el sistema. Prueba otra vez";
        }
    }
}