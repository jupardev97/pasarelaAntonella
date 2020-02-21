function listarTabla(objeto, metodo, idTabla) {

    var consulta = {
        object: objeto,
        process: metodo
    };

    ajax = new ajaxObject(consulta);
    ajax.prepareCall().done(function (result) {
        var object = JSON.parse(result);
        if (object.reg) {
//            mensajeExito('Actualizacion de Tabla', object.msg, 'Aceptar');
            crearTabla(idTabla, object);
        } else {
//            mensajeExito('Actualizacion de Tabla', object.msg, 'Aceptar');
        }

    }).fail(function (msg) {
        console.error('Ha Ocurrido un Error en la Llamada Refresh en Ajax. \n ' + msg);
    });

}
function crearTabla(tabla, objeto) {

    $('#' + tabla + ' tbody').html('');

    
    if (objeto.data.length !== 0) {

        var tbody = document.getElementById(tabla).querySelector('tbody');
        var elementos = ['identificador', 'cargo', 'horas', 'pago'];
        var td = [], tr, txt = [], textNode, buttons = [], icons = [];
        
        for (var i = 0; i < objeto.data.length; i++) {

            txt[0] = objeto.data[i].ide_car;
            txt[1] = objeto.data[i].tip_car;
            txt[2] = (objeto.data[i].hor_tra) ? (objeto.data[i].hor_tra) : ('Sin Registrar');
            txt[3] = (objeto.data[i].pag_hor) ? (objeto.data[i].pag_hor) : ('Sin Registrar');

            for (var j = 0; j < elementos.length; j++) {
                td[j] = document.createElement('td');
                td[j].setAttribute('class', elementos[j]);
                textNode = document.createTextNode(txt[j]);
                td[j].appendChild(textNode);
            }

            td[4] = document.createElement('td');

            buttons[0] = document.createElement('button');
            buttons[0].setAttribute('class', 'btn btn-gradient-info btn-rounded btn-icon btnEditCargo');
            buttons[0].setAttribute('data-toggle', 'modal');
            buttons[0].setAttribute('data-target', '#ModalEditCargo');

            icons[0] = document.createElement('i');
            icons[0].setAttribute('class', 'mdi mdi-lead-pencil');

            buttons[0].appendChild(icons[0]);
            
            
            for (var j = 0; j < buttons.length; j++) {
                td[4].appendChild(buttons[j]);
            }

            tr = document.createElement('tr');

            for (var j = 0; j < td.length; j++) {
                tr.appendChild(td[j]);
            }

            tr.querySelector('.btnEditCargo').addEventListener('click', function () {
                var row = $(this).parent().parent()[0];

                $('#FormEditCargo .identificador').val(row.querySelector('.identificador').innerHTML);
                $('#FormEditCargo .cargo').val(row.querySelector('.cargo').innerHTML);
                (row.querySelector('.horas').innerHTML == 'Sin Registrar') ? ($('#FormEditCargo .horas').val(0)) : ($('#FormEditCargo .horas').val(parseFloat(row.querySelector('.horas').innerHTML)));
                (row.querySelector('.pago').innerHTML == 'Sin Registrar') ? ($('#FormEditCargo .pago').val(0)) : ($('#FormEditCargo .pago').val(parseFloat(row.querySelector('.pago').innerHTML)));

            });
            
            tbody.appendChild(tr);
        }
    }

}