window.addEventListener("DOMContentLoaded", iniciarEventos);

const xhr = new XMLHttpRequest();

function iniciarEventos() {
    document.getElementById("usuario").addEventListener("input", validarUsuario);
    document.getElementById("contrasena").addEventListener("input", validarContrasena);
    document.getElementById("entrar").addEventListener("click", peticionValidar);
}

function validarUsuario() {
    const usuario = document.getElementById("usuario");
    const usuarioAlert = document.getElementById("usuarioAlert");
    if(/[a-zA-Z]\w/.test(usuario.value) && (usuario.value).length<=32){
        usuarioAlert.style.display = "none";
        usuario.style.border = "1px solid green";
        return true;
    }else{
        usuarioAlert.style.display = "block";
        usuario.style.border = "1px solid red";
        return false;
    }
}

function validarContrasena() {
    const contrasena = document.getElementById("contrasena");
    const contrasenaAlert = document.getElementById("contrasenaAlert");
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

function peticionValidar() {
    if(validarUsuario() == false|| validarContrasena() == false){
        return false;
    }else{
        let usuario = document.getElementById("usuario");
        let contrasena = document.getElementById("contrasena");
        xhr.onreadystatechange = repuestaValidacion;
        xhr.open("POST", "./server/iniciar_sesion.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(`usuario=${usuario.value}&contrasena=${contrasena.value}`);
    }
}

function repuestaValidacion() {
    if(xhr.readyState == 4 && xhr.status == 200){
        const msgError = document.getElementById("msgError");
        console.log(xhr.responseText);
        let respuestaJson = JSON.parse(xhr.responseText);

        switch(respuestaJson[0].msg){
            case "bien":
                msgError.style.display = "none";
                window.location.href = "menu_inicio.php";
                break;

            case "mal":
                msgError.style.display = "block";
                break;

            default:
                msgError.style.display = "block";
                console.log("ERROR");
                break;
        }
    }
}