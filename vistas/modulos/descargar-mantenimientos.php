<?php

require_once "../../controladores/mantenimientos.controlador.php";
require_once "../../modelos/mantenimientos.modelo.php";
require_once "../../controladores/categorias.controlador.php";
require_once "../../modelos/categorias.modelo.php";

$reporte = new ControladorMantenimientos();
$reporte -> ctrDescargarMantenimientos();