<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

class AjaxVehiculos{

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	public $idVenta;

	public function ajaxEditarVehiculos(){

		$item = "id";
		$valor = $this->idVenta;

		$respuesta = ControladorVentas::ctrMostrarVentas($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR CLIENTE
=============================================*/

if(isset($_POST["idVenta"])){

	$vehiculo = new AjaxVehiculos();
	$vehiculo -> idVenta = $_POST["idVenta"];
	$vehiculo -> ajaxEditarVehiculos();

}
