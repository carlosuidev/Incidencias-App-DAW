addEventListener('DOMContentLoaded', eventos);

const xhrIncidencias = new XMLHttpRequest();

function eventos() {
    peticionIncidencias();
}

function peticionIncidencias() {
    xhrIncidencias.onreadystatechange = respuestaIncidencias;
    xhrIncidencias.open("POST", "server/admin/listar_incidencias.php", true);
    xhrIncidencias.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhrIncidencias.send(null);
}

function respuestaIncidencias() {
    if (xhrIncidencias.readyState == 4 && xhrIncidencias.status == 200) {
        let respuestaJson = JSON.parse(xhrIncidencias.responseText);

        const listado = document.getElementById("listaIncidencias");

        if (respuestaJson[0].id != "sin") {
            respuestaJson.forEach(incidencia => {
                const contenedor = document.createElement("div");
                contenedor.setAttribute("class", "flex flex-col justify-between shadow hover:shadow-xl duration-300 rounded bg-white p-8");
                const principal = document.createElement("div");
                
                // CABECERA
                const cabecera = document.createElement("div");
                cabecera.setAttribute("class", "flex w-full flex-wrap justify-between mb-3");
                
                // PERSONA
                const etiquetaPersona = document.createElement("p");
                etiquetaPersona.textContent = `${incidencia.nombre} ${incidencia.apellidos}`;
                etiquetaPersona.setAttribute("class", "text-sm font-bold text-orange-800");
                cabecera.appendChild(etiquetaPersona);
                
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
                
                //Responder
                const respuesta = document.createElement("form");
                respuesta.setAttribute("action", "server/admin/resolver_incidencia.php");
                respuesta.setAttribute("method", "POST");
                respuesta.innerHTML = `
                <input type='hidden' name='incidencia' id='incidencia' value='${incidencia.id}'/>
                <textarea name='respuesta' id='respuesta' required placeholder='Respuesta a la incidencia' cols='30' rows='5' class='bg-gray-100 p-3 rounded w-full border mt-2 border border-gray-300 text-sm'></textarea>
                <input type='submit' value="Responder" class='mt-3 w-full bg-teal-800 duration-300 cursor-pointer hover:bg-teal-900 text-white rounded font-semibold py-2'>
                `;
                contenedor.appendChild(respuesta);

                listado.appendChild(contenedor);
            });
        } else {
            const pNada = document.createElement("p");
            pNada.textContent = "(Sin incidencias por resolver)";
            pNada.setAttribute("class", "w-full text-center col-span-2 italic");
            listado.appendChild(pNada);
        }
    }
}