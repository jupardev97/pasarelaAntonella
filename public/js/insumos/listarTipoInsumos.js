function listarTipoInsumo(objeto, metodo, idContenedor) {

    var consulta = {
        object: objeto,
        process: metodo
    };

    ajax = new ajaxObject(consulta);
    ajax.prepareCall().done(function (result) {
        var object = JSON.parse(result);
        if (object.reg) {
//            mensajeExito('Actualizacion de contenedor', object.msg, 'Aceptar');
            crearTarjetas(idContenedor, object);
        } else {
            crearTarjetas(idContenedor, object);
//            mensajeExito('Actualizacion de contenedor', object.msg, 'Aceptar');
        }

    }).fail(function (msg) {
        console.error('Ha Ocurrido un Error en la Llamada Refresh en Ajax. \n ' + msg);
    });

}
function crearTarjetas(contenedor, objeto) {

    $('#' + contenedor).html('');
    var contenedor = $('#' + contenedor);

    if (objeto.reg != 0) {

        var tarjetas = [], enlace, titulo;

        for (var i = 0; i < objeto.data.length; i++) {

            var divs = [];
            var textNode = document.createTextNode( objeto.data[i].tip_ins );
            titulo = document.createElement('p');
            titulo.setAttribute('class','bg-white text-info text-white m-0');
            titulo.appendChild( textNode );
            
            delete textNode;
            
            divs[0] = document.createElement('div');
            divs[0].setAttribute('class','border-tape-info text-center up-10');
            
            divs[0].appendChild( titulo );
            
            var img = document.createElement('img');
            img.setAttribute('class', 'card-img-top img-responsive');
            img.setAttribute('src', 'images/tipoInsumo/mini tipo insumo.png');
            
            
            divs[1] = document.createElement('div');
            divs[1].setAttribute('class','card bg-none');
            
            divs[1].appendChild(img);
            divs[1].appendChild(divs[0]);
            
            delete img;
            
            var enlace = document.createElement('a');
            enlace.setAttribute( 'class', 'setDataTipoInsumo' );
            enlace.setAttribute( 'id', objeto.data[i].ide_tip );
            enlace.setAttribute( 'name', objeto.data[i].tip_ins );
            enlace.setAttribute( 'href', '#' );
            enlace.appendChild( divs[1] );
            
            divs[2] = document.createElement('div');
            divs[2].setAttribute( 'class' , 'col-12 col-md-4 mb-5' );
            divs[2].appendChild( enlace );
            
            
            divs[2].querySelector('.setDataTipoInsumo').addEventListener('click', function () {
                var link = $(this)[0];
                $('#ModalCreateInsumo .tipoInsumo').val( link.getAttribute('id') );
                $('#FormEditInsumo .tipoInsumo').val( link.getAttribute('id') );

                $('#cardTablaInsumo .nombreInsumo').html(' ');
                $('#cardTablaInsumo .nombreInsumo').html( 'Tipo: ' + link.getAttribute('name') );
                listarTablaTipoInsumo( 'Insumo', 'listarInsumos', 'tblInsumo', link.getAttribute('id') );
                $('#panelTipoIsumo').fadeToggle();
                $('#cardTablaInsumo').fadeToggle();
            });
            
            contenedor[0].appendChild( divs[2] );
            delete divs, enlace;
        }
    }else{
        var titulo = document.createElement('h4');
        titulo.setAttribute( 'class', 'text-info h4 bg-white m-0' );
        titulo.appendChild( document.createTextNode( 'No Existen Tipos de Insumos Registrados' ) );
        var div = document.createElement('div');
        div.setAttribute('class' , 'col-12 border-tape-info text-center p-0 mb-5');
        div.appendChild(titulo);
        contenedor[0].appendChild(div);
        delete div, titulo;
    }

}