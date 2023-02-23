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
    xhrIncidencias.send(`id_profesor=${idProfesor.value}`);
}

function respuestaIncidencias() {
    if(xhrIncidencias.readyState == 4 && xhrIncidencias.status == 200){
        let respuestaJson = JSON.parse(xhrIncidencias.responseText);
        const listado = document.getElementById("listaIncidencia");

        if(respuestaJson[0].id != "sin"){
            respuestaJson.forEach(incidencia => {
                const incidenciaBox =  document.createElement("incidencia-box");
                incidenciaBox.setAttribute("", "");

                listado.appendChild(incidenciaBox);
            });
        }else{
            const pNada = document.createElement("p");
            pNada.textContent = "(Sin incidencias activas)";
            pNada.setAttribute("class", "w-full text-center col-span-2 italic");
            listado.appendChild(pNada);
        }

        
    }
}

/*
function respuestaIncidencias() {
    if(xhrIncidencias.readyState == 4 && xhrIncidencias.status == 200){
        let respuestaJson = JSON.parse(xhrIncidencias.responseText);

        console.log(respuestaJson)

        const listado = document.getElementById("listaIncidencia");

        if(respuestaJson[0].id != "sin"){
            respuestaJson.forEach(incidencia => {
                const contenedor = document.createElement("div");
                contenedor.setAttribute("class", "bg-white border rounded p-8 flex flex-col justify-between");

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
    
                contenedor.appendChild(cabecera);
    
    
                // ASUNTO
                const h3 = document.createElement("h3");
                h3.textContent = `${incidencia.asunto}`;
                h3.setAttribute("class", "font-bold text-xl mb-2");
                contenedor.appendChild(h3);
    
    
                // GRUPO ELEMENTOS
                const group = document.createElement("div");
                group.setAttribute("class", "mb-5 text-sm flex flex-wrap");

                    const pTipo = document.createElement("p");
                    pTipo.setAttribute("class", "text-sm font-bold");
                    pTipo.innerHTML = `Tipo: <span class='text-normal'>${incidencia.tipo}</span>`;
                    group.appendChild(pTipo);

                    const pAula = document.createElement("p");
                    pAula.setAttribute("class", "text-sm font-bold");
                    pAula.innerHTML = `Aula: <span class='text-normal'>${incidencia.aula}</span>`;
                    group.appendChild(pAula);

                    const pGrupo = document.createElement("p");
                    pGrupo.setAttribute("class", "text-sm font-bold");
                    pGrupo.innerHTML = `Grupo: <span class='text-normal'>${incidencia.grupo}</span>`;
                    group.appendChild(pGrupo);

                contenedor.appendChild(group);
    
    
                // DESCRIPCIÓN
                const desc = document.createElement("p");
                desc.setAttribute("class", "mb-5 text-sm");
                contenedor.appendChild(desc);
    
                // REPUESTA (OPCIONAL)
                if(incidencia.respuesta == "TERMINADA"){
                    const resp = document.createElement("p");
                    resp.setAttribute("mb-5 bg-green-100 font-semibold p-5 border rounded text-sm");
                    resp.innerHTML = `Respuesta: <span class='font-normal text-italic'>${incidencia.respuesta}</span>`;
                    contenedor.appendChild(resp);
                }else if(incidencia.respuesta == "EN PROCESO"){
                    const resp = document.createElement("p");
                    resp.setAttribute("class", "mb-5 bg-orange-100 font-semibold p-5 border rounded text-sm");
                    resp.innerHTML = `Respuesta: <span class='font-normal text-italic'>${incidencia.respuesta}</span>`;
                    contenedor.appendChild(resp);
                }

                listado.prepend(contenedor);
            });
        }else{
            const pNada = document.createElement("p");
            pNada.textContent = "(Sin incidencias activas)";
            pNada.setAttribute("class", "w-full text-center col-span-2 italic");
            listado.appendChild(pNada);
        }

        
    }
}*/