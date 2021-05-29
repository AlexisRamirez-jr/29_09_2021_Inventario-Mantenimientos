<?php

require_once "../../controladores/finanzas.controlador.php";
require_once "../../modelos/finanzas.modelo.php";


$reporte = new ControladorFinanzas();
$reporte -> ctrDescargarFinanzas();