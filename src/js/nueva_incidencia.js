window.addEventListener('DOMContentLoaded', eventos);

const xhrAulas = new XMLHttpRequest();
const xhrGrupos = new XMLHttpRequest();
const xhrNueva = new XMLHttpRequest();

function eventos() {
    peticionAulas();
    peticionGrupos();
    document.getElementById("asunto").addEventListener("input", validarAsunto);
    document.getElementById("descripcion").addEventListener("input", validarMensaje);
    document.getElementById("crearIncidencia").addEventListener("click", peticionNuevaIncidencia);
}

function peticionAulas() {
    xhrAulas.onreadystatechange = mostrarAulas;
    xhrAulas.open("POST", "server/listar_aulas.php", true);
    xhrAulas.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhrAulas.send();
}

function mostrarAulas(){
    if(xhrAulas.readyState == 4 && xhrAulas.status == 200){
        let respuestaJson = JSON.parse(xhrAulas.responseText);

        const aula = document.getElementById("aula");
        aula.innerHTML = "";
        respuestaJson.forEach(elementoAula => {
            const option = document.createElement("option");
            option.setAttribute("value", `${elementoAula.id}`);
            option.textContent = `${elementoAula.aula}`;
            
            aula.appendChild(option);
        });
    }
}

function peticionGrupos() {
    xhrGrupos.onreadystatechange = mostrarGrupos;
    xhrGrupos.open("POST", "server/listar_grupos.php", true);
    xhrGrupos.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhrGrupos.send(null);
}

function mostrarGrupos(){
    if(xhrGrupos.readyState == 4 && xhrGrupos.status == 200){
        let respuestaJson = JSON.parse(xhrGrupos.responseText);

        const grupo = document.getElementById("grupo");
        grupo.innerHTML = "";
        respuestaJson.forEach(elementoGrupo => {
            const option = document.createElement("option");
            option.setAttribute("value", `${elementoGrupo.id}`);
            option.textContent = `${elementoGrupo.grupo}`;
            
            grupo.appendChild(option);
        });
    }
}

function validarAsunto(){
    const asunto = document.getElementById("asunto");
    const asuntoAlert = document.getElementById("asuntoAlert");
    if(/^[A-Za-z0-9áéíóúÁÉÍÓÚÑñ.,-ªº¿?¡! ]*$/.test(asunto.value) && (asunto.value).length<=64 && (asunto.value).length>10){
        asuntoAlert.style.display = "none";
        asunto.style.border = "1px solid green";
        return false;
    }else{
        asuntoAlert.style.display = "block";
        asunto.style.border = "1px solid red";
        return true;
    }
}

function validarMensaje(){
    const descripcion = document.getElementById("descripcion");
    const descripcionAlert = document.getElementById("descripcionAlert");
    if(/^[A-Za-z0-9áéíóúÁÉÍÓÚÑñ.,-ªº¿?¡! ]*$/.test(descripcion.value) && (descripcion.value).length<=550 && (descripcion.value).length>20){
        descripcionAlert.style.display = "none";
        descripcion.style.border = "1px solid green";
        return false;
    }else{
        descripcionAlert.style.display = "block";
        descripcion.style.border = "1px solid red";
        return true;
    }
}

function peticionNuevaIncidencia(){
    if(validarAsunto() == false || validarMensaje() == false){
        const asunto = document.getElementById("asunto");
        const aula = document.getElementById("aula");
        const grupo = document.getElementById("grupo");
        const tipo = document.getElementById("tipo");
        const profesor = document.getElementById("profesor");
        const descripcion = document.getElementById("descripcion");
        xhrNueva.onreadystatechange = respuestaNuevaIncidencia;
        xhrNueva.open("POST", "server/crear_incidencia.php", true);
        xhrNueva.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhrNueva.send(`asunto=${asunto.value}&aula=${aula.value}&grupo=${grupo.value}&tipo=${tipo.value}&profesor=${profesor.value}&descripcion=${descripcion.value}`);
    }else{
        return 0;
    }
}

function respuestaNuevaIncidencia() {
    if(xhrNueva.readyState == 4 && xhrNueva.status == 200){
        console.log(xhrNueva.responseText)
        let respuestaJson = JSON.parse(xhrNueva.responseText);
        switch (respuestaJson[0].msg) {
            case "guardado":
                window.location.href = "incidencias_activas.php";
                break;
        
            default:
                const msgError = document.getElementById("msgError");
                msgError.style.display = block;
                break;
        }
    }
}