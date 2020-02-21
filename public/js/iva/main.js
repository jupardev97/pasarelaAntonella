$(function () {

    listarTabla('Iva', 'seleccionarTodos', 'tblIva');


    $('.fechaActual').click(function () {
        var ahora = new Date();
        var fecha = ahora.getFullYear() + '-';
        (parseInt(ahora.getMonth()) < 10) ? (fecha += '0' + (ahora.getMonth() + 1) + '-') : (fecha += (ahora.getMonth() + 1) + '-');
        (parseInt(ahora.getDate()) < 10) ? (fecha += '0' + ahora.getDate()) : (fecha += ahora.getDate());
        for (var i = 0; i < $('form .fecha').length; i++) {
            $('form .fecha')[i].value = fecha;
        }
    });

    $('.btnEditIva').click(function () {
        var row = $(this).parent().parent()[0];

        var porcentaje = row.querySelector('.porcentaje').innerHTML;
        var fecha = row.querySelector('.fecha').innerHTML.split('-');
        $('#FormEditIva .identificador').val(row.querySelector('.identificador').innerHTML);
        $('#FormEditIva .porcentaje').val(parseInt(porcentaje[0]));
        $('#FormEditIva .fecha')[0].value = fecha[0] + '-' + fecha[1] + '-' + fecha[2];
    });

    $('.btnDeleteIva').click(function () {
        var row = $(this).parent().parent()[0];
        $('#FormDeleteIva .identificador').val(row.querySelector('.identificador').innerHTML);
    });

    $('#FormCreateIva').submit(function (event) {
        event.preventDefault();

        data = {
            object: 'Iva',
            process: 'createIva',
            information: {
                procentaje: $('#FormCreateIva .porcentaje').val(),
                fecha: $('#FormCreateIva .fecha').val()
            }
        };

        var ajax;
        ajax = new ajaxObject(data);
        ajax.prepareCall().done(function (result) {
            var object = JSON.parse(result);

            if (object.status == 'error') {
//                mensajeError( 'Error', object.msg, 'Regresar');
            } else {
//                mensajeExito( 'Proceso Completado', object.msg, 'Aceptar');
                $('#ModalCreateIva').modal('hide');
                listarTabla('Iva', 'seleccionarTodos', 'tblIva');
            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });

    });

    $('#FormEditIva').submit(function (event) {
        event.preventDefault();

        data = {
            object: 'Iva',
            process: 'editIva',
            information: {
                identificador: $('#FormEditIva .identificador').val(),
                procentaje: $('#FormEditIva .porcentaje').val(),
                fecha: $('#FormEditIva .fecha').val()
            }
        };

        var ajax;
        ajax = new ajaxObject(data);
        ajax.prepareCall().done(function (result) {
            var object = JSON.parse(result);

            if (object.status == 'error') {
//                mensajeError( 'Error', object.msg, 'Regresar');
            } else {
//                mensajeExito( 'Proceso Completado', object.msg, 'Aceptar');
                $('#ModalEditIva').modal('hide');
                listarTabla('Iva', 'seleccionarTodos', 'tblIva');
            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });
    });// End $('#FormEditIva').submit(function (event);

    $('#FormDeleteIva').submit(function (event) {
        event.preventDefault();
        data = {
            object: 'Iva',
            process: 'deleteIva',
            information: {
                identificador: $('#FormDeleteIva .identificador').val().trim()
            }
        };

        var ajax;
        ajax = new ajaxObject(data);
        ajax.prepareCall().done(function (result) {
            var object = JSON.parse(result);
            if (object.status == 'error') {
//                mensajeError( 'Error', object.msg, 'Regresar');
            } else {
//                mensajeExito( 'Proceso Completado', object.msg, 'Aceptar');
                $('#ModalDeleteIva').modal('hide');
                listarTabla('Iva', 'seleccionarTodos', 'tblIva');
            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });

    });
});