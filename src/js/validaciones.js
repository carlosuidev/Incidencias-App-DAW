window.addEventListener('DOMContentLoaded', iniciarEventos);

function iniciarEventos() {
    document.getElementById("nombre").addEventListener("focusout", validarNombre);
    document.getElementById("apellidos").addEventListener("focusout", validarApellidos);
    document.getElementById("correo").addEventListener("focusout", validarCorreo);
    document.getElementById("pass").addEventListener("focusout", validarContrasena);
    document.getElementById("terminos").addEventListener("focusout", validarCheck);
    document.getElementById("registrar").addEventListener("click", registrarUsuario);
}

function validarNombre() {
    let nombre = document.getElementById("nombre");
    let nombreAlert = document.getElementById("nombreAlert");

    if(/^[a-zA-Z ]+$/.test(nombre.value)){
        nombreAlert.style.display = "none";
        nombre.style.border = "1px solid lightgreen";
    }else{
        nombreAlert.style.display = "block";
        nombre.style.border = "1px solid red";
        return 0;
    }
}

function validarApellidos() {
    let apellidos = document.getElementById("apellidos");
    let apellidosAlert = document.getElementById("apellidosAlert");

    if(/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u.test(apellidos.value)){
        apellidosAlert.style.display = "none";
        apellidos.style.border = "1px solid lightgreen";
    }else{
        apellidosAlert.style.display = "block";
        apellidos.style.border = "1px solid red";
        return 0;
    }
}

function validarCorreo() {
    let correo = document.getElementById("correo");
    let correoAlert = document.getElementById("correoAlert");

    if(/[^@ \t\r\n]+@educa.madrid\.org/.test(correo.value)){
        correoAlert.style.display = "none";
        correo.style.border = "1px solid lightgreen";
    }else{
        correoAlert.style.display = "block";
        correo.style.border = "1px solid red";
        return 0;
    }
}

function validarContrasena() {
    let pass = document.getElementById("pass");
    let passAlert = document.getElementById("passAlert");

    if(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/.test(pass.value)){
        passAlert.style.display = "none";
        pass.style.border = "1px solid lightgreen";
    }else{
        passAlert.style.display = "block";
        pass.style.border = "1px solid red";
        return 0;
    }
}

function validarCheck(){
    let terminos = document.getElementById("terminos");
    let checkAlert = document.getElementById("checkAlert");

    if(terminos.checked){
        checkkAlert.style.display = "none";
    }else{
        checkAlert.style.display = "block";
        return 0;
    }
}

function registrarUsuario() {
    validarNombre();
    validarApellidos();
    validarCorreo();
    validarContrasena();
    validarCheck();
}