function listarTabla(objeto, metodo, idTabla) {

    var consulta = {
        object: objeto,
        process: metodo
    };
    ajax = new ajaxObject(consulta);
    ajax.prepareCall().done(function (result) {
        var object = JSON.parse(result);
        if (object.status == 'complete') {
            if (object.reg) {
                crearTabla(idTabla, object.data);
            }else{
                mensajeError('Actualizacion de Tabla', 'No se Encuentran Registros Disponibles', 'Regresar');
                $('#' + idTabla + ' tbody').html('');
            }
        }
    }).fail(function (msg) {
        console.error('Ha Ocurrido un Error en la Llamada Refresh en Ajax. \n ' + msg);
    });
}
function crearTabla(tabla, objeto) {
    
    if (objeto.length > 0) {

        $('#' + tabla + ' tbody').html('');
        var tbody = document.getElementById(tabla).querySelector('tbody');
        var elementos = ['identificador', 'nombre', 'telefono', 'direccion', 'correo', 'tipoProveedor'];
        var td = [], tr, txt = [], textNode, buttons = [], icons = [], inputs = [];
        for (var i = 0; i < objeto.length; i++) {

            txt[0] = objeto[i].rif_pro;
            txt[1] = objeto[i].nom_pro;
            txt[2] = (objeto[i].tel_pro) ? (objeto[i].tel_pro) : ('Sin Registrar');
            for (var j = 0; j < 3; j++) {
                td[j] = document.createElement('td');
                td[j].setAttribute('class', elementos[j]);
                textNode = document.createTextNode(txt[j]);
                td[j].appendChild(textNode);
            }

            for (var j = 0; j < 3; j++) {
                inputs[j] = document.createElement('input');
                inputs[j].setAttribute('type', 'hidden');
                inputs[j].setAttribute('class', elementos[j + 3]);
                switch (j) {
                    case 0:
                        inputs[j].setAttribute('value', objeto[i].dir_pro);
                        break;
                    case 1:
                        inputs[j].setAttribute('value', (objeto[i].cor_pro) ? (objeto[i].cor_pro) : ('Sin Registrar'));
                        break;
                    case 2:
                        inputs[j].setAttribute('value', objeto[i].tip_pro);
                        break;
                }
            }
            td[3] = document.createElement('td');

            buttons[0] = document.createElement('button');
            buttons[0].setAttribute('class', 'btn btn-gradient-primary btn-rounded btn-icon btnInfoProveedor');

            icons[0] = document.createElement('i');
            icons[0].setAttribute('class', 'mdi mdi-magnify');

            buttons[0].appendChild(icons[0]);

            buttons[1] = document.createElement('button');
            buttons[1].setAttribute('class', 'btn btn-gradient-info btn-rounded btn-icon btnEditProveedor');
            buttons[1].setAttribute('data-toggle', 'modal');
            buttons[1].setAttribute('data-target', '#ModalEditProveedor');

            icons[1] = document.createElement('i');
            icons[1].setAttribute('class', 'mdi mdi-lead-pencil');

            buttons[1].appendChild(icons[1]);

            buttons[2] = document.createElement('button');
            buttons[2].setAttribute('class', 'btn btn-gradient-danger btn-rounded btn-icon btnDeleteProveedor');
            buttons[2].setAttribute('data-toggle', 'modal');
            buttons[2].setAttribute('data-target', '#ModalDeleteProveedor');

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

            tr.querySelector('.btnInfoProveedor').addEventListener('click', function () {
                var row = $(this).parent().parent()[0];
                var divs;
                $('#nombreProveedor').html('');
                
                for (var i = 0; i < $('.datosProveedor').length; i++) {
                    divs = $('.datosProveedor')[i];
                    divs.querySelector('.rif').innerHTML = row.querySelector('.identificador').innerHTML;
                    divs.querySelector('.nombre').innerHTML = row.querySelector('.nombre').innerHTML;
                    divs.querySelector('.tipoProveedor').innerHTML = row.querySelector('.tipoProveedor').value;
                    divs.querySelector('.direccion').innerHTML = row.querySelector('.direccion').value;
                    divs.querySelector('.correo').innerHTML = row.querySelector('.correo').value;
                    divs.querySelector('.telefono').innerHTML = row.querySelector('.telefono').innerHTML;
                }
                $('#nombreProveedor').html( divs.querySelector('.nombre').innerHTML );
                
                $('#cardTablaProveedor').fadeToggle('slow');
                $('#divDatosProveedor').fadeToggle('slow');

            });

            tr.querySelector('.btnEditProveedor').addEventListener('click', function () {
                row = $(this).parent().parent()[0];
                
                $('#ModalEditProveedor .rif')[0].value = row.querySelector('.identificador').innerHTML;
                $('#ModalEditProveedor .nombre')[0].value = row.querySelector('.nombre').innerHTML;
                $('#ModalEditProveedor .direccion')[0].value = row.querySelector('.direccion').value;
                $('#ModalEditProveedor .correo')[0].value = row.querySelector('.correo').value;
                $('#ModalEditProveedor .telefono')[0].value = row.querySelector('.telefono').innerHTML;
                $('#ModalEditProveedor .tipoProveedor')[0].value = row.querySelector('.tipoProveedor').value;
            });

            tr.querySelector('.btnDeleteProveedor').addEventListener('click', function () {
                row = $(this).parent().parent()[0];
                $('#FormDeleteProveedor .identificador')[0].value = row.querySelector('.identificador').innerHTML;
            });

            tbody.appendChild(tr);
        }
    }

}