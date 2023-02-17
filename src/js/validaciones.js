window.addEventListener('DOMContentLoaded', iniciarEventos);

function iniciarEventos() {
    document.getElementById("nombre").addEventListener("change", validarNombre);
    document.getElementById("apellidos").addEventListener("change", validarApellidos);
    document.getElementById("correo").addEventListener("change", validarCorreo);
    document.getElementById("pass").addEventListener("change", validarContrasena);
}

function validarNombre() {
    let nombre = document.getElementById("nombre");
    let nombreAlert = document.getElementById("nombreAlert");
    const regexNombre = "";
    if(regexNombre.validate(nombre.value)){
        nombreAlert.innerHTML = "";
        nombre.setAttribute("class", "bien");
    }else{
        nombre.setAttribute("class", "bien");
        nombreAlert.innerHTML = "";
    }
}

function validarApellidos() {
    
}

function validarCorreo() {
    
}

function validarPassword() {
    
}

function validarContrasena() {
    
}

function validarCreedenciales() {
    
}