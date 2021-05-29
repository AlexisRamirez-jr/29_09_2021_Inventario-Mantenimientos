<?php

require_once "../controladores/mantenimientos.controlador.php";
require_once "../modelos/mantenimientos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxMantenimientos{

  /*=============================================
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
  =============================================*/
  public $idCategoria;

  public function ajaxCrearCodigoMantenimiento(){

    $item = "id_categoria";
    $valor = $this->idCategoria;
    $orden = "id";

    $respuesta = ControladorMantenimientos::ctrMostrarMantenimientos($item, $valor, $orden);

    echo json_encode($respuesta);

  }


  /*=============================================
  EDITAR PRODUCTO
  =============================================*/ 

  public $idMantenimiento;
  public $traerMantenimientos;
  public $nombreMantenimiento;

  public function ajaxEditarMantenimiento(){

    if($this->traerMantenimientos == "ok"){

      $item = null;
      $valor = null;
      $orden = "id";

      $respuesta = ControladorMantenimientos::ctrMostrarMantenimientos($item, $valor,
        $orden);

      echo json_encode($respuesta);


    }else if($this->nombreMantenimiento != ""){

      $item = "descripcion";
      $valor = $this->nombreMantenimiento;
      $orden = "id";

      $respuesta = ControladorMantenimientos::ctrMostrarMantenimientos($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }else{

      $item = "id";
      $valor = $this->idMantenimiento;
      $orden = "id";

      $respuesta = ControladorMantenimientos::ctrMostrarMantenimientos($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }

  }

}


/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/ 

if(isset($_POST["idCategoria"])){

  $codigoMantenimiento = new AjaxMantenimientos();
  $codigoMantenimiento -> idCategoria = $_POST["idCategoria"];
  $codigoMantenimiento -> ajaxCrearCodigoMantenimiento();

}
/*=============================================
EDITAR PRODUCTO
=============================================*/ 

if(isset($_POST["idMantenimiento"])){

  $editarMantenimiento = new AjaxMantenimientos();
  $editarMantenimiento -> idMantenimiento = $_POST["idMantenimiento"];
  $editarMantenimiento -> ajaxEditarMantenimiento();

}

/*=============================================
TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["traerMantenimientos"])){

  $traerMantenimientos = new AjaxMantenimientos();
  $traerMantenimientos -> traerMantenimientos = $_POST["traerMantenimientos"];
  $traerMantenimientos -> ajaxEditarMantenimiento();

}

/*=============================================
TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["nombreMantenimiento"])){

  $traerMantenimientos = new AjaxMantenimientos();
  $traerMantenimientos -> nombreMantenimiento = $_POST["nombreMantenimiento"];
  $traerMantenimientos -> ajaxEditarMantenimiento();

}






