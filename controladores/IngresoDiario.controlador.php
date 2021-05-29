<?php
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;


class ControladorINGRESODIARIO{
    
    
    
    	/*=============================================
	MOSTRAR INGRESOS
	=============================================*/

	static public function ctrMostrarIngresos($item, $valor){

		$tabla = "ingresos_diarios";

		$respuesta = ModeloIngreso::mdlMostrarIngresos($tabla, $item, $valor);

		return $respuesta;

	}

    

	/*=============================================
	CREAR INGRESO
	=============================================*/

	static public function ctrCrearIngreso(){

		if(isset($_POST["nuevoPlaca"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoPlaca"]) &&
			preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoSede"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoJefe"]) ) {

				$tabla = "ingresos_diarios";

				   $datos = array("placa"=>$_POST["nuevoPlaca"],
				   "sede"=>$_POST["nuevoSede"],
				   "conductor"=>$_POST["nuevoConductor"],
				   "encargado_jefe"=>$_POST["nuevoJefe"],
					"monto"=>$_POST["nuevoMonto"],
					"hora"=>$_POST["nuevoHora"],
				   "fecha"=>$_POST["nuevoFecha"] );

	   				$respuesta = ModeloIngreso::mdlIngresarIngresos($tabla, $datos);
						if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Registro ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "ingresosdiarios";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El registro no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ingresosdiarios";

							}
						})

			  	</script>';



			}

		}

	}


	/*=============================================
	EDITAR INGRESOS
	=============================================*/

	static public function ctrEditarIngresos(){

		if(isset($_POST["editarPlaca"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarPlaca"]) &&
			preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarSede"]) &&
			preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarConductor"]) &&
			preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarJefe"]) &&
			preg_match('/^[0-9.]+$/', $_POST["editarMonto"])   ) {
			// && preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaHora"]) 
			//preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaHora"])
                $tabla = "ingresos_diarios";

                $datos = array("id"=>$_POST["idIngreso"],
								"placa"=>$_POST["editarPlaca"],
								"sede"=>$_POST["editarSede"],
								"conductor"=>$_POST["editarConductor"],
								"encargado_jefe"=>$_POST["editarJefe"],
								"monto"=>$_POST["editarMonto"],
								"hora"=>$_POST["editarHora"],
								"fecha"=>$_POST["editarFechas"]);

			   	$respuesta = ModeloIngreso::mdlEditarIngreso($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Ingreso ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "ingresosdiarios";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Ingreso no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "ingresosdiarios";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR INGRESOS
	=============================================*/

	static public function ctrEliminarIngresos(){

		if(isset($_GET["idIngreso"])){

			$tabla ="ingresos_diarios";
			$datos = $_GET["idIngreso"];

			$respuesta = ModeloIngreso::mdlEliminarIngresos($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Ingresos ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "ingresosdiarios";

								}
							})

				</script>';

			}

		}

	}

	
	/*=============================================
	DESCARGAR EXCEL
	=============================================*/

	public function ctrDescargarIngresosdiarios(){

		if(isset($_GET["ingresosdiarios"])){

			$tabla = "ingresos_diarios";

			
				$item = null;
				$valor = null;

				$ingresos = ModeloIngreso::mdlMostrarIngresos($tabla, $item, $valor);


			/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

			$Name = $_GET["ingresosdiarios"].'.xls';

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
					<td style='font-weight:bold; border:1px solid #eee;'>PLACA</td> 
					<td style='font-weight:bold; border:1px solid #eee;'>SEDE</td>
					<td style='font-weight:bold; border:1px solid #eee;'>CONDUCTOR</td>
					<td style='font-weight:bold; border:1px solid #eee;'>JEFE_SUPERVISOR</td>
					<td style='font-weight:bold; border:1px solid #eee;'>MONTO</td>
					<td style='font-weight:bold; border:1px solid #eee;'>HORA</td>
					<td style='font-weight:bold; border:1px solid #eee;'>FECHA</td>		
					
					</tr>"
				);

			foreach ($ingresos as $row => $item){

				

			 echo utf8_decode("<tr>
			 			<td style='border:1px solid #eee;'>".$item["placa"]."</td> 
			 			<td style='border:1px solid #eee;'>".$item["sede"]."</td>
			 			<td style='border:1px solid #eee;'>".$item["conductor"]."</td>
						<td style='border:1px solid #eee;'> ".$item["encargado_jefe"]. "</td>
						<td style='border:1px solid #eee;'>$ ".number_format($item["monto"],2)."</td>
						<td style='border:1px solid #eee;'>".$item["hora"]."</td>
						<td style='border:1px solid #eee;'>".substr($item["fecha"],0,10)."</td>
			 			<td style='border:1px solid #eee;'>");

		

			}


			echo "</table>";

		}

	}



}
