window.addEventListener('DOMContentLoaded', eventos);

const xhrAulas = new XMLHttpRequest();
const xhrGrupos = new XMLHttpRequest();
const xhrNueva = new XMLHttpRequest();

function eventos() {
    peticionAulas();
    peticionGrupos();
    //document.addEventListener("crearIncidencia").addEventListener("click", peticionNuevaIncidencia);
}

function peticionAulas() {
    xhrAulas.onreadystatechange = mostrarAulas;
    xhrAulas.open("POST", "server/listar_aulas.php", true);
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

}

function validarMensaje(){

}

function peticionNuevaIncidencia(){
    if(validarAsunto() == false || validarMensaje() == false){
        return 0;
    }else{
        xhrNueva.onreadystatechange = respuestaNuevaIncidencia;
        xhrNueva.open("POST", "server/crear_incidencia.php", true);
        xhrNueva.send(null);
    }
}

function respuestaNuevaIncidencia() {
    if(xhrNueva.readyState == 4 && xhrNueva.status == 200){
        let respuestaJson = JSON.parse(xhrNueva.responseText);
    }
}