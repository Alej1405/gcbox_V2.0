(function(){
     //======= script para agregar nueva embarque=========

const nuevoEmbarque = document.querySelector('#embarque');
nuevoEmbarque.addEventListener('click', mostrarFomulario);

function mostrarFomulario(){
    const modal = document.createElement('DIV');
    modal.classList.add('mod');
    modal.innerHTML = `
            <form class="formulario guardar-warehose">
                <legend>Añade una nueva tarea</legend>
                <div class="campo">
                    <label>Tarea</label>
                    <input 
                        type="text"
                        name="wehereHause"
                        placeholder=" 'Edita la wehereHause' : 'Añadir wehereHause al Proyecto Actual'}"
                        id="wehereHause"
                    />
                </div>
                <div class="opciones">
                    <input
                        value="Guardar"
                        type="submit" 
                        class="btn-guardar-warehose" 
                    />
                    <button type="button" class="btn-guardar-warehose">jaja</button>
                    <button type="button" class="cerrar-modal">Cancelar</button>
                </div>
            </form>
        `;
    setTimeout(()=>{
        const formulario = document.querySelector('.formulario');
        formulario.classList.add('animar');
    },0);

    modal.addEventListener('click', function(e) {
        e.preventDefault;
        if(e.target.classList.contains('cerrar-modal')){
            
            const formulario = document.querySelector('.formulario');
            formulario.classList.add('cerrar');

            setTimeout(()=>{
                modal.remove();
            },500)
        }

        if(e.target.classList.contains('btn-guardar-warehose')) {
           //seleccionamos el campo del fomulario con query selector y con trim eliminamos los posibles espacios en blanco
            const warehose = document.querySelector('#wehereHause').value.trim();

            if (warehose === '' ){
                //mostrar un error si el campo esta en blanco.
                    mostrarAlerta('EL warehouse es obligatorio para embarcar', 'alert-danger', document.querySelector('.formulario legent'));
                return;
            }
            generarEmbarque(embarque);
        }
    })

    document.querySelector('#main').appendChild(modal);

    }

    //mostrar un alerta en el formulario
    function mostrarAlerta(mensaje, tipo, referencia){
        //prevenir que se muestren mas alertas en el fomulario 
        const alertaPrevia = document.querySelector('.alert');
        if (alertaPrevia) {
            alertaPrevia.remove();
        }

        const alert = document.createElement('div');
        alert.classList.add('alert', tipo);
        alert.textContent = mensaje;
        //insertar el mensaje utilizando la funcion sibling que quiere decir entre los hermanos
        referencia.appendChild(alert);

        //eliminar la alerta despues de 5 segundos
        setTimeout(() => {
            alert.remove();
        },5000)

    }

    //consultar el servidor para generar el embarque
    async function generarEmbarque(embarque){
        // Construir la peticion
        const datos = new FormData();
        datos.append('embarque', embarque);

        //el trycatch no detiene el servidor si algo va mal
        try{
            const url = 'http://localhost:3000/api/embarque';
            const respuesta = await fetch(url, {
                method: 'POST',
                body: datos
            });
            const resultado = await respuesta.json();
            console.log(resultado);

        }catch{
            console.log(error);

        }
    }



})();