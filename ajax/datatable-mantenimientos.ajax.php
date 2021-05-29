<?php

require_once "../controladores/mantenimientos.controlador.php";
require_once "../modelos/mantenimientos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";


class TablaMantenimientos{


/*=============================================
 	 MOSTRAR LA TABLA DE Mantenimientos
  	=============================================*/ 

	  public function mostrarTablaMantenimiento(){

		$item = null;
    	$valor = null;
    	$orden = "id";

  		$mantenimientos = ControladorMantenimientos::ctrMostrarMantenimientos($item, $valor, $orden);	

  		if(count($mantenimientos) == 0){

  			echo '{"data": []}';

		  	return;
  		}
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($mantenimientos); $i++){

		  	/*=============================================
 	 		TRAEMOS LA IMAGEN
  			=============================================*/ 

		  	$imagen = "<img src='".$mantenimientos[$i]["imagen"]."' width='40px'>";

		  	/*=============================================
 	 		TRAEMOS LA CATEGORÍA
  			=============================================*/ 

		  	$item = "id";
		  	$valor = $mantenimientos[$i]["id_categoria"];

		  	$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

		  	/*=============================================
 	 		STOCK
  			=============================================*/ 

  			if($mantenimientos[$i]["stock"] <= 10){

  				$stock = "<button class='btn btn-danger'>".$mantenimientos[$i]["stock"]."</button>";

  			}else if($mantenimientos[$i]["stock"] > 11 && $mantenimientos[$i]["stock"] <= 15){

  				$stock = "<button class='btn btn-warning'>".$mantenimientos[$i]["stock"]."</button>";

  			}else{

  				$stock = "<button class='btn btn-success'>".$mantenimientos[$i]["stock"]."</button>";

  			}

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 

  			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Especial"){

  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarMantenimiento' idMantenimiento='".$mantenimientos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarMantenimiento'><i class='fa fa-pencil'></i></button></div>"; 

  			}else{

  				 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarMantenimiento' idMantenimiento='".$mantenimientos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarMantenimiento'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarMantenimiento' idMantenimiento='".$mantenimientos[$i]["id"]."' codigo='".$mantenimientos[$i]["codigo"]."' imagen='".$mantenimientos[$i]["imagen"]."'><i class='fa fa-times'></i></button></div>"; 

  			}

				

		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$imagen.'",
			      "'.$mantenimientos[$i]["codigo"].'",
			      "'.$mantenimientos[$i]["descripcion"].'",
			      "'.$categorias["categoria"].'",
			      "'.$stock.'",
			      "$ '.number_format($mantenimientos[$i]["precio_compra"],2).'",
			      "$ '.number_format($mantenimientos[$i]["precio_venta"],2).'",
			      "'.$mantenimientos[$i]["fecha"].'",
			      "'.$botones.'"
			    ],';

			//	<td>$ '.number_format($value["precio_compra"],2).'</td>

				//<td>$ '.number_format($value["precio_venta"],2).'</td>

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	}


}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 
$activarmantenimientos = new TablaMantenimientos();
$activarmantenimientos -> mostrarTablaMantenimiento();

