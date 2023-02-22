addEventListener('DOMContentLoaded', eventos);

const xhrIncidencias = new XMLHttpRequest();

function eventos() {
    peticionIncidencias();
}

function peticionIncidencias() {
    xhrIncidencias.onreadystatechange = respuestaIncidencias;
    xhrIncidencias.open("POST", "server/listar_incidencias.php", true);
    xhrIncidencias.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    const idProfesor = document.getElementById("idProfesor");
    xhrIncidencias.send(`id_profesor=${idProfesor}`);
}

function respuestaIncidencias() {
    if(xhrIncidencias.readyState == 4 && xhrIncidencias.status == 200){
        let respuestaJson = JSON.parse(xhrIncidencias.responseText);

        respuestaJson.forEach(incidencia => {
            const div = document.createElement("div");
            div.setAttribute("class", "bg-white border rounded p-8 flex flex-col justify-between");

            // CABECERA
            const cabecera = document.createElement("div");
            cabecera.setAttribute("class", "flex w-full flex-wrap justify-between");

                // ESTADO
                const etiquetaEstado = document.createElement("p");
                if(incidencia.estado == "TERMINADA"){
                    etiquetaEstado.setAttribute("class", "text-xs px-2 py-0.5 rounded-full w-fit mb-3 bg-green-500 text-white font-semibold");
                }else{
                    etiquetaEstado.setAttribute("class", "text-xs px-2 py-0.5 rounded-full w-fit mb-3 bg-yellow-500 text-white font-semibold");
                }
                etiquetaEstado.textContent = `${incidencia.estado}`;
                
                // FECHA
                const fecha = document.createElement("p");
                fecha.setAttribute("class", "text-sm");
                fecha.textContent = `${incidencia.fecha}`;
                cabecera.appendChild(fecha);

            div.appendChild(cabecera);


            // ASUNTO
            const h3 = document.createElement("h3");
            h3.textContent = `${incidencia.asunto}`;
            h3.setAttribute("class", "font-bold text-xl mb-2");
            div.appendChild(h3);


            // GRUPO ELEMENTOS
            const group = document.createElement("div");
            group.setAttribute("class", "mb-5 text-sm flex flex-wrap");
                const groupElements = ["Tipo", "Aula", "Grupo"];
                const jsonElements = [tipo, aula, grupo];
                for(let i=0; i<3; i++){
                    const p = document.createElement("p");
                    p.setAttribute("class", "font-bold");
                    p.innerHTML = `${groupElements[i]}: <span class='font-normal'>${incidencia.jsonElements[i]}</span>`;
                    
                    group.appendChild(p);
                }
            div.appendChild(group);


            // DESCRIPCIÓN
            const desc = document.createElement("p");
            desc.setAttribute("mb-5 text-sm");
            div.appendChild(desc);

            // REPUESTA (OPCIONAL)
            if(incidencia.respuesta == "TERMINADA"){
                const resp = document.createElement("p");
                resp.setAttribute("mb-5 bg-green-100 font-semibold p-5 border rounded text-sm");
                resp.innerHTML = `Respuesta: <span class='font-normal text-italic'>${incidencia.respuesta}</span>`;
                div.appendChild(resp);
            }


            div.appendChild(document.getElementById("listaIncidencia"));
        });
    }
}