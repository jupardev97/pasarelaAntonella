$(function () {

    listarTabla('TipoPrenda', 'seleccionarTodos', 'tblTipoPrenda');

    $('#FormCreateTipoPrenda').submit(function (event) {
        event.preventDefault();
        data = {
            object: 'TipoPrenda',
            process: 'createTipoPrenda',
            information: {
                codigoTipoPrenda: $('#FormCreateTipoPrenda .codigoTipoPrenda').val(),
                tipoPrenda: $('#FormCreateTipoPrenda .tipoPrenda').val(),
                estado: $('#FormCreateTipoPrenda .estado').val()
            }
        };
        
        var ajax;
        ajax = new ajaxObject(data);
        ajax.prepareCall().done(function (result) {
            console.log( result );
            var object = JSON.parse(result);

            if (object.status == 'error') {
//                mensajeError( 'Error', object.msg, 'Regresar');
            } else {
//                mensajeExito( 'Proceso Completado', object.msg, 'Aceptar');
                $('#ModalCreateTipoPrenda').modal('hide');
                listarTabla('TipoPrenda', 'seleccionarTodos', 'tblTipoPrenda');
                $('#FormCreateTipoPrenda .codigoTipoPrenda').val('');
                $('#FormCreateTipoPrenda .tipoPrenda').val('');
                $('#FormCreateTipoPrenda .estado')[0].selectedIndex = 0;
                
            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });
        
    });

    $('#FormEditTipoPrenda').submit(function (event) {
        event.preventDefault();

        data = {
            object: 'TipoPrenda',
            process: 'editTipoPrenda',
            information: {
                identificador: $('#FormEditTipoPrenda .identificador').val(),
                tipoPrenda: $('#FormEditTipoPrenda .tipoPrenda').val(),
                estado: $('#FormEditTipoPrenda .estado').val()
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
                $('#ModalEditTipoPrenda').modal('hide');
                listarTabla('TipoPrenda', 'seleccionarTodos', 'tblTipoPrenda');
                $('#FormCreateTipoPrenda .identificador').val('');
                $('#FormCreateTipoPrenda .tipoPrenda').val('');
                $('#FormCreateTipoPrenda .estado')[0].selectedIndex = 0;

            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });

    });// End $('#FormEditTipoPrenda').submit(function (event);
    $('#FormDeleteTipoPrenda').submit(function (event) {
        event.preventDefault();
        data = {
            object: 'TipoPrenda',
            process: 'deleteTipoPrenda',
            information: {
                identificador: $('#FormDeleteTipoPrenda .identificador').val().trim()
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
                $('#ModalDeleteTipoPrenda').modal('hide');
                listarTabla('TipoPrenda', 'seleccionarTodos', 'tblTipoPrenda');
                $('#FormDeleteTipoPrenda .identificador').val('');
            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });

    });
});