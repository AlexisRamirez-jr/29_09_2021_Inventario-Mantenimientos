/*=============================================
CARGAR LA TABLA DINÁMICA DE PRODUCTOS
=============================================*/

$.ajax({

	url: "ajax/datatable-finanzas.ajax.php",
	success:function(respuesta){
		
		console.log("respuesta", respuesta);

	}

})

var perfilOculto = $("#perfilOculto").val();

$('.tablaFinanzas').DataTable( {
    "ajax": "ajax/datatable-finanzas.ajax.php?perfilOculto="+perfilOculto,
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

} );


/*=============================================
AGREGANDO ya modificado
=============================================*/




$("#nuevoEgresoDiario, #editarTotalSalario").change(function(){

	if($(".porcentaje").prop("checked")){

var valorPorcentaje = $(".nuevoTotalSalario").val();

		var porcentaje = Number((($("#nuevoIngresoDiario").val()))-(Number(($("#nuevoEgresoDiario").val()))+Number(((valorPorcentaje)))));

		var editarPorcentaje = Number((($("#editarIngresoDiario").val()))-(Number(($("#editarEgresoDiario").val()))+Number(((valorPorcentaje)))));

		$("#newtotalsalario").val(valorPorcentaje);
		$("#nuevoGanancia").val(porcentaje);
		$("#nuevoGanancia").prop("readonly",true);


		$("#edittotalsalario").val(valorPorcentaje);
		$("#editarGanancia").val(editarPorcentaje);
		$("#editarGanancia").prop("readonly",true);

	}

})

/*=============================================
CAMBIO DE valores
=============================================*/



$(".nuevoTotalSalario").change(function(){

	if($(".porcentaje").prop("checked")){
		var valorPorcentaje = $(this).val();

		var porcentaje = Number((($("#nuevoIngresoDiario").val()))-(Number(($("#nuevoEgresoDiario").val()))+Number(((valorPorcentaje)))));

		var editarPorcentaje = Number((($("#editarIngresoDiario").val()))-(Number(($("#editarEgresoDiario").val()))+Number(((valorPorcentaje)))));
		
		$("#newtotalsalario").val(valorPorcentaje);
		$("#nuevoGanancia").val(porcentaje);
		$("#nuevoGanancia").prop("readonly",true);


		$("#edittotalsalario").val(valorPorcentaje);
		$("#editarGanancia").val(editarPorcentaje);
		$("#editarGanancia").prop("readonly",true);

	}

})

$(".porcentaje").on("ifUnchecked",function(){

	$("#nuevoGanancia").prop("readonly",false);
	$("#editarGanancia").prop("readonly",false);

})

$(".porcentaje").on("ifChecked",function(){

	$("#nuevoGanancia").prop("readonly",true);
	$("#editarGanancia").prop("readonly",true);

})



/*=============================================
EDITAR 
=============================================*/

$(".tablaFinanzas tbody").on("click", "button.btnEditarFinanzas", function(){

	var idFinanza = $(this).attr("idFinanza");
	
	var datos = new FormData();
    datos.append("idFinanza", idFinanza);

     $.ajax({

      url:"ajax/finanzas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

           $("#editarFechaFinanza").val(respuesta["fecha"]);

           $("#editarResponsable").val(respuesta["nombre_responsable"]);

           $("#editarIngresoDiario").val(respuesta["ingreso_diario"]);

           $("#editarEgresoDiario").val(respuesta["egreso_diario"]);

           $("#nuevoTotalSalario").val(respuesta["salario_diario"]);

		   $("#editarGanancia").val(respuesta["ganancia_neta"]);

      }

  })

})


/*=============================================
ELIMINAR 
=============================================*/

$(".tablaFinanzas tbody").on("click", "button.btnEliminarFinanzas", function(){

	var idFinanza = $(this).attr("idFinanza");

	
	swal({

		title: '¿Está seguro de borrar el registro?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar estado financiero!'
        }).then(function(result) {
        if (result.value) {

        	window.location = "index.php?ruta=finanzas&idFinanza="+idFinanza;

        }


	})

})
	
