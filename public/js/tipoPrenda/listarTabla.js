function listarTabla(objeto, metodo, idTabla) {

    var consulta = {
        object: objeto,
        process: metodo
    };

    ajax = new ajaxObject(consulta);
    ajax.prepareCall().done(function (result) {
        var object = JSON.parse(result);
        if (object.reg) {
            crearTabla(idTabla, object.data);
        } else {
            $('#' + idTabla + ' tbody').html(' ');
        }

    }).fail(function (msg) {
        console.error('Ha Ocurrido un Error en la Llamada Refresh en Ajax. \n ' + msg);
    });

}
function crearTabla(tabla, objeto) {

    $('#' + tabla + ' tbody').html(' ');

    if (objeto.length !== 0) {

        var tbody = document.getElementById(tabla).querySelector('tbody');
        var elementos = ['identificador', 'tipoPrenda', 'estado'];
        var td = [], tr, txt = [], textNode, buttons = [], icons = [];

        for (var i = 0; i < objeto.length; i++) {

            txt[0] = objeto[i].ide_tip;
            txt[1] = objeto[i].tip_pre;
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
            buttons[0].setAttribute('class', 'btn btn-gradient-info btn-rounded btn-icon btnEditTipoPrenda');
            buttons[0].setAttribute('data-toggle', 'modal');
            buttons[0].setAttribute('data-target', '#ModalEditTipoPrenda');

            icons[0] = document.createElement('i');
            icons[0].setAttribute('class', 'mdi mdi-lead-pencil');

            buttons[0].appendChild(icons[0]);

            buttons[1] = document.createElement('button');
            buttons[1].setAttribute('class', 'btn btn-gradient-danger btn-rounded btn-icon btnDeleteTipoPrenda');
            buttons[1].setAttribute('data-toggle', 'modal');
            buttons[1].setAttribute('data-target', '#ModalDeleteTipoPrenda');

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

            tr.querySelector('.btnEditTipoPrenda').addEventListener('click', function () {
                var row = $(this).parent().parent()[0];

                $('#FormEditTipoPrenda .identificador').val(row.querySelector('.identificador').innerHTML);
                $('#FormEditTipoPrenda .tipoPrenda').val(row.querySelector('.tipoPrenda').innerHTML);
                ( row.querySelector('.estado').innerHTML === 'Activo' ) ? $('#FormEditTipoPrenda .estado')[0].selectedIndex = 0 : $('#FormEditTipoPrenda .estado')[0].selectedIndex = 1;
            });

            tr.querySelector('.btnDeleteTipoPrenda').addEventListener('click', function () {
                var row = $(this).parent().parent()[0];
                $('#FormDeleteTipoPrenda .identificador').val(row.querySelector('.identificador').innerHTML);
            });
            tbody.appendChild(tr);
        }
    }

}