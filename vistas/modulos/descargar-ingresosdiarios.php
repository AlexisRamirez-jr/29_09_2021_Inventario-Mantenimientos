<?php

require_once "../../controladores/IngresoDiario.controlador.php";
require_once "../../modelos/Ingreso.modelo.php";


$reporte = new ControladorINGRESODIARIO();
$reporte -> ctrDescargarIngresosdiarios();