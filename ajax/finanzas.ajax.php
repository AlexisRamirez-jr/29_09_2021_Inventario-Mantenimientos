<?php

require_once "../controladores/finanzas.controlador.php";
require_once "../modelos/finanzas.modelo.php";


class AjaxFinanzas{

  public $idFinanza;

  public function ajaxEditarFinanzas(){

    $item = "id";
    $valor = $this->idFinanza;
    $orden = "id";
 
   $respuesta = ControladorFinanzas::ctrMostrarFinanzas($item, $valor,$orden);
    
    echo json_encode($respuesta);


  }

}

/*=============================================
EDITAR CLIENTE
=============================================*/ 

if(isset($_POST["idFinanza"])){

  $finanzas = new AjaxFinanzas();
  $finanzas -> idFinanza = $_POST["idFinanza"];
  $finanzas -> ajaxEditarFinanzas();

}


