class incidenciaBox extends HTMLElement{
    constructor(){
        super();
        this.id;
        this.estado;
        this.fecha;
        this.asunto;
        this.aula;
        this.grupo;
        this.tipo;
        this.respuesta;
        this.descripcion;
    }

    static get observedAttributes(){
        return ["id","estado","fecha","asunto","aula","grupo","tipo","respuesta","descripcion"];
    }

    attributeChangedCallback(nameAttr, oldValue, newValue){
        switch(nameAttr){
            case "id":
                this.id = newValue;
            break;
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
            case "descripcion":
                this.descripcion = newValue;
            break;
        }
    }

    connectedCallback(){
        this.innerHTML = `
            <div>
                <div class='flex w-full flex-wrap justify-between items-center'>
                    <p class='py-1 px-2 rounded-full bg-red-200'>${estado}</p>
                    <p>${fecha}</p>
                </div>
                <h3>${asunto}</h3>
                <div class='flex flex-wrap justify-start items-center'>
                    <p class='text-sm text-bold'>Tipo: <span class='text-normal'>${tipo}</span></p>
                    <p class='text-sm text-bold'>Grupo: <span class='text-normal'>${grupo}</span></p>
                    <p class='text-sm text-bold'>Aula: <span class='text-normal'>${aula}</span></p>
                </div>
                <p class='text-sm'>${descripcion}</p>
                <div class='bg-green-200 border rounded p-3'>
                    <p class='text-sm font-bold'>Respuesta: <span clas='font-normal'>${respuesta}</span></p>
                </div>
            </div>
            <div>
                <form action='' method='POST'>
                    <input type='hidden' value='${id}'>
                    <input type='submit' value='Archivar'>
                </form>
                
            </div>
        `
        this.setAttribute("class", "flex flex-col flex-wrap justify-between");
    }
}

window.customElements.define("incidencia-box", incidenciaBox);