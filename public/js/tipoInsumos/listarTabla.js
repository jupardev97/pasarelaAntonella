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
            crearTabla(idTabla, object.data);
        } else {
//            mensajeExito('Actualizacion de Tabla', object.msg, 'Aceptar');
        }

    }).fail(function (msg) {
        console.error('Ha Ocurrido un Error en la Llamada Refresh en Ajax. \n ' + msg);
    });

}

function crearTabla(tabla, objeto) {

    $('#' + tabla + ' tbody').html(' ');

    if (objeto.length !== 0) {

        var tbody = document.getElementById(tabla).querySelector('tbody');
        var elementos = ['identificador', 'tipoInsumo', 'estado'];
        var td = [], tr, txt = [], textNode, buttons = [], icons = [];

        for (var i = 0; i < objeto.length; i++) {

            txt[0] = objeto[i].ide_tip;
            txt[1] = objeto[i].tip_ins;
            if (objeto[i].est_tip == '1') {
                txt[2] = 'Activo';
            } else {
                txt[2] = 'Inactivo';
            }

            for (var j = 0; j < elementos.length; j++) {
                td[j] = document.createElement('td');
                td[j].setAttribute('class', elementos[j]);
                textNode = document.createTextNode(txt[j]);
                td[j].appendChild(textNode);
            }

            td[3] = document.createElement('td');

            buttons[0] = document.createElement('button');
            buttons[0].setAttribute('class', 'btn btn-gradient-info btn-rounded btn-icon btnEditTipoInsumo');
            buttons[0].setAttribute('data-toggle', 'modal');
            buttons[0].setAttribute('data-target', '#ModalEditTipoInsumo');

            icons[0] = document.createElement('i');
            icons[0].setAttribute('class', 'mdi mdi-lead-pencil');

            buttons[0].appendChild(icons[0]);

            buttons[1] = document.createElement('button');
            buttons[1].setAttribute('class', 'btn btn-gradient-danger btn-rounded btn-icon btnDeleteTipoInsumo');
            buttons[1].setAttribute('data-toggle', 'modal');
            buttons[1].setAttribute('data-target', '#ModalDeleteTipoInsumo');

            icons[1] = document.createElement('i');
            icons[1].setAttribute('class', 'mdi mdi-delete');

            buttons[1].appendChild(icons[1]);

            for (var j = 0; j < buttons.length; j++) {
                td[3].appendChild(buttons[j]);
            }

            tr = document.createElement('tr');

            for (var j = 0; j < td.length; j++) {
                tr.appendChild(td[j]);
            }

            tr.querySelector('.btnEditTipoInsumo').addEventListener('click', function () {
                var row = $(this).parent().parent()[0];

                $('#FormEditTipoInsumo .identificador').val(row.querySelector('.identificador').innerHTML);
                $('#FormEditTipoInsumo .tipoInsumo').val(row.querySelector('.tipoInsumo').innerHTML);
                ( row.querySelector('.estado').innerHTML === 'Activo' ) ? $('#FormEditTipoInsumo .estado')[0].selectedIndex = 0 : $('#FormEditTipoInsumo .estado')[0].selectedIndex = 1;
            });

            tr.querySelector('.btnDeleteTipoInsumo').addEventListener('click', function () {
                var row = $(this).parent().parent()[0];
                $('#FormDeleteTipoInsumo .identificador').val(row.querySelector('.identificador').innerHTML);
            });
            tbody.appendChild(tr);
        }
    }

}