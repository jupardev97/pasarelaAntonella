function mensajeExito(titulo, mensaje, boton) {
    /*swal({
        title: titulo,
        text: mensaje,
        icon: "success",
        button: boton
    });
    */
    alertify.alert(titulo, mensaje);
}
function mensajeError(titulo, mensaje, boton) {
    /*swal({
        title: titulo,
        text: mensaje,
        icon: "error",
        button: boton
    });*/
    alertify.alert(titulo, mensaje);
}
function mensajeAlerta(titulo, mensaje, boton) {
    /*swal({
        title: titulo,
        text: mensaje,
        icon: "warning",
        button: boton
    });*/
    alertify.alert(titulo, mensaje);
}
function mensajeInformacion(titulo, mensaje, boton) {
    /*swal({
        title: titulo,
        text: mensaje,
        icon: "info",
        button: boton
    });*/
    alertify.alert(titulo, mensaje);
}
//function mensajeVerificacion() {
//    swal({
//      title: "Are you sure?",
//      text: "Once deleted, you will not be able to recover this imaginary file!",
//      icon: "warning",
//      buttons: true,
//      dangerMode: true,
//    }).then((willDelete) => {
//      if (willDelete) {
//        swal("Poof! Your imaginary file has been deleted!", {
//          icon: "success",
//        });
//      } else {
//        swal("Your imaginary file is safe!");
//      }
//    });
//}
