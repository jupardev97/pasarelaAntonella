$(function () {
    
    $('.cardDatosProveedor').fadeToggle('slow');
    listarTabla('Proveedor', 'seleccionarTodos', 'tblProveedor');

    $('#cardDatosProveedor .close').click(function () {
        $('#cardDatosProveedor').fadeToggle('slow');
        $('#cardTablaProveedor').fadeToggle('slow');
    });

    $('.btnEditModalProveedor').click(function () {

        data = $('.datosProveedor')[0];

        $('#ModalEditProveedor .rif')[0].value = data.querySelector('.rif').innerHTML;
        $('#ModalEditProveedor .nombre')[0].value = data.querySelector('.nombre').innerHTML;
        $('#ModalEditProveedor .direccion')[0].value = data.querySelector('.direccion').innerHTML;
        $('#ModalEditProveedor .correo')[0].value = data.querySelector('.correo').innerHTML;
        $('#ModalEditProveedor .telefono')[0].value = data.querySelector('.telefono').innerHTML;
        $('#ModalEditProveedor .tipoProveedor')[0].value = data.querySelector('.tipoProveedor').innerHTML;

    });

    
    $('.btnReturnTableProveedor').click(function(){
        $('#cardTablaProveedor').fadeToggle('slow');
        $('.cardDatosProveedor').fadeToggle('slow');
    });
    
    $('.btnMostrarCompras').click(function(){
        $('#divDatosProveedor').fadeToggle('slow');
        $('#divFacturas').fadeToggle('slow');
        $('#divBusquedaCompras').fadeToggle('slow');
    });

    $('.btnDeleteModalProveedor').click(function () {
        data = $('.datosProveedor')[0];
        $('#FormDeleteProveedor .identificador')[0].value = data.querySelector('.rif').innerHTML;
    });

    $('#FormCreateProveedor').submit(function (event) {
        event.preventDefault();

        data = {
            object: 'Proveedor',
            process: 'createProveedor',
            information: {
                Proveedor: $('#FormCreateProveedor .rif').val(),
                nombre: $('#FormCreateProveedor .nombre').val(),
                direccion: $('#FormCreateProveedor .direccion').val(),
                tipoProveedor: $('#FormCreateProveedor .tipoProveedor').val(),
                opcionales: {
                    correo: $('#FormCreateProveedor .correo').val(),
                    telefono: $('#FormCreateProveedor .telefono').val()
                }
            }
        };

        if (data.information.opcionales.correo == '') {
            delete data.information.opcionales.correo;
        }

        if (data.information.opcionales.telefono == '') {
            delete data.information.opcionales.telefono;
        }

        var ajax;
        ajax = new ajaxObject(data);
        ajax.prepareCall().done(function (result) {
            var object = JSON.parse(result);            
            if (object.status == 'error') {
                mensajeError( 'Error', object.msg, 'Regresar');
            } else {
                
                $('#FormCreateProveedor .rif').val('');
                $('#FormCreateProveedor .nombre').val('');
                $('#FormCreateProveedor .direccion').val('');
                $('#FormCreateProveedor .tipoProveedor').val('');
                $('#FormCreateProveedor .correo').val('');
                $('#FormCreateProveedor .telefono').val('');
                
                mensajeExito( 'Proceso Completado', object.msg, 'Aceptar');
                $('#ModalCreateProveedor').modal('hide');
                listarTabla('Proveedor', 'seleccionarTodos', 'tblProveedor');
            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });

    });
    
    $('#FormEditProveedor').submit(function (event) {
        event.preventDefault();

        data = {
            object: 'Proveedor',
            process: 'editProveedor',
            information: {
                rif: $('#FormEditProveedor .rif').val(),
                nombre: $('#FormEditProveedor .nombre').val(),
                direccion: $('#FormEditProveedor .direccion').val(),
                tipoProveedor: $('#FormEditProveedor .tipoProveedor').val(),
                opcionales: {
                    correo: $('#FormEditProveedor .correo').val(),
                    telefono: $('#FormEditProveedor .telefono').val()
                }
            }
        };
        
        if (data.information.opcionales.correo == '' || data.information.opcionales.correo == 'Sin Registrar' ) {
            delete data.information.opcionales.correo;
        }

        if (data.information.opcionales.telefono == '' || data.information.opcionales.telefono == 'Sin Registrar' ) {
            delete data.information.opcionales.telefono;
        }
        
        var ajax;
        ajax = new ajaxObject(data);
        ajax.prepareCall().done(function (result) {
            var object = JSON.parse(result);

            if (object.status == 'error') {
                mensajeError( 'Error', object.msg, 'Regresar');
            } else {
                
                $('#FormEditProveedor .rif').val('');
                $('#FormEditProveedor .nombre').val('');
                $('#FormEditProveedor .direccion').val('');
                $('#FormEditProveedor .tipoProveedor').val('');
                $('#FormEditProveedor .correo').val('');
                $('#FormEditProveedor .telefono').val('');
                
                mensajeExito( 'Proceso Completado', object.msg, 'Aceptar');
                $('#ModalEditProveedor').modal('hide');
                listarTabla('Proveedor', 'seleccionarTodos', 'tblProveedor');
            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });
    });// End $('#FormEditProveedor').submit(function (event);
        
    $('#FormDeleteProveedor').submit(function (event) {
        event.preventDefault();
        data = {
            object: 'Proveedor',
            process: 'deleteProveedor',
            information: {
                identificador: $('#FormDeleteProveedor .identificador').val().trim()
            }
        };
        
        var ajax;
        ajax = new ajaxObject(data);
        ajax.prepareCall().done(function (result) {
            var object = JSON.parse(result);
            
            if (object.status == 'error') {
                mensajeError( 'Error', object.msg, 'Regresar');
            } else {
                
                $('#FormDeleteProveedor .identificador').val('');
                
                mensajeExito( 'Proceso Completado', object.msg, 'Aceptar');
                $('#ModalDeleteProveedor').modal('hide');
                listarTabla('Proveedor', 'seleccionarTodos', 'tblProveedor');
            }
            
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });
    });
});
