var prenda = {
    id: '',
    tipoPrenda: '',
    nombre: '',
    cantidad: '',
    precio: '',
    color: '',
    estado: '',
    descripcion: ''
};

function listarTablaTipoPrenda( objeto, metodo, idTabla, idTipoPrenda ) {

    var consulta = {
        object: objeto,
        process: metodo,
        information: {
            identificador: idTipoPrenda
        }
    };
    
    ajax = new ajaxObject(consulta);
    ajax.prepareCall().done(function (result) {
        var object = JSON.parse(result);
        if (object.reg) {
            //mensajeExito( 'Proceso Completado', object.msg, 'Aceptar');
            crearTablaTipoPrenda(idTabla, object.data);
        } else {
            //mensajeError( 'Error', object.msg, 'Regresar');
            $('#' + idTabla + ' tbody').html('');  
        } 
    }).fail(function (msg) {
        console.error('Ha Ocurrido un Error en la Llamada Refresh en Ajax. \n ' + msg);
    });

}
function crearTablaTipoPrenda(tabla, objeto) {

    $('#' + tabla + ' tbody').html('');

    if (objeto.length !== 0) {

        var tbody = document.getElementById(tabla).querySelector('tbody');
        var elementos = ['identificador', 'prenda', 'cantidad', 'precio'];
        var td = [], tr, txt = [], textNode, buttons = [], icons = [], inputs = [];

        for (var i = 0; i < objeto.length; i++) {

            txt[0] = objeto[i].ide_pre;
            txt[1] = objeto[i].nom_pre;
            txt[2] = objeto[i].can_pre;
            txt[3] = objeto[i].cos_pre;


            for (var j = 0; j < elementos.length; j++) {
                td[j] = document.createElement('td');
                td[j].setAttribute('class', elementos[j]);
                textNode = document.createTextNode(txt[j]);
                td[j].appendChild(textNode);
            }

            inputs[0] = document.createElement('input');
            inputs[0].setAttribute('type', 'hidden');
            inputs[0].setAttribute('class', 'idTipoPrenda');
            inputs[0].setAttribute('value', objeto[i].ide_tip);
            
            inputs[1] = document.createElement('input');
            inputs[1].setAttribute('type', 'hidden');
            inputs[1].setAttribute('class', 'color');
            inputs[1].setAttribute('value', objeto[i].col_pre);
            
            inputs[2] = document.createElement('input');
            inputs[2].setAttribute('type', 'hidden');
            inputs[2].setAttribute('class', 'descripcion');
            inputs[2].setAttribute('value', objeto[i].des_pre);
            
            td[4] = document.createElement('td');

            buttons[0] = document.createElement('button');
            buttons[0].setAttribute('class', 'btn btn-gradient-info btn-rounded btn-icon btnEditPrenda');
            icons[0] = document.createElement('i');
            icons[0].setAttribute('class', 'mdi mdi-lead-pencil');

            buttons[0].appendChild(icons[0]);

            buttons[1] = document.createElement('button');
            buttons[1].setAttribute('class', 'btn btn-gradient-danger btn-rounded btn-icon btnDeletePrenda');
            buttons[1].setAttribute('data-toggle', 'modal');
            buttons[1].setAttribute('data-target', '#ModalDeletePrenda');

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
                    for(var k = 0; k < inputs.length; k++){
                        tr.appendChild( inputs[k] );
                    }
                }
            }

            tr.querySelector('.btnEditPrenda').addEventListener('click', function () {
                var row = $(this).parent().parent()[0];
                var tipoPrenda = $('#cardTablaPrenda .nombrePrenda').html().split(' ')[1];
                
                prenda.tipoPrenda = row.querySelector('.idTipoPrenda').value;
                prenda.id = row.querySelector('.identificador').innerHTML;
                prenda.nombre = row.querySelector('.prenda').innerHTML;
                prenda.cantidad = row.querySelector('.cantidad').innerHTML;
                prenda.precio = row.querySelector('.precio').innerHTML;
                prenda.color = row.querySelector('.color').value;
                prenda.descripcion = row.querySelector('.descripcion').value;
                prenda.estado = '1';

                $('#panelInfoPrendas #tituloPrenda').html( prenda.nombre );
                $('#panelInfoPrendas #identificadorPrenda').html( prenda.id );
                $('#panelInfoPrendas #nombrePrenda').html( prenda.nombre );
                $('#panelInfoPrendas #precioPrenda').html( prenda.precio + ' BsF');
                $('#panelInfoPrendas #cantidadPrenda').html( prenda.cantidad );
                $('#panelInfoPrendas #TipoPrenda').html(tipoPrenda);
                $('#panelInfoPrendas #colorPrenda').html(prenda.color);
                $('#panelInfoPrendas #descripcionPrenda').html(prenda.descripcion);
                $('#panelInfoPrendas #identificadorTipoPrenda').html( prenda.tipoPrenda );
                
                $('#cardTablaPrenda').fadeToggle();
                $('#panelInfoPrendas').fadeToggle();
                
            });

            tr.querySelector('.btnDeletePrenda').addEventListener('click', function () {
                var row = $(this).parent().parent()[0];
                prenda.id = row.querySelector('.identificador').innerHTML;
                prenda.tipoPrenda = row.querySelector('.idTipoPrenda').value;
               $('#FormDeletePrenda .identificador').val( prenda.id );
            });
            tbody.appendChild(tr);
        }
    }
}