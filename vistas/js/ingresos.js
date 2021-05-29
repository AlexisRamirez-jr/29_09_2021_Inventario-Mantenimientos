/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarIngresos", function(){

  var idIngreso = $(this).attr("idIngreso");

	var datos = new FormData();
    datos.append("idIngreso", idIngreso);

    $.ajax({

      url:"ajax/ingresos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
          
            $("#idIngreso").val(respuesta["id"]);
            $("#editarPlaca").val(respuesta["placa"]);
            $("#editarSede").val(respuesta["sede"]);
            $("#editarConductor").val(respuesta["conductor"]);
            $("#editarJefe").val(respuesta["encargado_jefe"]);
            $("#editarMonto").val(respuesta["monto"]);
            $("#editarHora").val(respuesta["hora"]);
            $("#editarFechas").val(respuesta["fecha"]);

	  }

  	})

})

/*=============================================
ELIMINAR 
=============================================*/

$(".tablas").on("click", ".btnEliminarIngresos", function(){

  var idIngreso = $(this).attr("idIngreso");
  
  swal({
        title: '¿Está seguro de borrar el registro?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar registro!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=ingresosdiarios&idIngreso="+idIngreso;
        }

  })

})
