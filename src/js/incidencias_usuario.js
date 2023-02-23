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
        const listado = document.getElementById("listaIncidencias");

        if(respuestaJson[0].id != "sin"){
            respuestaJson.forEach(incidencia => {
                if(incidencia.estado == 'TERMINADA'){
                    listado.innerHTML += `
                        <div class='rounded bg-white p-8 flex flex-col flex-wrap justify-between'>
                            <div>
                                <div class='mb-3 flex w-full flex-wrap justify-between items-center'>
                                    <p class='text-xs font-semibold py-1 px-3 rounded-full bg-green-500 text-white'>${incidencia.estado}</p>
                                    <p class='text-sm'>${incidencia.fecha}</p>
                                </div>
                                <h3 class='text-xl font-bold'>${incidencia.asunto}</h3>
                                <div class='mt-2 flex flex-wrap justify-start items-center'>
                                    <p class='text-sm font-bold mr-3'>Tipo: <span class='font-normal'>${incidencia.tipo}</span></p>
                                    <p class='text-sm font-bold mr-3'>Grupo: <span class='font-normal'>${incidencia.grupo}</span></p>
                                    <p class='text-sm font-bold mr-3'>Aula: <span class='font-normal'>${incidencia.aula}</span></p>
                                </div>
                                <hr class='my-5'>
                                <p class='px-3'>${incidencia.descripcion}</p>
                                <div class='bg-green-200 border rounded p-3 mt-4 mb-8'>
                                    <p class='text-sm font-bold'>Respuesta: <span class='font-normal'>${incidencia.respuesta}</span></p>
                                </div>
                            </div>
                            <div>
                                <form action='' method='POST'>
                                    <input type='hidden' value='${incidencia.id}'>
                                    <input type='submit' value='Archivar' class='w-full bg-teal-800 text-white rounded font-semibold py-2'>
                                </form>
                            </div>
                        </div>
                    `
                }else if(incidencia.estado == 'EN PROCESO'){
                    listado.innerHTML += `
                        <div class='rounded bg-white p-8 flex flex-col flex-wrap justify-between'>
                            <div>
                                <div class='mb-3 flex w-full flex-wrap justify-between items-center'>
                                    <p class='text-xs font-semibold py-1 px-3 rounded-full bg-orange-500 text-white'>${incidencia.estado}</p>
                                    <p class='text-sm'>${incidencia.fecha}</p>
                                </div>
                                <h3 class='text-xl font-bold'>${incidencia.asunto}</h3>
                                <div class='mt-2 flex flex-wrap justify-start items-center'>
                                    <p class='text-sm font-bold mr-3'>Tipo: <span class='font-normal'>${incidencia.tipo}</span></p>
                                    <p class='text-sm font-bold mr-3'>Grupo: <span class='font-normal'>${incidencia.grupo}</span></p>
                                    <p class='text-sm font-bold mr-3'>Aula: <span class='font-normal'>${incidencia.aula}</span></p>
                                </div>
                                <hr class='my-5'>
                                <p class='px-3'>${incidencia.descripcion}</p>
                            </div>
                        </div>
                    `
                }
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