(function(){

    //obtener el historial de la carga, todas las acciones realizadas
    obtenerHistorial();

    const historial = document.querySelector('#actualizar-estado')
    historial.addEventListener('click', function(){
        mostrarFormumario()

    });

    async function obtenerHistorial(){
        try {
            //obtener el token de la url
            const t = obtenerDatos();
            const ur = `/api/historial?t=${t}`;
            const respuesta = await fetch(ur);
            const resultado = await respuesta.json();

            const { historial } = resultado;
            mostrarHistory(historial);

        } catch (error) {

        }
    }

    function mostrarHistory(historial){
        //verificar si hay registros ingresados en la bdd
        if (historial.length === 0){
            const contenedorHistorial = document.querySelector('#lista-historial');

            //si no hay registros mostrar el mensaje que no hay registros ingresados
            const noHistory = document.createElement('li');
            noHistory.textContent = 'Aun no hay guias registradas';

            //pasar y mostrar el html
            contenedorHistorial.appendChild(noHistory);
            return;
        }

        const estado ={
            1: 'Embarcado',
            2: 'Guia generada',
            3: 'Embarque Confirmado',
            4: 'Carga en Transito',
            5: 'Arribo UIO',
            6: 'Inicio Aduna',
            7: 'En espera de canal de aforo',
            8: 'Aforo asignado',
            9: 'Salida autorizada',
            10: 'Enviado a provincia',
            11: 'Despacho programado',
            12: 'En transito',
            13: 'En Hold',
            14: 'Entregado',
            15: 'Embarque sin autorizacion',
            16: 'Embarque con retraso en aduana',
            17: 'Retraso',
            18: 'Peso actualizado'
        }

        historial.forEach(history => {
            const contenedorHistorial = document.createElement('li');
            contenedorHistorial.classList.add('list-group-item');
            contenedorHistorial.dataset = history.id;
                //contenid de la lista
                const histFecha = document.createElement('div');
                histFecha.textContent = history.f_update;
                
                const histEstado = document.createElement('div');
                histEstado.textContent = estado[history.estado];
                
                const histComentario = document.createElement('div');
                histComentario.textContent = history.comentario;

                //mostrar 
                contenedorHistorial.appendChild(histFecha);
                contenedorHistorial.appendChild(histEstado);
                contenedorHistorial.appendChild(histComentario);

                const listadoHistorial =  document.querySelector('#lista-historial');
                listadoHistorial.appendChild(contenedorHistorial);
            
        });

    }

    function mostrarFormumario(){
        const modal = document.createElement('div');
        modal.classList.add('mod');
        modal.innerHTML = `
        <form class="formulario row g-3">
            <h5>Guias</h5>
            <length class="legent">Actualizar estado</length>
            <div class="col-12">
                <select class="form-select form-select-sm" id="e" name="estado">
                    <option vauel=""selected>Seleciona un nuevo estado</option>
                    <option value="3">Embarque Confirmado</option>
                    <option value="4">Carga en Transito</option>
                    <option value="5">Arribo UIO</option>
                    <option value="6">Inicio Aduana</option>
                    <option value="7">En espera de canal de aforo</option>
                    <option value="8">Aforo asignado</option>
                    <option value="9">Salida autorizada</option>
                    <option value="10">Enviado a provincia</option>
                    <option value="11">Despacho programado</option>
                    <option value="12">En transito</option>
                    <option value="13">En hold</option>
                    <option value="14">Entregado</option>
                    <option value="15">Embarque sin autorizacion</option>
                    <option value="16">Embarque con retraso en aduana</option>
                    <option value="17">Retraso</option>
                </select>
            </div>
            <div class="col-12">
                <label class="form-label">Observacion</label>
                <input
                    autocomplete="off"
                    class="form-control"
                    type="text"
                    name="comentario"
                    placeholder="Describe el estado"
                    id="comentario"
                />
            </div>
            <div class="opciones col-12">
                <input
                    type="submit"
                    class="actualizar-estado btn btn-primary w-100"
                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                    value="Actualizar"
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
                if(e.target.classList.contains('actualizar-estado')){
                    //leer el valor del iput
                    const nuevoComentario = document.querySelector('#comentario').value.trim();
                    const nuevoEstado = document.querySelector('#e').value.trim();
                        //mostrar un mensaje de alertasi el campo esta en blanco
                            if(nuevoComentario === '' && nuevoEstado === ''){
                        // mostrar error en el modal
                            mostrarAlerta('Todos los campos son oblitatorios', 'alert-danger', document.querySelector('.formulario .legent'));
                                return;
                            }
                    
                    //generar un nuevo estado, update
                    agregarEstado(nuevoEstado, nuevoComentario);
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
    async function agregarEstado(estado, obs){
        //construir la peticion al servidor
        const datos = new FormData();
        datos.append('estado', estado);
        datos.append('comentario', obs);
        datos.append('tracking', obtenerDatos());

        //try catch para ver los resultados de la peticion sin detener el servidor
        try{
            const url = 'http://localhost:3000/api/historial';
            const repuesta = await fetch(url, {
                method: 'POST',
                body: datos 
            })
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