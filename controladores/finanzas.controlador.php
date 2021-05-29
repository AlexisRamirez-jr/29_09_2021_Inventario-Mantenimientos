<?php

class ControladorFinanzas{

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

	static public function ctrMostrarFinanzas($item, $valor, $orden){

		$tabla = "finanzas";

		$respuesta = ModeloFinanzas::mdlMostrarFinanzas($tabla, $item, $valor, $orden);

		return $respuesta;

	}

	/*=============================================
	CREAR PRODUCTO
	=============================================*/

	static public function ctrCrearFinanzas(){

		if(isset($_POST["nuevoResponsable"])){

			if(
			   preg_match('/^[0-9]+$/', $_POST["nuevoIngresoDiario"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["nuevoEgresoDiario"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["newtotalsalario"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["nuevoGanancia"]))
			   {

				$tabla = "finanzas";

				$datos = array("fecha" => $_POST["nuevoFechaFinanza"],
							   "nombre_responsable" => $_POST["nuevoResponsable"],
							   "ingreso_diario" => $_POST["nuevoIngresoDiario"],
							   "egreso_diario" => $_POST["nuevoEgresoDiario"],
							   "salario_diario" => $_POST["newtotalsalario"],
							   "ganancia_neta" => $_POST["nuevoGanancia"]);

				$respuesta = ModeloFinanzas::mdlIngresarFinanzas($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El registro ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "finanzas";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡no pueden ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "finanzas";

							}
						})

			  	</script>';
			}
		}

	}



	/*=============================================
	EDITAR PRODUCTO
	=============================================*/

	static public function ctrEditarFinanzas(){

		if(isset($_POST["editarResponsable"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarResponsable"]) &&
			   preg_match('/^[0-9]+$/', $_POST["editarIngresoDiario"]) &&	
			   preg_match('/^[0-9.]+$/', $_POST["editarEgresoDiario"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["edittotalsalario"]) &&
			   preg_match('/^[0-9.]+$/', $_POST["editarGanancia"]))
			   {


				$tabla = "finanzas";

				$datos = array( "id" => $_POST["idFinanza"],
								"fecha" => $_POST["editarFechaFinanza"],
								"nombre_responsable" => $_POST["editarResponsable"],
								"ingreso_diario" => $_POST["editarIngresoDiario"],
								"egreso_diario" => $_POST["editarEgresoDiario"],
								"salario_diario" => $_POST["edittotalsalario"],
								"ganancia_neta" => $_POST["editarGanancia"]);

				

				$respuesta = ModeloFinanzas::mdlEditarFinanzas($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El registro ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "finanzas";

										}
									})

						</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡ advertencia no pueden ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "finanzas";

							}
						})

			  	</script>';
			}
		}

	}

	/*=============================================
	BORRAR PRODUCTO
	=============================================*/
	static public function ctrEliminarFinanzas(){
		
		if(isset($_GET["idFinanza"])){

			$tabla ="finanzas";
			$datos = $_GET["idFinanza"];

			$respuesta = ModeloFinanzas::mdlEliminarFinanzas($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El mantenimiento ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "finanzas";

								}
							})

				</script>';

			}		
		}


	}



	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/

	static public function ctrMostrarSumaFinanzas(){

		$tabla = "finanzas";

		$respuesta = ModeloFinanzas::mdlMostrarSumaFinanzas($tabla);

		return $respuesta;

	}




	/*=============================================
	DESCARGAR EXCEL
	=============================================*/

	public function ctrDescargarFinanzas(){

		if(isset($_GET["RegistroFinanciero"])){

			$tabla = "finanzas";

			
				$item = null;
				$valor = null;
				$orden = "id";


				$finanzas = ModeloFinanzas::mdlMostrarFinanzas($tabla, $item, $valor, $orden);


			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["RegistroFinanciero"].'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate"); 
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public"); 
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");
		
			echo utf8_decode("<table border='0'> 

					<tr> 
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td> 
					<td style='font-weight:bold; border:1px solid #eee;'>RESPONSABLE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>INGRESO DIARIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>EGRESO DIARIO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>SALARIOS DIARIOS</td>
					<td style='font-weight:bold; border:1px solid #eee;'>GANACIA NETA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA DE REGISTRO</td>		
					
					</tr>"
				);

			foreach ($finanzas as $row => $item){

				

			 echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".substr($item["fecha"],0,10)."</td>
			 			<td style='border:1px solid #eee;'>".$item["nombre_responsable"]."</td> 
			 			<td style='border:1px solid #eee;'>$ ".number_format($item["ingreso_diario"],2)."</td>
						<td style='border:1px solid #eee;'>$ ".number_format($item["egreso_diario"],2)."</td>
						<td style='border:1px solid #eee;'>$ ".number_format($item["salario_diario"],2)."</td>
						<td style='border:1px solid #eee;'>$ ".number_format($item["ganancia_neta"],2)."</td>
						<td style='border:1px solid #eee;'>".substr($item["registrofecha"],0,10)."</td>
			 			<td style='border:1px solid #eee;'>");

		

			}


			echo "</table>";

		}

	}


}