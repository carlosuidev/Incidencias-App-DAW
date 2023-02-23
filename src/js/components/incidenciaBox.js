class incidenciaBox extends HTMLElement{
    constructor(){
        super();
        this.estado;
        this.fecha;
        this.asunto;
        this.aula;
        this.grupo;
        this.tipo;
        this.respuesta;
        this.mensaje;
    }

    static get observedAttributes(){
        return ["estado","fecha","asunto","aula","grupo","tipo","respuesta","mensaje"];
    }

    attributeChangedCallback(nameAttr, oldValue, newValue){
        switch(nameAttr){
            case "estado":
                this.estado = newValue;
            break;
            case "fecha":
                this.fecha = newValue;
            break;
            case "asunto":
                this.asunto = newValue;
            break;
            case "aula":
                this.aula = newValue;
            break;
            case "grupo":
                this.grupo = newValue;
            break;
            case "tipo":
                this.tipo = newValue;
            break;
            case "respuesta":
                this.respuesta = newValue;
            break;
            case "mensaje":
                this.mensaje = newValue;
            break;
        }
    }

    connectedCallback(){
        this.innerHTML = `
            <div class='flex w-full flex-wrap justify-between items-center'>
                <p>${estado}</p>
                <p>${fecha}</p>
            </div>
            <h3>${asunto}</h3>
            <div class='flex flex-wrap justify-start items-center'>
                <p class='text-sm text-bold'>Tipo: <span class='text-normal'>${tipo}</span></p>
                <p class='text-sm text-bold'>Grupo: <span class='text-normal'>${grupo}</span></p>
                <p class='text-sm text-bold'>Aula: <span class='text-normal'>${aula}</span></p>
            </div>

        `
        this.setAttribute("class", "flex");
    }
}

window.customElements.define("incidencia-box", incidenciaBox);