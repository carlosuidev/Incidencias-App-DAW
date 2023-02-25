window.addEventListener('DOMContentLoaded', iniciarEventos);

const xhrDatos = new XMLHttpRequest();
const xhrActualizar = new XMLHttpRequest();

function iniciarEventos() {
    document.getElementById("nombre").addEventListener("input", validarNombre);
    document.getElementById("apellidos").addEventListener("input", validarApellidos);
    document.getElementById("usuario").addEventListener("input", validarUsuario);
    document.getElementById("correo").addEventListener("input", validarCorreo);
    document.getElementById("actualizar").addEventListener("click", peticionActualizar);
}

function validarUsuario() {
    let usuario = document.getElementById("usuario");
    let usuarioAlert = document.getElementById("usuarioAlert");
    if(/[a-zA-Z]\w/.test(usuario.value) && (usuario.value).length<=32 && (usuario.value).length>=4){
        xhrActualizar.onreadystatechange = existeUsuario;
        xhrActualizar.open("POST", "server/comprobar_usuario.php", true);
        xhrActualizar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhrActualizar.send(`usuario=${usuario.value}`);
        return true;
    }else{
        usuarioAlert.style.display = "block";
        usuarioAlert.textContent = "Escriba un usuario válido";
        usuario.style.border = "1px solid red";
        return false;
    }
    
}

function existeUsuario(){
    if(xhrActualizar.readyState == 4 && xhrActualizar.status == 200){
        const usuarioAlert = document.getElementById("usuarioAlert");
        let respuesta = JSON.parse(xhr.responseText);
        if(respuesta[0].msg == "existe"){
            usuarioAlert.style.display = "block";
            usuario.style.border = "1px solid red";
            usuarioAlert.textContent = "Ese usuario ya está en uso";
            return true;
        }else{
            usuarioAlert.style.display = "none";
            usuario.style.border = "1px solid green";
            return false;
        }
    }
}

function validarNombre() {
    let nombre = document.getElementById("nombre");
    let nombreAlert = document.getElementById("nombreAlert");

    if(/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð -]{2,32}$/.test(nombre.value)){
        nombreAlert.style.display = "none";
        nombre.style.border = "1px solid green";
        return true;
    }else{
        nombreAlert.style.display = "block";
        nombre.style.border = "1px solid red";
        return false;
    }
}

function validarApellidos() {
    let apellidos = document.getElementById("apellidos");
    let apellidosAlert = document.getElementById("apellidosAlert");

    if(/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u.test(apellidos.value) && (apellidos.value).length<=100){
        apellidosAlert.style.display = "none";
        apellidos.style.border = "1px solid green";
        return true;
    }else{
        apellidosAlert.style.display = "block";
        apellidos.style.border = "1px solid red";
        return false;
    }
}

function validarCorreo() {
    let correo = document.getElementById("correo");
    let correoAlert = document.getElementById("correoAlert");
    if(/(\W|^)[\w.+\-]+@educa.madrid\.org(\W|$)/.test(correo.value) && (correo.value).length<=64){
        xhr.onreadystatechange = existeCorreo;
        xhr.open("POST", "server/comprobar_correo.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(`correo=${correo.value}`);
        return true;
    }else{
        correoAlert.style.display = "block";
        correoAlert.textContent = "Escriba un correo que pertenezca a educamadrid";
        correo.style.border = "1px solid red";
        return false;
    }
    
}

function existeCorreo(){
    if(xhr.readyState == 4 && xhr.status == 200){
        const correoAlert = document.getElementById("correoAlert");
        let respuesta = JSON.parse(xhr.responseText);
        if(respuesta[0].msg == "existe"){
            correoAlert.style.display = "block";
            correo.style.border = "1px solid red";
            correoAlert.textContent = "Ese correo ya está en uso";
            return true;
        }else{
            correoAlert.style.display = "none";
            correo.style.border = "1px solid green";
            return false;
        }
    }
}

function peticionActualizar() {
    if(validarNombre() == false || validarApellidos() == false || validarUsuario() == false|| validarCorreo() == false || validarContrasena() == false || validarCheck() == false){
        return false;
    }else{
        let nombre = document.getElementById("nombre");
        let apellidos = document.getElementById("apellidos");
        let usuario = document.getElementById("usuario");
        let correo = document.getElementById("correo");
        let contrasena = document.getElementById("contrasena");
        let departamento = document.getElementById("departamento");
        xhr.onreadystatechange = registrarProfesor;
        xhr.open("POST", "server/crear_profesor.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(`nombre=${nombre.value}&apellidos=${apellidos.value}&usuario=${usuario.value}&correo=${correo.value}&contrasena=${contrasena.value}&departamento=${departamento.value}`);
    }
}

function actualizarProfesor(){
    if(xhr.readyState == 4 && xhr.status == 200){
        const inicioSesion = document.getElementById("inicioSesion");
        let respuestaJson = JSON.parse(xhr.responseText);
        console.log(respuestaJson[0].msg);
        if(respuestaJson[0].msg == "guardado"){
            inicioSesion.style.display = "block";
        }
    }
}