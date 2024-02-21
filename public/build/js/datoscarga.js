(function(){
    
    //boton embarques
    const btnEmbarque = document.querySelector('#emb');
    btnEmbarque.addEventListener('click', function(){
        activarBoton('#emb', '.profile-overview');
    });

    //boton guias
    const btnGuia = document.querySelector('#guia');
    btnGuia.addEventListener('click', function(){
        activarBoton('#guia', '.profile-settings');
    });

    //boton Historial
    const btnHis = document.querySelector('#his');
    btnHis.addEventListener('click', function(){
        activarBoton('#his', '.profile-history');
    });

    //boton docs
    const btnDoc = document.querySelector('#doc');
    btnDoc.addEventListener('click', function(){
        activarBoton('#doc', '.profile-change-password');
    });

    function activarBoton(id, card){
        //eliminar previos
        const prev = document.querySelector('.active');
        if(prev){
            prev.classList.remove('active')
            const carI = document.querySelector('.show');
            if(carI){
                carI.classList.remove('active');
                carI.classList.remove('show');
            }
        }
        
        //agregar 
        const btnAct = document.querySelector(id);
        btnAct.classList.toggle('active');

        const carInfor = document.querySelector(card);
        carInfor.classList.toggle('show');
        carInfor.classList.toggle('active');
    }


})();