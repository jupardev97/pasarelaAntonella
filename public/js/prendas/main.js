$(function(){
   
    $('#panelInfoPrendas').fadeToggle();
    listarTipoPrenda( 'TipoPrenda', 'seleccionarTodos', 'contenedorTipoPrenda' );
    
    
    $('#FormCreatePrenda').submit(function(e){
    	e.preventDefault();

        prenda.id = $('#FormCreatePrenda .identificador').val();
        prenda.nombre = $('#FormCreatePrenda .prenda').val();
        prenda.cantidad = $('#FormCreatePrenda .cantidad').val();
        prenda.precio = $('#FormCreatePrenda .precio').val();
        prenda.estado = '1';
        prenda.tipoPrenda = $('#FormCreatePrenda .tipoPrenda').val();
        prenda.color = $('#FormCreatePrenda .color').val();
        prenda.descripcion = $('#FormCreatePrenda .descripcion').val();
        
        data = {
            object: 'Prenda',
            process: 'createPrenda',
            information: {
            	identificador: prenda.id,
            	nombre: prenda.nombre,
            	cantidad: prenda.cantidad,
            	precio: prenda.precio,
            	estado: prenda.estado,
            	color: prenda.color,
            	descripcion: prenda.descripcion,
            	tipoPrenda: prenda.tipoPrenda
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
                        $('#FormCreatePrenda .identificador').val('');
		        $('#FormCreatePrenda .prenda').val('');
		        $('#FormCreatePrenda .cantidad').val('');
		        $('#FormCreatePrenda .precio').val('');
		        $('#FormCreatePrenda .color').val('');
		        $('#FormCreatePrenda .descripcion').val('');
                listarTablaTipoPrenda( 'Prenda', 'listarPrendas', 'tblPrenda', prenda.tipoPrenda );
                $('#ModalCreatePrenda').modal('hide');
            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });

        prenda.id = '';
        prenda.nombre = '';
        prenda.cantidad = '';
        prenda.precio = '';
        prenda.estado = '';
        prenda.color = '';
        prenda.descripcion = '';
        
    });
  
    $('.btnFadeInfoPrenda').click(function(){
        $('#panelInfoPrendas').fadeToggle();
        $('#cardTablaPrenda').fadeToggle();
    });
    
    $('.btnCloseTablePrenda').click(function(){
        $('#cardTablaPrenda').fadeToggle();
        $('#panelTipoPrenda').fadeToggle();
    });
    
    $('.btnEditModalPrenda').click(function(){

        prenda.id = $('#identificadorPrenda').html();
        prenda.nombre = $('#nombrePrenda').html();
        prenda.cantidad = $('#cantidadPrenda').html();
        prenda.precio = $('#precioPrenda').html().split(' ')[0];
        prenda.color = $('#colorPrenda').html();
        prenda.descripcion = $('#descripcionPrenda').html();

        $('#FormEditPrenda .identificador').val( prenda.id );
        $('#FormEditPrenda .prenda').val( prenda.nombre );
        $('#FormEditPrenda .cantidad').val( prenda.cantidad );
        $('#FormEditPrenda .precio').val( prenda.precio);
        $('#FormEditPrenda .color').val( prenda.color);
        $('#FormEditPrenda .descripcion').val( prenda.descripcion);

        prenda.id = '';
        prenda.nombre = '';
        prenda.cantidad = '';
        prenda.precio = '';
        prenda.color = '';
        prenda.descripcion = '';

    });

    $('#FormEditPrenda').submit(function(e){
    	e.preventDefault();
        
    	prenda.id = $('#FormEditPrenda .identificador').val();
        prenda.nombre = $('#FormEditPrenda .prenda').val();
        prenda.cantidad = $('#FormEditPrenda .cantidad').val();
        prenda.precio = $('#FormEditPrenda .precio').val();
        prenda.tipoPrenda = $('#FormEditPrenda .tipoPrenda').val();
        prenda.color = $('#FormEditPrenda .color').val();
        prenda.descripcion = $('#FormEditPrenda .descripcion').val();
        
	data = {
            object: 'Prenda',
            process: 'editPrenda',
            information: {
            	identificador: prenda.id,
            	nombre: prenda.nombre,
            	cantidad: prenda.cantidad,
            	precio: prenda.precio,
            	color: prenda.color,
            	descripcion: prenda.descripcion
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

		$('#panelInfoPrendas #tituloPrenda').html( prenda.nombre );
                $('#panelInfoPrendas #identificadorPrenda').html( prenda.id );
                $('#panelInfoPrendas #nombrePrenda').html( prenda.nombre );
                $('#panelInfoPrendas #precioPrenda').html( prenda.precio + ' BsF');
                $('#panelInfoPrendas #cantidadPrenda').html( prenda.cantidad );
                $('#panelInfoPrendas #colorPrenda').html( prenda.cantidad );
                $('#panelInfoPrendas #descripcionPrenda').html( prenda.descripcion );

                listarTablaTipoPrenda( 'Prenda', 'listarPrendas', 'tblPrenda', prenda.tipoPrenda );
                $('#ModalEditPrenda').modal('hide');

                $('#FormEditPrenda .identificador').val('');
		$('#FormEditPrenda .prenda').val('');
		$('#FormEditPrenda .cantidad').val('');
		$('#FormEditPrenda .precio').val('');
		$('#FormEditPrenda .color').val('');
		$('#FormEditPrenda .descripcion').val('');
                
		prenda.id = '';
		prenda.nombre = '';
		prenda.cantidad = '';
		prenda.precio = '';
		prenda.color = '';
		prenda.descripcion = '';
            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });
    });
    $('.btnDeleteModalPrenda').click(function(){

        prenda.id = $('#identificadorPrenda').html();
        $('#FormDeletePrenda .identificador').val( prenda.id );
	prenda.id = '';
        $('#panelInfoPrendas').fadeToggle();
        $('#cardTablaPrenda').fadeToggle();
    });


    $('#FormDeletePrenda').submit(function(e){
    	e.preventDefault();

    	prenda.id = $('#FormDeletePrenda .identificador').val();

        data = {
            object: 'Prenda',
            process: 'deletePrenda',
            information: {
            	identificador: prenda.id
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
		$('#panelInfoPrendas #tituloPrenda').html('');
                $('#panelInfoPrendas #identificadorPrenda').html('');
                $('#panelInfoPrendas #nombrePrenda').html('');
                $('#panelInfoPrendas #precioPrenda').html('');
                $('#panelInfoPrendas #cantidadPrenda').html('');
                $('#panelInfoPrendas #identificadorTipoPrenda').html('');
                $('#panelInfoPrendas #colorPrenda').html('');
                $('#panelInfoPrendas #descripcionPrenda').html('');
                $('#panelInfoPrendas #TipoPrenda').html('');
                listarTablaTipoPrenda( 'Prenda', 'listarPrendas', 'tblPrenda', prenda.tipoPrenda );
                $('#ModalDeletePrenda').modal('hide');
                $('#FormDeletePrenda .identificador').val('');
		prenda.id = '';
            }
        }).fail(function (msg) {
            console.error('Ha Ocurrido un Error en la Llamada del Metodo Ajax. \n ' + msg);
        });
    });
});