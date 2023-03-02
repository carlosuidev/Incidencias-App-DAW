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
    if (xhrIncidencias.readyState == 4 && xhrIncidencias.status == 200) {
        let respuestaJson = JSON.parse(xhrIncidencias.responseText);

        const listado = document.getElementById("listaIncidencias");
        console.log(respuestaJson)
        if (respuestaJson[0].id != "sin") {
            respuestaJson.forEach(incidencia => {
                if (incidencia.estado !== "ARCHIVADA") {
                    const contenedor = document.createElement("div");
                    contenedor.setAttribute("class", "flex flex-col justify-between shadow hover:shadow-xl duration-300 rounded bg-white p-8 flex flex-col flex-wrap justify-between");

                    const principal = document.createElement("div");
                    // CABECERA
                    const cabecera = document.createElement("div");
                    cabecera.setAttribute("class", "flex w-full flex-wrap justify-between");

                    // ESTADO
                    const etiquetaEstado = document.createElement("p");
                    if (incidencia.estado == "TERMINADA") {
                        etiquetaEstado.setAttribute("class", "text-xs px-2 py-0.5 rounded-full w-fit mb-3 bg-green-200 text-green-500 font-bold");
                    } else if (incidencia.estado == "EN PROCESO") {
                        etiquetaEstado.setAttribute("class", "text-xs px-2 py-0.5 rounded-full w-fit mb-3 bg-orange-200 text-orange-500 font-bold");
                    }
                    etiquetaEstado.textContent = `${incidencia.estado}`;
                    cabecera.appendChild(etiquetaEstado);

                    // FECHA
                    const fecha = document.createElement("p");
                    fecha.setAttribute("class", "text-sm");
                    fecha.textContent = `${incidencia.fecha}`;
                    cabecera.appendChild(fecha);

                    principal.appendChild(cabecera);

                    // ASUNTO
                    const h3 = document.createElement("h3");
                    h3.textContent = `${incidencia.asunto}`;
                    h3.setAttribute("class", "font-bold text-xl mb-2 opacity-95");
                    principal.appendChild(h3);

                    // GRUPO ELEMENTOS (TIPO, AULA, GRUPO)
                    const group = document.createElement("p");
                    group.setAttribute("class", "text-sm flex flex-wrap opacity-90");
                    group.innerHTML = `<span class='font-bold mr-1.5'>${incidencia.aula}</span> - ${incidencia.grupo} | ${incidencia.tipo}`;
                    principal.appendChild(group);

                    const separador = document.createElement("hr");
                    separador.setAttribute("class", ("my-5"));
                    principal.appendChild(separador);

                    // DESCRIPCIÓN
                    const desc = document.createElement("p");
                    desc.setAttribute("class", "mb-5 text-sm px-3");
                    desc.textContent = incidencia.descripcion;
                    principal.appendChild(desc);

                    contenedor.appendChild(principal);

                    // REPUESTA Y BOTÓN
                    if (incidencia.estado == "TERMINADA") {
                        const resp = document.createElement("p");
                        resp.setAttribute("class", "mb-8 bg-green-100 font-semibold p-3 border rounded text-sm");
                        resp.innerHTML = `Respuesta: <span class='font-normal text-italic'>${incidencia.respuesta}</span>`;
                        principal.appendChild(resp);

                        //ARCHIVAR
                        const btn = document.createElement("input");
                        btn.setAttribute("type", "button");
                        btn.setAttribute("class", "w-full bg-teal-800 duration-300 cursor-pointer hover:bg-teal-900 text-white rounded font-semibold py-2");
                        btn.setAttribute("value", "Archivar");
                        btn.setAttribute("onclick", `peticionArchivar(${incidencia.id})`)
                        contenedor.appendChild(btn);
                    }

                    listado.appendChild(contenedor);
                }
            });
        } else {
            const pNada = document.createElement("p");
            pNada.textContent = "(Sin incidencias activas)";
            pNada.setAttribute("class", "w-full text-center col-span-2 italic");
            listado.appendChild(pNada);
        }


    }
}

const xhrArchivar = new XMLHttpRequest();

function peticionArchivar(id){
    xhrArchivar.onreadystatechange = archivarIncidencia;
    xhrArchivar.open("POST", "server/archivar_incidencia.php", true);
    xhrArchivar.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhrArchivar.send(`id=${id}`);
}

function archivarIncidencia() {
    if (xhrArchivar.readyState == 4 && xhrArchivar.status == 200) {
        let respuestaJson = JSON.parse(xhrArchivar.responseText);

        let resultado = respuestaJson[0].msg;

        if(resultado == "archivada"){
            window.location.href = "historial.php";
        }
    }
}