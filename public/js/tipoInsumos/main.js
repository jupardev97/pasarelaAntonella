$(function () {

    listarTabla('TipoInsumo', 'seleccionarTodos', 'tblTipoInsumo');

    $('#FormCreateTipoInsumo').submit(function (event) {
        event.preventDefault();

        data = {
            object: 'TipoInsumo',
            process: 'createTipoInsumo',
            information: {
                identificador: $('#FormCreateTipoInsumo .identificador').val(),
                tipoInsumo: $('#FormCreateTipoInsumo .tipoInsumo').val(),
                estado: $('#FormCreateTipoInsumo .estado').val()
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
                $('#ModalCreateTipoInsumo').modal('hide');
                listarTabla('TipoInsumo', 'seleccionarTodos', 'tblTipoInsumo');
                
                $('#FormCreateTipoInsumo .identificador').val('');
                $('#FormCreateTipoInsumo .tipoInsumo').val('');
                
            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });
    });

    $('#FormEditTipoInsumo').submit(function (event) {
        event.preventDefault();

        data = {
            object: 'TipoInsumo',
            process: 'editTipoInsumo',
            information: {
                identificador: $('#FormEditTipoInsumo .identificador').val(),
                tipoInsumo: $('#FormEditTipoInsumo .tipoInsumo').val(),
                estado: $('#FormEditTipoInsumo .estado').val()
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
                $('#ModalEditTipoInsumo').modal('hide');
                listarTabla('TipoInsumo', 'seleccionarTodos', 'tblTipoInsumo');
                
                $('#FormEditTipoInsumo .identificador').val('');
                $('#FormEditTipoInsumo .tipoInsumo').val('');
            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });
    });// End $('#FormEditTipoInsumo').submit(function (event);

    $('#FormDeleteTipoInsumo').submit(function (event) {
        event.preventDefault();
        data = {
            object: 'TipoInsumo',
            process: 'deleteTipoInsumo',
            information: {
                identificador: $('#FormDeleteTipoInsumo .identificador').val().trim()
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
                $('#ModalDeleteTipoInsumo').modal('hide');
                $('#FormDeleteTipoInsumo .identificador').val('');
                listarTabla('TipoInsumo', 'seleccionarTodos', 'tblTipoInsumo');
            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });

    });
});