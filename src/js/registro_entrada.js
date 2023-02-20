window.addEventListener('DOMContentLoaded', iniciarEventos);

const xhr = new XMLHttpRequest();

function iniciarEventos() {
    document.getElementById("nombre").addEventListener("input", validarNombre);
    document.getElementById("apellidos").addEventListener("input", validarApellidos);
    document.getElementById("usuario").addEventListener("input", validarUsuario);
    document.getElementById("correo").addEventListener("input", validarCorreo);
    document.getElementById("pass").addEventListener("input", validarContrasena);
    document.getElementById("terminos").addEventListener("input", validarCheck);
    document.getElementById("registrar").addEventListener("click", registrarUsuario);
    peticionDepartamentos();
}

function peticionDepartamentos(){
    xhr.onreadystatechange = mostrarDepartamentos;
    xhr.open("POST", "server/listar_departamentos.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send();
}

function mostrarDepartamentos(){
    if(xhr.readyState == 4 && xhr.status == 200){
        const departamento = document.getElementById("departamento");
        let respuestaJson = JSON.parse(xhr.responseText);
        
        respuestaJson.forEach(elemento => {
            const option = document.createElement("option");
            option.setAttribute("value", elemento.id);
            option.innerHTML = elemento.nombre;
            departamento.appendChild(option);
        });
    }
}

function validarUsuario(){
    let usuario = document.getElementById("usuario");
    xhr.onreadystatechange = existeUsuario;
    xhr.open("POST", "server/comprobar_usuario.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(`usuario=${usuario.value}`);
}

function existeUsuario(){
    if(xhr.readyState == 4 && xhr.status == 200){
        const usuario = document.getElementById("usuario");
        let respuesta = JSON.parse(xhr.responseText);
        if(/^[a-zA-Z0-9]+$/.test(usuario.value)){
            if(respuesta[0].msg == "existe"){
                usuarioAlert.style.display = "block";
                usuario.style.border = "1px solid red";
            }else{
                usuarioAlert.style.display = "none";
                usuario.style.border = "1px solid green";
            }
        }else{
            usuarioAlert.style.display = "block";
            usuario.style.border = "1px solid red";
            return 0;
        }
    }
}


function validarNombre() {
    let nombre = document.getElementById("nombre");
    let nombreAlert = document.getElementById("nombreAlert");

    if(/^[a-zA-Z ]+$/.test(nombre.value)){
        nombreAlert.style.display = "none";
        nombre.style.border = "1px solid green";
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
        apellidos.style.border = "1px solid green";
    }else{
        apellidosAlert.style.display = "block";
        apellidos.style.border = "1px solid red";
        return 0;
    }
}

function validarCorreo() {
    let correo = document.getElementById("correo");
    xhr.onreadystatechange = existeCorreo;
    xhr.open("POST", "server/comprobar_correo.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(`correo=${correo.value}`);
}

function existeCorreo(){
    if(xhr.readyState == 4 && xhr.status == 200){
        const correo = document.getElementById("correo");
        let respuesta = JSON.parse(xhr.responseText);
        if(/[^@ \t\r\n]+@educa.madrid\.org/.test(correo.value)){
            if(respuesta[0].msg == "existe"){
                correoAlert.style.display = "block";
                correo.style.border = "1px solid red";
            }else{
                correoAlert.style.display = "none";
                correo.style.border = "1px solid green";
            }
        }else{
            correoAlert.style.display = "block";
            correo.style.border = "1px solid red";
            return 0;
        }
    }
}

function validarContrasena() {
    let pass = document.getElementById("pass");
    let passAlert = document.getElementById("passAlert");

    if(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/.test(pass.value)){
        passAlert.style.display = "none";
        pass.style.border = "1px solid green";
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