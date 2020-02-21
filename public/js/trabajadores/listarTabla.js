function listarTabla(objeto, metodo, idTabla) {

    var consulta = {
        object: objeto,
        process: metodo
    };

    ajax = new ajaxObject(consulta);
    ajax.prepareCall().done(function (result) {
        var object = JSON.parse(result);
        if (object.status == 'complete') {
            crearTabla(idTabla, object.data);
        }else{
            $('#' + idTabla + ' tbody').html('');
        }

    }).fail(function (msg) {
        console.error('Ha Ocurrido un Error en la Llamada Refresh en Ajax. \n ' + msg);
    });

}
function crearTabla(tabla, objeto) {

    $('#' + tabla + ' tbody').html('');
    
    if (objeto.trabajador.length > 0) {

        var tbody = document.getElementById(tabla).querySelector('tbody');
        var elementos = ['cedula', 'nombre', 'cargo'];
        var td = [], tr, txt = [], textNode, buttons = [], icons = [], inputs = [];

        for (var i = 0; i < objeto.trabajador.length; i++) {

            txt[0] = objeto.trabajador[i].ced_tra;
            txt[1] = objeto.trabajador[i].nom_tra;
            txt[2] = objeto.trabajador[i].ide_car;


            for (var j = 0; j < elementos.length; j++) {
                td[j] = document.createElement('td');
                td[j].setAttribute('class', elementos[j]);
                textNode = document.createTextNode(txt[j]);
                td[j].appendChild(textNode);
            }

            inputs[0] = document.createElement('input');
            inputs[0].setAttribute('type', 'hidden');
            inputs[0].setAttribute('class', 'correo');
            inputs[0].setAttribute('value', objeto.trabajador[i].cor_tra);

            inputs[1] = document.createElement('input');
            inputs[1].setAttribute('type', 'hidden');
            inputs[1].setAttribute('class', 'direccion');
            inputs[1].setAttribute('value', objeto.trabajador[i].dir_tra);

            inputs[2] = document.createElement('input');
            inputs[2].setAttribute('type', 'hidden');
            inputs[2].setAttribute('class', 'telefono');
            inputs[2].setAttribute('value', objeto.trabajador[i].tel_tra);

            inputs[3] = document.createElement('input');
            inputs[3].setAttribute('type', 'hidden');
            inputs[3].setAttribute('class', 'horas');

            inputs[4] = document.createElement('input');
            inputs[4].setAttribute('type', 'hidden');
            inputs[4].setAttribute('class', 'pago');

            if (objeto.trabajador[i].ide_car == 'administrador') {
                inputs[3].setAttribute('value', objeto.cargo[0].hor_tra);
                inputs[4].setAttribute('value', objeto.cargo[0].pag_hor);
            } else {
                inputs[3].setAttribute('value', objeto.cargo[1].hor_tra);
                inputs[4].setAttribute('value', objeto.cargo[1].pag_hor);
            }

            inputs[2].setAttribute('value', objeto.trabajador[i].tel_tra);


            td[3] = document.createElement('td');

            buttons[0] = document.createElement('button');
            buttons[0].setAttribute('class', 'btn btn-gradient-primary btn-rounded btn-icon btnInfoTrabajador');
            buttons[0].setAttribute('data-toggle', 'modal');
            buttons[0].setAttribute('data-target', '#ModalInfoTrabajador');

            icons[0] = document.createElement('i');
            icons[0].setAttribute('class', 'mdi mdi-magnify');

            buttons[0].appendChild(icons[0]);

            buttons[1] = document.createElement('button');
            buttons[1].setAttribute('class', 'btn btn-gradient-info btn-rounded btn-icon btnEditTrabajador');
            buttons[1].setAttribute('data-toggle', 'modal');
            buttons[1].setAttribute('data-target', '#ModalEditTrabajador');

            icons[1] = document.createElement('i');
            icons[1].setAttribute('class', 'mdi mdi-lead-pencil');

            buttons[1].appendChild(icons[1]);

            buttons[2] = document.createElement('button');
            buttons[2].setAttribute('class', 'btn btn-gradient-danger btn-rounded btn-icon btnDeleteTrabajador');
            buttons[2].setAttribute('data-toggle', 'modal');
            buttons[2].setAttribute('data-target', '#ModalDeleteTrabajador');

            icons[2] = document.createElement('i');
            icons[2].setAttribute('class', 'mdi mdi-delete');

            buttons[2].appendChild(icons[2]);

            for (var j = 0; j < buttons.length; j++) {
                td[3].appendChild(buttons[j]);
            }

            tr = document.createElement('tr');

            for (var j = 0; j < td.length; j++) {
                tr.appendChild(td[j]);
                if (j == 2) {
                    for (var k = 0; k < inputs.length; k++) {
                        tr.appendChild(inputs[k]);
                    }
                }
            }

//            console.log(tr);

            tr.querySelector('.btnInfoTrabajador').addEventListener('click', function () {
                row = $(this).parent().parent()[0];

                $('#ModalInfoTrabajador .cedula')[0].innerHTML = row.querySelector('.cedula').innerHTML;
                $('#ModalInfoTrabajador .nombre')[0].innerHTML = row.querySelector('.nombre').innerHTML;
                $('#ModalInfoTrabajador .direccion')[0].innerHTML = row.querySelector('.direccion').value;
                $('#ModalInfoTrabajador .cargo')[0].innerHTML = ( row.querySelector('.cargo').innerHTML == 'AD1' ) ? ( 'Administrador' ) : ( 'Vendedor(a)' ) ;

                if (row.querySelector('.correo').value == 'null') {
                    $('#ModalInfoTrabajador .correo')[0].innerHTML = 'Sin Registrar'
                } else {
                    $('#ModalInfoTrabajador .correo')[0].innerHTML = row.querySelector('.correo').value
                }

                if (row.querySelector('.telefono').value == 'null') {
                    $('#ModalInfoTrabajador .telefono')[0].innerHTML = 'Sin Registrar'
                } else {
                    $('#ModalInfoTrabajador .telefono')[0].innerHTML = row.querySelector('.telefono').value
                }

                if (row.querySelector('.horas').value == 'null') {
                    $('#ModalInfoTrabajador .horas')[0].innerHTML = 'Sin Registrar'
                } else {
                    $('#ModalInfoTrabajador .horas')[0].innerHTML = row.querySelector('.horas').value;
                }

                if (row.querySelector('.pago').value == 'null') {
                    $('#ModalInfoTrabajador .pago')[0].innerHTML = 'Sin Registrar'
                } else {
                    $('#ModalInfoTrabajador .pago')[0].innerHTML = row.querySelector('.pago').value + ' Bfs';
                }
                

                if (row.querySelector('.pago').value == 'null' || row.querySelector('.pago').value == 'null') {
                    $('#ModalInfoTrabajador .sueldo')[0].innerHTML = 'Imposible Calcular';
                } else {
                    var sueldo = parseFloat(parseFloat($('#ModalInfoTrabajador .horas')[0].innerHTML) * parseFloat($('#ModalInfoTrabajador .pago')[0].innerHTML));
                    $('#ModalInfoTrabajador .sueldo')[0].innerHTML = String(sueldo) + ' Bsf';
                }

            });

            tr.querySelector('.btnEditTrabajador').addEventListener('click', function () {
                row = $(this).parent().parent()[0];
                $('#ModalEditTrabajador .cedula')[0].value = row.querySelector('.cedula').innerHTML;
                $('#ModalEditTrabajador .nombre')[0].value = row.querySelector('.nombre').innerHTML;
                $('#ModalEditTrabajador .direccion')[0].value = row.querySelector('.direccion').value;
                (row.querySelector('.correo').value == 'null') ? ($('#ModalEditTrabajador .correo')[0].value = '') : ($('#ModalEditTrabajador .correo')[0].value = row.querySelector('.correo').value);
                (row.querySelector('.telefono').value == 'null') ? ($('#ModalEditTrabajador .telefono')[0].value = '') : ($('#ModalEditTrabajador .telefono')[0].value = row.querySelector('.telefono').value);
                (row.querySelector('.cargo').innerHTML == 'AD1') ? ($('#ModalEditTrabajador .cargo')[0].selectedIndex = 0) : ($('#ModalEditTrabajador .cargo')[0].selectedIndex = 1);
            });

            tr.querySelector('.btnDeleteTrabajador').addEventListener('click', function () {
                row = $(this).parent().parent()[0];
                $('#FormDeleteTrabajador .cedula')[0].value = row.querySelector('.cedula').innerHTML;
            });

            tbody.appendChild(tr);
        }
    }

}