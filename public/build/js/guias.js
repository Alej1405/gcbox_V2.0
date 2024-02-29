(function(){

    obtenerGuias()

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
    
        //obtener datos desde la url par verificaciones
        function obtenerDatos() {
            const cargaParams = new URLSearchParams(window.location.search);
            const carga = Object.fromEntries(cargaParams.entries());
            return carga.t;
        }
})();