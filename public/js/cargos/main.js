$(function () {

    $('.btnEditCargo').click(function () {
        var row = $(this).parent().parent()[0];

        $('#FormEditCargo .identificador').val(row.querySelector('.identificador').innerHTML);
        $('#FormEditCargo .cargo').val(row.querySelector('.cargo').innerHTML);
        (row.querySelector('.horas').innerHTML == 'Sin Registrar') ? ($('#FormEditCargo .horas').val(0)) : ($('#FormEditCargo .horas').val(parseFloat(row.querySelector('.horas').innerHTML)));
        (row.querySelector('.pago').innerHTML == 'Sin Registrar') ? ($('#FormEditCargo .pago').val(0)) : ($('#FormEditCargo .pago').val(parseFloat(row.querySelector('.pago').innerHTML)));

    });

    $('#FormEditCargo').submit(function (event) {
        event.preventDefault();

        data = {
            object: 'Cargo',
            process: 'editCargo',
            information: {
                identificador: $('#FormEditCargo .identificador').val().trim(),
                horas: $('#FormEditCargo .horas').val().trim(),
                pago: $('#FormEditCargo .pago').val().trim()
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

                $('#ModalEditCargo').modal('hide');

                listarTabla('Cargo', 'seleccionarTodos', 'tblCargos');

                $('#FormEditCargo .identificador').val('');
                $('#FormEditCargo .cargo').val('');
                $('#FormEditCargo .horas').val(0);
                $('#FormEditCargo .pago').val(0);
            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });
    });// End $('#FormEditCargo').submit(function (event);

});