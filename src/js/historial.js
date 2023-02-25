addEventListener('DOMContentLoaded', eventos);

const xhrHistorial = new XMLHttpRequest();

function eventos() {
    peticionHistorial();
    document.getElementById("asunto").addEventListener("input", peticionHistorial);
    document.getElementById("estado").addEventListener("change", peticionHistorial);
    document.getElementById("tipo").addEventListener("change", peticionHistorial);
}

function peticionHistorial() {
    xhrHistorial.onreadystatechange = respuestaHistorial;
    xhrHistorial.open("POST", "server/historial_incidencias.php", true);
    xhrHistorial.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    const idProfesor = document.getElementById("idProfesor");
    const estado = document.getElementById("estado");
    const tipo = document.getElementById("tipo");
    const asunto = document.getElementById("asunto");
    xhrHistorial.send(`id_profesor=${idProfesor.value}&estado=${estado.value}&tipo=${tipo.value}&asunto=${asunto.value}`);
}

function respuestaHistorial(){
    if(xhrHistorial.readyState == 4 && xhrHistorial.status == 200){
        console.log(xhrHistorial.responseText);
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
            if(fila.estado == "EN PROCESO"){
                tdEstado.setAttribute("class", "text-xs w-fit mb-3 text-orange-500 font-bold");                
            }else{
                tdEstado.setAttribute("class", "text-xs w-fit mb-3 text-green-500 font-bold");
            }
            tdEstado.textContent = fila.estado;

            const tdFecha = tr.insertCell(5);
            tdFecha.textContent = fila.fecha;

            const tdLeerMas =  tr.insertCell(6);
            tdLeerMas.innerHTML = `<button onclick='peticionFicha(${fila.id})' class='font-bold text-pink-800 underline hover:text-pink-900'>Leer más</>`;

            const tds = [tdTipo, tdAula, tdGrupo, tdFecha];
            tds.forEach(td => {
                td.setAttribute("class", "py-3 px-2");
            });

        });
    }
}