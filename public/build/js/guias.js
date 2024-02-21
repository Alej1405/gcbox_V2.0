(function(){

    obtenerGuias()

    const guias = document.querySelector('#guias');
    guias.addEventListener('click', function(){
        mostrarFormulario()
    });

    async function obtenerGuias(){
        try {
            const tracking = obtenerDatos();
            const url = `/api/guia?t=${tracking}`;
            const respuesta = await fetch(url);
            const resultado = await respuesta.json();

            //aplicando destruccion de array para obtener las guias
            const { guias } = resultado;

            //mostrar las guias en el html
            mostrarGuias(guias);

        } catch (error) {
            console.log(error);
        }
    }

    function mostrarGuias(guias){
        //verificar si hay registros ingresados en la bdd
        if (guias.length === 0){
            const contenedorGuias = document.querySelector('#lista-guias');

            //si no hay registros mostrar el mensaje que no hay registros ingresados
            const noGuias = document.createElement('li');
            noGuias.textContent = 'Aun no hay guias registradas';

            //pasar y mostrar el html
            contenedorGuias.appendChild(noGuias);
            return;
        }

        guias.forEach(listaGuias => {
            //creamos el elemnto principal de la lista agregando las clases y los id
            const contenedorGuias = document.createElement('li');
            contenedorGuias.classList.add('list-group-item');
            contenedorGuias.dataset.idGuia = listaGuias.id;

                //creamos el segundo elemnto que estara dentro del li para mostrar informacion
                const guiaNumero = document.createElement('div');
                guiaNumero.textContent = listaGuias.guia;

                //creamos el segundo elemnto que estara dentro del li para mostrar informacion
                const guiaFecha = document.createElement('div');
                guiaFecha.textContent = listaGuias.f_registro;

                //creamos el segundo elemnto que estara dentro del li para mostrar informacion
                const guiaComent = document.createElement('div');
                guiaComent.textContent = listaGuias.observaciones;

                //construir los botones para actualizar los estados de la guia
                const botonesDiv = document.createElement('div');
                botonesDiv.classList.add('btn-group');
                botonesDiv.classList.add('btn-group-sm');
                
                    //constuir los botones
                    const btnGuiasActualizar = document.createElement('button');
                    btnGuiasActualizar.classList.add('btn');
                    btnGuiasActualizar.classList.add('btn-primary');
                    btnGuiasActualizar.textContent = 'Actualizar';
                    btnGuiasActualizar.dataset.idBtnGuias = 'update-btn-guias';

                    const btnGuiasEliminar = document.createElement('button');
                    btnGuiasEliminar.classList.add('btn');
                    btnGuiasEliminar.classList.add('btn-primary');
                    btnGuiasEliminar.textContent = 'Eliminar';
                    btnGuiasEliminar.dataset.idBtnGuias = 'delete-btn-guias';

                //mostrar botones
                botonesDiv.appendChild(btnGuiasActualizar);
                botonesDiv.appendChild(btnGuiasEliminar);

                //mostrar contenido
                contenedorGuias.appendChild(guiaNumero);
                contenedorGuias.appendChild(guiaFecha);
                contenedorGuias.appendChild(guiaComent);
                contenedorGuias.appendChild(botonesDiv);

            //mostrar las tareas en el html
            const listadoGuias = document.querySelector('#lista-guias');
            listadoGuias.appendChild(contenedorGuias);
        });
    }

    function mostrarFormulario(){
        const modal = document.createElement('div');
        modal.classList.add('mod');
        modal.innerHTML = `
        <form class="formulario row g-3">
            <h5>Guias</h5>
            <length class="legent">Agregar Guia</length>
            <div class="col-12">
                <label class="form-label">Numero de Guia</label>
                <input
                    autocomplete="off"
                    class="form-control"
                    type="text"
                    name="g"
                    placeholder="Ingresa el numero de la guia"
                    id="g"
                />
            </div>
            <div class="col-12">
                <label class="form-label">Observacion de la guia</label>
                <input
                    autocomplete="off"
                    class="form-control"
                    type="text"
                    name="obs"
                    placeholder="Observaciones"
                    id="obs"
                />
            </div>
            <div class="col-12">
                <select class="form-select form-select-sm" id="consig" name="consig" aria-label=".form-select-sm example">
                    <option selected>Seleciona</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="opciones col-12">
                <input
                    type="submit"
                    class="registrar-guia btn btn-primary w-100"
                    style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"
                    value="Agregar"
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
                if(e.target.classList.contains('registrar-guia')){
                    //leer el valor del iput
                    const nuevaGuia = document.querySelector('#g').value.trim();
                        //mostrar un mensaje de alertasi el campo esta en blanco
                        if(nuevaGuia === ''){
                            // mostrar error en el modal
                            mostrarAlerta('El numero es obligatorio', 'alert-danger', document.querySelector('.formulario .legent'));
                            console.log(nuevaGuia);
                            return;
                        }
                    const obsGuia = document.querySelector('#obs').value.trim();
                        //mostrar un mensaje de alertasi el campo esta en blanco
                        if(obsGuia === ''){
                            // mostrar error en el modal
                            mostrarAlerta('Es necesario agregar la orden de embarque', 'alert-danger', document.querySelector('.formulario .legent'));
                            return;
                        }
                    const consgGuia = document.querySelector('#consig').value.trim();
                        //mostrar un mensaje de alertasi el campo esta en blanco
                        if(consgGuia === ''){
                            // mostrar error en el modal
                            mostrarAlerta('Es necesario agregar un consignatario', 'alert-danger', document.querySelector('.formulario .legent'));
                            return;
                        }
                    
                    //generar un nuevo embarque
                    agregarGuia(nuevaGuia, obsGuia, consgGuia);
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
        async function agregarGuia(guia, obs, consig){
            //construir la peticion al servidor
            const datos = new FormData();
            datos.append('guia', guia);
            datos.append('observaciones', obs);
            datos.append('id_consignatario', '2');
            datos.append('tracking', obtenerDatos());

            //try catch para ver los resultados de la peticion sin detener el servidor
            try{
                const url = 'http://localhost:3000/api/guia';
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