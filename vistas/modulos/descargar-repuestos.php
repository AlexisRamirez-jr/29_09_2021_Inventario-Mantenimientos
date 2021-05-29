<?php

require_once "../../controladores/productos.controlador.php";
require_once "../../modelos/productos.modelo.php";
require_once "../../controladores/categorias.controlador.php";
require_once "../../modelos/categorias.modelo.php";

$reporte = new ControladorProductos();
$reporte -> ctrDescargarRepuestos();