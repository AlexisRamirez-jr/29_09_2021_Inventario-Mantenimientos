<?php

require_once "../controladores/finanzas.controlador.php";
require_once "../modelos/finanzas.modelo.php";



class TablaFinanzas{


/*=============================================
 	 MOSTRAR LA TABLA DE 
  	=============================================*/ 

	  public function mostrarTablaFinanzas(){

		$item = null;
    	$valor = null;
    	$orden = "id";

  		$finanzas = ControladorFinanzas::ctrMostrarFinanzas($item, $valor, $orden);	

  		if(count($finanzas) == 0){

  			echo '{"data": []}';

		  	return;
  		}
		
  		$datosJson = '{
		  "data": [';

		  for($i = 0; $i < count($finanzas); $i++){

		  

  			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Especial"){

  				$botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarFinanzas' idFinanza='".$finanzas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarFinanzas'><i class='fa fa-pencil'></i></button></div>"; 

  			}else{

  				 $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarFinanzas' idFinanza='".$finanzas[$i]["id"]."' data-toggle='modal' data-target='#modalEditarFinanzas'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarFinanzas' idFinanza='".$finanzas[$i]["id"]."'><i class='fa fa-times'></i></button></div>"; 

  			}

				

		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$finanzas[$i]["fecha"].'",
			      "'.$finanzas[$i]["nombre_responsable"].'",
			      "$ '.number_format($finanzas[$i]["ingreso_diario"],2).'",
			      "$ '.number_format($finanzas[$i]["egreso_diario"],2).'",
			       "$ '.number_format($finanzas[$i]["salario_diario"],2).'",
			      "$ '.number_format($finanzas[$i]["ganancia_neta"],2).'",
			      "'.$botones.'"
			    ],';

			
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
$activarFinanzas = new TablaFinanzas();
$activarFinanzas -> mostrarTablaFinanzas();

