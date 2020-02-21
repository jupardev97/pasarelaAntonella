$(function () {
    listarTabla('Trabajador', 'seleccionarTodos', 'tblTrabajador');

    $('.toggleClave').click(function () {
        $('.divClave').toggleClass('hidde');
    });

    $('.btnInfoTrabajador').click(function () {
        row = $(this).parent().parent()[0];

        $('#ModalInfoTrabajador .cedula')[0].innerHTML = row.querySelector('.cedula').innerHTML;
        $('#ModalInfoTrabajador .nombre')[0].innerHTML = row.querySelector('.nombre').innerHTML;
        $('#ModalInfoTrabajador .direccion')[0].innerHTML = row.querySelector('.direccion').value;
        $('#ModalInfoTrabajador .correo')[0].innerHTML = row.querySelector('.correo').value;
        $('#ModalInfoTrabajador .telefono')[0].innerHTML = row.querySelector('.telefono').valueHTML;
        console.log( row.querySelector('.cargo').innerHTML.toLowerCase );
        $('#ModalInfoTrabajador .cargo')[0].innerHTML = ( row.querySelector('.cargo').innerHTML.toLowerCase == 'ad1' ) ? ( 'Administrador' ) : ( 'Venedor(a)' );
        $('#ModalInfoTrabajador .horas')[0].innerHTML = row.querySelector('.horas').value;
        $('#ModalInfoTrabajador .pago')[0].innerHTML = row.querySelector('.pago').value;

    });

    $('.btnEditTrabajador').click(function () {
        row = $(this).parent().parent()[0];
        $('#ModalEditTrabajador .cedula')[0].value = row.querySelector('.cedula').innerHTML;
        $('#ModalEditTrabajador .nombre')[0].value = row.querySelector('.nombre').innerHTML;
        $('#ModalEditTrabajador .direccion')[0].value = row.querySelector('.direccion').value;
        (row.querySelector('.correo').value == 'null') ? ($('#ModalEditTrabajador .correo')[0].value = '') : ($('#ModalEditTrabajador .correo')[0].value = row.querySelector('.correo').value);
        (row.querySelector('.telefono').value == 'null') ? ($('#ModalEditTrabajador .telefono')[0].value = '') : ($('#ModalEditTrabajador .telefono')[0].value = row.querySelector('.telefono').value);
        (row.querySelector('.cargo').innerHTML.toLowerCase == 'ad1') ? ($('#ModalEditTrabajador .cargo')[0].selectedIndex = 0) : ($('#ModalEditTrabajador .cargo')[0].selectedIndex = 1);
    });

    $('.btnDeleteTrabajador').click(function () {
        row = $(this).parent().parent()[0];
        $('#FormDeleteTrabajador .cedula')[0].value = row.querySelector('.cedula').innerHTML;
    });

    $('#FormCreateTrabajador').submit(function (event) {
        event.preventDefault();

        var data = {
            object: 'Trabajador',
            process: 'createTrabajador',
            information: {
                cedula: $('#FormCreateTrabajador .cedula').val(),
                nombres: $('#FormCreateTrabajador .nombresApellidos').val(),
                direccion: $('#FormCreateTrabajador .direccion').val(),
                cargo: $('#FormCreateTrabajador .cargo')[0].value,
                opcional: {
                    correo: $('#FormCreateTrabajador .correo').val(),
                    telefono: $('#FormCreateTrabajador .telefono').val(),
                    clave: $('#FormCreateTrabajador .clave').val()
                }
            }
        };
        
        
        
        if (data.information.opcional.correo == '') {
            delete data.information.opcional.correo;
        }

        if (data.information.opcional.telefono == '') {
            delete data.information.opcional.telefono;
        }

        if (data.information.opcional.clave == '') {
            delete data.information.opcional.clave;
        }

        var ajax;
        ajax = new ajaxObject(data);
        ajax.prepareCall().done(function (result) {
            var object = JSON.parse(result);
            
            if (object.status !== 'complete') {
                mensajeError('Error', object.msg, 'Regresar');
            } else {
                mensajeExito('Proceso Completado', object.msg, 'Aceptar');
                $('#ModalCreateTrabajador').modal('hide');
                listarTabla('Trabajador', 'seleccionarTodos', 'tblTrabajador');
            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });

    });

    $('#FormEditTrabajador').submit(function (event) {
        event.preventDefault();
        var data = {
            object: 'Trabajador',
            process: 'updateTrabajador',
            information: {
                cedula: $('#FormEditTrabajador .cedula').val(),
                nombres: $('#FormEditTrabajador .nombre').val(),
                direccion: $('#FormEditTrabajador .direccion').val(),
                cargo: $('#FormEditTrabajador .cargo')[0].value,
                opcional: {
                    correo: $('#FormEditTrabajador .correo').val(),
                    telefono: $('#FormEditTrabajador .telefono').val(),
                    clave: $('#FormEditTrabajador .clave').val()
                }
            }
        };

        if (data.information.opcional.correo == '') {
            delete data.information.opcional.correo;
        }

        if (data.information.opcional.telefono == '') {
            delete data.information.opcional.telefono;
        }

        if (data.information.opcional.clave == '') {
            delete data.information.opcional.clave;
        }

        var ajax;
        ajax = new ajaxObject(data);
        ajax.prepareCall().done(function (result) {
            var object = JSON.parse(result);
            if (object.status !== 'complete') {
                mensajeError('Error', object.msg, 'Regresar');
            } else {
                mensajeExito('Proceso Completado', object.msg, 'Aceptar');
                $('#ModalEditTrabajador').modal('hide');
                listarTabla('Trabajador', 'seleccionarTodos', 'tblTrabajador');
            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });
    });

    $('#FormDeleteTrabajador').submit(function (event) {
        event.preventDefault();

        var data = {
            object: 'Trabajador',
            process: 'deleteTrabajador',
            information: {
                cedula: $('#FormDeleteTrabajador .cedula').val()
            }
        };

        var ajax;
        ajax = new ajaxObject(data);
        ajax.prepareCall().done(function (result) {
            var object = JSON.parse(result);
            if (object.status === 'complete') {
                mensajeExito('Proceso Completado', object.msg, 'Aceptar');
                $('#ModalDeleteTrabajador').modal('hide');
                listarTabla('Trabajador', 'seleccionarTodos', 'tblTrabajador');
            } else {
                mensajeError('Error', object.msg, 'Regresar');
            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });


    });

});