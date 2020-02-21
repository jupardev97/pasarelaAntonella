$(function(){
   
    $('#panelInfoInsumos').fadeToggle();
    listarTipoInsumo( 'TipoInsumo', 'seleccionarTodos', 'contenedorTipoInsumo' );

    $('#FormCreateInsumo').submit(function(e){
    	e.preventDefault();

        insumo.id = $('#FormCreateInsumo .identificador').val();
        insumo.nombre = $('#FormCreateInsumo .insumo').val();
        insumo.cantidad = $('#FormCreateInsumo .cantidad').val();
        insumo.precio = $('#FormCreateInsumo .precio').val();
        insumo.estado = '1';
        insumo.tipoInsumo = $('#FormCreateInsumo .tipoInsumo').val();
        
        data = {
            object: 'Insumo',
            process: 'createInsumo',
            information: {
            	identificador: insumo.id,
            	nombre: insumo.nombre,
            	cantidad: insumo.cantidad,
            	precio: insumo.precio,
            	estado: insumo.estado,
            	tipoInsumo: insumo.tipoInsumo
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
				$('#FormCreateInsumo .identificador').val('');
		        $('#FormCreateInsumo .insumo').val('');
		        $('#FormCreateInsumo .cantidad').val('');
		        $('#FormCreateInsumo .precio').val('');
                listarTablaTipoInsumo( 'Insumo', 'listarInsumos', 'tblInsumo', insumo.tipoInsumo );
                $('#ModalCreateInsumo').modal('hide');
            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });

        
        insumo.id = '';
        insumo.nombre = '';
        insumo.cantidad = '';
        insumo.precio = '';

    });
    
    $('.btnFadeInfoInsumo').click(function(){
        $('#panelInfoInsumos').fadeToggle();
        $('#cardTablaInsumo').fadeToggle();
    });
    
    $('.btnCloseTableInsumo').click(function(){
        $('#cardTablaInsumo').fadeToggle();
        $('#panelTipoIsumo').fadeToggle();
    });
    
    $('.btnEditModalInsumo').click(function(){

		insumo.id = $('#identificadorInsumo').html();
        insumo.nombre = $('#nombreInsumo').html();
        insumo.cantidad = $('#cantidadInsumo').html();
        insumo.precio = $('#precioInsumo').html().split(' ')[0];

        $('#FormEditInsumo .identificador').val( insumo.id );
        $('#FormEditInsumo .insumo').val( insumo.nombre );
        $('#FormEditInsumo .cantidad').val( insumo.cantidad );
        $('#FormEditInsumo .precio').val( insumo.precio);

		insumo.id = '';
        insumo.nombre = '';
        insumo.cantidad = '';
        insumo.precio = '';

    });

    $('#FormEditInsumo').submit(function(e){
    	e.preventDefault();

    	insumo.id = $('#FormEditInsumo .identificador').val();
        insumo.nombre = $('#FormEditInsumo .insumo').val();
        insumo.cantidad = $('#FormEditInsumo .cantidad').val();
        insumo.precio = $('#FormEditInsumo .precio').val();
        insumo.tipoInsumo = $('#FormEditInsumo .tipoInsumo').val();

		data = {
            object: 'Insumo',
            process: 'editInsumo',
            information: {
            	identificador: insumo.id,
            	nombre: insumo.nombre,
            	cantidad: insumo.cantidad,
            	precio: insumo.precio
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
				
				$('#panelInfoInsumos #tituloInsumo').html( insumo.nombre );
                $('#panelInfoInsumos #identificadorInsumo').html( insumo.id );
                $('#panelInfoInsumos #nombreInsumo').html( insumo.nombre );
                $('#panelInfoInsumos #precioInsumo').html( insumo.precio + ' BsF');
                $('#panelInfoInsumos #cantidadInsumo').html( insumo.cantidad );

                listarTablaTipoInsumo( 'Insumo', 'listarInsumos', 'tblInsumo', insumo.tipoInsumo );
                $('#ModalEditInsumo').modal('hide');

                $('#FormEditInsumo .identificador').val('');
		        $('#FormEditInsumo .insumo').val('');
		        $('#FormEditInsumo .cantidad').val('');
		        $('#FormEditInsumo .precio').val('');

		        insumo.id = '';
		        insumo.nombre = '';
		        insumo.cantidad = '';
		        insumo.precio = '';

            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });

    });

    $('.btnDeleteModalInsumo').click(function(){
		
        insumo.id = $('#identificadorInsumo').html();
        $('#FormDeleteInsumo .identificador').val( insumo.id );
	insumo.id = '';
        $('#panelInfoInsumos').fadeToggle();
        $('#cardTablaInsumo').fadeToggle();
    });

    $('#FormDeleteInsumo').submit(function(e){
    	e.preventDefault();

    	insumo.id = $('#FormDeleteInsumo .identificador').val();

		data = {
            object: 'Insumo',
            process: 'deleteInsumo',
            information: {
            	identificador: insumo.id
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
				$('#panelInfoInsumos #tituloInsumo').html('');
                $('#panelInfoInsumos #identificadorInsumo').html('');
                $('#panelInfoInsumos #nombreInsumo').html('');
                $('#panelInfoInsumos #precioInsumo').html('');
                $('#panelInfoInsumos #cantidadInsumo').html('');
                $('#panelInfoInsumos #identificadorTipoInsumo').html('');
                $('#panelInfoInsumos #TipoInsumo').html('');
                listarTablaTipoInsumo( 'Insumo', 'listarInsumos', 'tblInsumo', insumo.tipoInsumo );
                $('#ModalDeleteInsumo').modal('hide');
                $('#FormDeleteInsumo .identificador').val('');
		        insumo.id = '';
            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });

    });

});