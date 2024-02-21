(function(){
// agregando js para mostrar el formulario
const nuevoEmbarque =  document.querySelector('#embarque');
nuevoEmbarque.addEventListener('click', function() {
                                mostrarFormulario();
                                });

    function mostrarFormulario(){
        const modal = document.createElement('div');
        modal.classList.add('mod');
        modal.innerHTML = `
        <form class="formulario row g-3">
            <h5>Emabarcar</h5>
            <length class="legent">Generar nuevo embarque</length>
            <div class="col-12">
                <label class="form-label">Registra el WH</label>
                <input
                    autocomplete="off"
                    class="form-control"
                    type="text"
                    name="wh"
                    placeholder="Ingresa el wh"
                    id="wh"
                />
            </div>
            <div class="col-12">
                <label class="form-label">Orden de Embarque</label>
                <input
                    autocomplete="off"
                    class="form-control"
                    type="text"
                    name="n_emb"
                    placeholder="Agrega la orden de Embarque"
                    id="n_emb"
                />
            </div>
            <div class="opciones col-12">
                <input
                    type="submit"
                    class="registrar-wh btn btn-primary w-100"
                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                    value="GENERAR"
                />
                <button
                    class="cerrar-modal registrar-wh btn btn-warning w-100 mt-2"
                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                    type="button"
                >
                    Cancelar
                </button>
            </div>
        </form>
        `;

        setTimeout(()=> {
            const formulario = document.querySelector('.formulario');
            formulario.classList.add('animar');
        }, 0)

        //eventos de los botones
        modal.addEventListener('click', function(e) {
            //importante previene las acciones por defecto como enviar el formulario
            e.preventDefault();
                if(e.target.classList.contains('cerrar-modal')){
                    const formulario = document.querySelector('.formulario');
                    formulario.classList.add('cerrar');
                    setTimeout(() =>{
                        modal.remove();
                    },500);
                    return;
                }
                //creando el boton guardar
                if(e.target.classList.contains('registrar-wh')){
                    //leer el valor del iput
                    const nuevoEmbarque = document.querySelector('#wh').value.trim();
                        //mostrar un mensaje de alertasi el campo esta en blanco
                        if(nuevoEmbarque === ''){
                            // mostrar error en el modal
                            mostrarAlerta('El Warehouse es obligatorio', 'alert-danger', document.querySelector('.formulario .legent'));
                            return;
                        }
                    const ordenEmbarque = document.querySelector('#n_emb').value.trim();
                        //mostrar un mensaje de alertasi el campo esta en blanco
                        if(ordenEmbarque === ''){
                            // mostrar error en el modal
                            mostrarAlerta('Es necesario agregar la orden de embarque', 'alert-danger', document.querySelector('.formulario .legent'));
                            return;
                        }
                    
                    //generar un nuevo embarque
                    generarEmbarque(nuevoEmbarque, ordenEmbarque);
                }
        });

        document.querySelector('.main').appendChild(modal);
    }

    //muestra un alerta en el modal
    function mostrarAlerta(mensaje, tipo, referencia){
        //prevenir mostrar multiples alertas
        const alertaPrevia = document.querySelector('.alert')
        if(alertaPrevia){
            alertaPrevia.remove();
        }

        //crear el html que muestra el alerta
        const alerta = document.createElement('div');
        alerta.classList.add('alert', tipo);
        alerta.textContent = mensaje;

        referencia.parentElement.insertBefore(alerta, referencia.nextElementSibling);
    }

    //Consultar el servidor via API para generar el embarque
    async function generarEmbarque(wh, orden){
        //construir la peticion al servidor
        const datos = new FormData();
        datos.append('wh', wh);
        datos.append('orden', orden);
        datos.append('tracking', obtenerDatos());

        //try catch para ver los resultados de la peticion sin detener el servidor
        try{
            const url = '/api/embarque';
            const repuesta = await fetch(url, { method: 'POST', body: datos });
            console.log(repuesta);
            const resultado = await repuesta.json();
            mostrarAlerta(resultado.mensaje, resultado.tipo, document.querySelector('.formulario .legent'));
            
            //cerrar el modal
            if(resultado.tipo === 'alert-success'){
                const modal = document.querySelector('.mod');
                setTimeout(()=>{
                    modal.remove();
                }, 1000)
            }

        }catch(error){
            console.log(error);

        }

    }

    //obtener datos desde la url par verificaciones
    function obtenerDatos() {
        const cargaParams = new URLSearchParams(window.location.search);
        const carga = Object.fromEntries(cargaParams.entries());
        return carga.t;
    }

})();