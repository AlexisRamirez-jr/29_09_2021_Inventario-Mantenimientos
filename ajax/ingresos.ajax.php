<?php

require_once "../controladores/IngresoDiario.controlador.php";
require_once "../modelos/Ingreso.modelo.php";

class AjaxIngresos{

	/*=============================================
	EDITAR Ingreso
	=============================================*/	

	public $idIngreso;

	public function ajaxEditarIngresos(){

		$item = "id";
		$valor = $this->idIngreso;
 
		$respuesta = ControladorINGRESODIARIO::ctrMostrarIngresos($item, $valor);
		
		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR CLIENTE
=============================================*/	

if(isset($_POST["idIngreso"])){

	$ingresosdiarios = new AjaxIngresos();
	$ingresosdiarios -> idIngreso = $_POST["idIngreso"];
	$ingresosdiarios -> ajaxEditarIngresos();

}


