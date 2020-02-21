var insumo = {
    id: '',
    nombre: '',
    cantidad: '',
    precio: '',
    estado: '', 
    tipoInsumo: ''
};

function listarTablaTipoInsumo( objeto, metodo, idTabla, idTipoInsumo ) {

    var consulta = {
        object: objeto,
        process: metodo,
        information: {
            identificador: idTipoInsumo
        }
    };

    ajax = new ajaxObject(consulta);
    ajax.prepareCall().done(function (result) {
        var object = JSON.parse(result);
        if (object.reg) {
            //mensajeExito( 'Proceso Completado', object.msg, 'Aceptar');
            crearTablaTipoInsumo(idTabla, object.data);
        } else {
            //mensajeError( 'Error', object.msg, 'Regresar');
            $('#' + idTabla + ' tbody').html('');  
        } 
    }).fail(function (msg) {
        console.error('Ha Ocurrido un Error en la Llamada Refresh en Ajax. \n ' + msg);
    });

}
function crearTablaTipoInsumo(tabla, objeto) {

    $('#' + tabla + ' tbody').html('');

    if (objeto.length !== 0) {

        var tbody = document.getElementById(tabla).querySelector('tbody');
        var elementos = ['identificador', 'insumo', 'cantidad', 'precio'];
        var td = [], tr, txt = [], textNode, buttons = [], icons = [], input = '';

        for (var i = 0; i < objeto.length; i++) {

            txt[0] = objeto[i].ide_ins;
            txt[1] = objeto[i].nom_ins;
            txt[2] = objeto[i].can_ins;
            txt[3] = objeto[i].pre_ins;


            for (var j = 0; j < elementos.length; j++) {
                td[j] = document.createElement('td');
                td[j].setAttribute('class', elementos[j]);
                textNode = document.createTextNode(txt[j]);
                td[j].appendChild(textNode);
            }


            input = document.createElement('input');
            input.setAttribute('type', 'hidden');
            input.setAttribute('class', 'idTipoInsumo');
            input.setAttribute('value', objeto[i].ide_tip);

            td[4] = document.createElement('td');

            buttons[0] = document.createElement('button');
            buttons[0].setAttribute('class', 'btn btn-gradient-info btn-rounded btn-icon btnEditInsumo');
            icons[0] = document.createElement('i');
            icons[0].setAttribute('class', 'mdi mdi-lead-pencil');

            buttons[0].appendChild(icons[0]);

            buttons[1] = document.createElement('button');
            buttons[1].setAttribute('class', 'btn btn-gradient-danger btn-rounded btn-icon btnDeleteInsumo');
            buttons[1].setAttribute('data-toggle', 'modal');
            buttons[1].setAttribute('data-target', '#ModalDeleteInsumo');

            icons[1] = document.createElement('i');
            icons[1].setAttribute('class', 'mdi mdi-delete');

            buttons[1].appendChild(icons[1]);

            for (var j = 0; j < buttons.length; j++) {
                td[4].appendChild(buttons[j]);
            }
            
            tr = document.createElement('tr');

            for (var j = 0; j < td.length; j++) {
                tr.appendChild(td[j]);
                if( j == 3 ){
                    tr.appendChild( input );
                }
            }

            
            tr.querySelector('.btnEditInsumo').addEventListener('click', function () {
                var row = $(this).parent().parent()[0];
                var tipoInsumo = $('#cardTablaInsumo .nombreInsumo').html().split(' ')[1];

                insumo.tipoInsumo = row.querySelector('.idTipoInsumo').value;
                insumo.id = row.querySelector('.identificador').innerHTML;
                insumo.nombre = row.querySelector('.insumo').innerHTML;
                insumo.cantidad = row.querySelector('.cantidad').innerHTML;
                insumo.precio = row.querySelector('.precio').innerHTML;
                insumo.estado = '1';
                

                $('#panelInfoInsumos #tituloInsumo').html( insumo.nombre );
                $('#panelInfoInsumos #identificadorInsumo').html( insumo.id );
                $('#panelInfoInsumos #nombreInsumo').html( insumo.nombre );
                $('#panelInfoInsumos #precioInsumo').html( insumo.precio + ' BsF');
                $('#panelInfoInsumos #cantidadInsumo').html( insumo.cantidad );
                $('#panelInfoInsumos #TipoInsumo').html(tipoInsumo);
                $('#panelInfoInsumos #identificadorTipoInsumo').html( insumo.tipoInsumo );
                
                $('#cardTablaInsumo').fadeToggle();
                $('#panelInfoInsumos').fadeToggle();
                
            });

            tr.querySelector('.btnDeleteInsumo').addEventListener('click', function () {
                var row = $(this).parent().parent()[0];
                insumo.id = row.querySelector('.identificador').innerHTML;
                insumo.tipoInsumo = row.querySelector('.idTipoInsumo').value;
               $('#FormDeleteInsumo .identificador').val( insumo.id );

            });
            tbody.appendChild(tr);
        }
    }

}