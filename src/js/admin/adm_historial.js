addEventListener('DOMContentLoaded', eventos);

const xhrHistorial = new XMLHttpRequest();
const xhrFicha = new XMLHttpRequest();

function eventos() {
    peticionHistorial();
    document.getElementById("asunto").addEventListener("input", peticionHistorial);
    document.getElementById("estado").addEventListener("change", peticionHistorial);
    document.getElementById("tipo").addEventListener("change", peticionHistorial);
}

function peticionHistorial() {
    xhrHistorial.onreadystatechange = respuestaHistorial;
    xhrHistorial.open("POST", "server/admin/historial_incidencias.php", true);
    xhrHistorial.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    const estado = document.getElementById("estado");
    const tipo = document.getElementById("tipo");
    const asunto = document.getElementById("asunto");
    xhrHistorial.send(`estado=${estado.value}&tipo=${tipo.value}&asunto=${asunto.value}`);
}

function respuestaHistorial() {
    if (xhrHistorial.readyState == 4 && xhrHistorial.status == 200) {
        let repuestaJson = JSON.parse(xhrHistorial.responseText);
        const tbody = document.getElementById("tbody");
        tbody.innerHTML = "";

        repuestaJson.forEach(fila => {
            const tr = tbody.insertRow(-1);
            tr.setAttribute("class", "border border-white border-b-gray-300 hover:bg-gray-100");

            const tdAsunto = tr.insertCell(0);
            tdAsunto.setAttribute("class", "font-semibold py-3 px-2");
            tdAsunto.textContent = fila.asunto;

            const tdTipo = tr.insertCell(1);
            tdTipo.textContent = fila.tipo;

            const tdAula = tr.insertCell(2);
            tdAula.textContent = fila.aula;

            const tdGrupo = tr.insertCell(3);
            tdGrupo.textContent = fila.grupo;

            const tdEstado = tr.insertCell(4);
            if (fila.estado == "EN PROCESO") {
                tdEstado.setAttribute("class", "px-5 py-3 text-xs w-fit mb-3 text-orange-500 font-bold");
            } else {
                tdEstado.setAttribute("class", "px-5 py-3 text-xs w-fit mb-3 text-green-500 font-bold");
            }
            tdEstado.textContent = fila.estado;

            const tdFecha = tr.insertCell(5);
            tdFecha.textContent = fila.fecha;

            const tdLeerMas = tr.insertCell(6);
            tdLeerMas.innerHTML = `<button onclick='peticionFicha(${fila.id})' class='font-bold text-pink-800 underline hover:text-pink-900'>Leer más</>`;

            const tds = [tdTipo, tdAula, tdGrupo, tdFecha];
            tds.forEach(td => {
                td.setAttribute("class", "py-3 px-5");
            });

        });
    }
}

function peticionFicha(id) {
    xhrFicha.onreadystatechange = ficha;
    xhrFicha.open("POST", "server/ficha_incidencia.php", true);
    xhrFicha.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhrFicha.send(`id=${id}`);
}

function ficha() {
    if (xhrFicha.readyState == 4 && xhrFicha.status == 200) {
        let repuestaJson = JSON.parse(xhrFicha.responseText);

        repuestaJson.forEach(incidencia => {

                const contenedor = document.getElementById("fichaCompleta");
                contenedor.setAttribute("class", "mx-auto lg:w-6/12 md:w-full sm:w-full flex flex-col shadow-lg rounded bg-white mb-5 rounded-lg");
                contenedor.innerHTML = "";

                const divCierre = document.createElement("div");
                const fecha = document.createElement("p");
                fecha.textContent = `${incidencia.fecha}`;
                fecha.setAttribute("class", "text-xs text-white");
                divCierre.appendChild(fecha);
                divCierre.setAttribute("class", "flex w-full justify-between p-3 items-center bg-gray-900 rounded-t-lg");
                const btnCerrar = document.createElement("button");
                btnCerrar.innerHTML = `<img src='svg/iconos/cross_white.svg' alt='Cerrar'>`;
                btnCerrar.setAttribute("onclick", "cerrarFicha()");
                divCierre.appendChild(btnCerrar);
                contenedor.appendChild(divCierre);

                const principal = document.createElement("div");
                principal.setAttribute("class", "p-8")
                // CABECERA
                const cabecera = document.createElement("div");
                cabecera.setAttribute("class", "flex w-full flex-wrap justify-between");

                // ESTADO
                const etiquetaEstado = document.createElement("p");
                if (incidencia.estado == "TERMINADA") {
                    etiquetaEstado.setAttribute("class", "text-xs px-2 py-0.5 rounded-full w-fit mb-3 bg-green-200 text-green-500 font-bold");
                } else if (incidencia.estado == "ARCHIVADA") {
                    etiquetaEstado.setAttribute("class", "text-xs px-2 py-0.5 rounded-full w-fit mb-3 bg-blue-200 text-blue-500 font-bold");
                }else{
                    etiquetaEstado.setAttribute("class", "text-xs px-2 py-0.5 rounded-full w-fit mb-3 bg-orange-200 text-orange-500 font-bold");
                }
                etiquetaEstado.textContent = `${incidencia.estado}`;
                cabecera.appendChild(etiquetaEstado);

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

                if(incidencia.respuesta !== ''){
                    const resp = document.createElement("p");
                    resp.setAttribute("class", "bg-green-100 font-semibold p-3 border rounded text-sm");
                    resp.innerHTML = `Respuesta: <span class='font-normal text-italic'>${incidencia.respuesta}</span>`;
                    principal.appendChild(resp);
                }
                contenedor.appendChild(principal);

                window.location.href = "http://localhost/incidencias-app-daw/src/adm_historial.php#fichaCompleta";
        });
    }
}

function cerrarFicha() {
    const fichaCompleta = document.getElementById("fichaCompleta");
    fichaCompleta.innerHTML = "";
    fichaCompleta.setAttribute("class", "");
}