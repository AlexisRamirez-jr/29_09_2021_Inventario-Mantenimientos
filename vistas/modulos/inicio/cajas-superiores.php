<?php

$item = null;
$valor = null;
$orden = "id";

$Ingresos = ControladorINGRESODIARIO::ctrMostrarIngresos($item, $valor);
$totalIngesos = count($Ingresos);

//$empleados = ControladorVentas::ctrSumaTotalVentas();
$empleados = ModeloVentas::mdlSumaTotalEmpleados();

//$vehiculos = ControladorVentas::ctrSumaTotalInversion();
$vehiculos = ModeloVentas::mdlSumaTotalInversion();

//$mantenimientos = ControladorVentas::ctrSumaTotalMantenimientos();
$sumamantenimientos = ModeloVentas::mdlSumaTotalMantenimientos();

$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
$totalCategorias = count($categorias);

$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
$totalClientes = count($clientes);

$mantenimientos = ControladorMantenimientos::ctrMostrarMantenimientos($item, $valor, $orden);
$totalProductos = count($mantenimientos);

$repuestos = ControladorProductos::ctrMostrarRepuestos($item, $valor, $orden);
$totalRepuestos = count($repuestos);

?>



<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-purple">

    <div class="inner">

      <h3>$<?php echo number_format($vehiculos["total"],2); ?></h3>

      <p>Inversion por Flotas Adquiridas</p>

    </div>

    <div class="icon">

      <i class="ion ion-social-usd"></i>

    </div>

    <a href="ventas" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>




<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-blue">

    <div class="inner">

      <h3>$<?php echo number_format($empleados["total"],2); ?></h3>

      <p>Pagos a Empleados</p>

    </div>

    <div class="icon">

      <i class="ion ion-social-usd"></i>

    </div>

    <a href="clientes" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>



<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-aqua">

    <div class="inner">

      <h3>$<?php echo number_format($sumamantenimientos["total"],2); ?></h3>

      <p>Costo de Mantenimientos</p>

    </div>

    <div class="icon">

      <i class="ion ion-social-usd"></i>

    </div>

    <a href="mantenimientos" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>



<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-green">

    <div class="inner">

      <h3><?php echo number_format($totalCategorias); ?></h3>

      <p>Categorías</p>

    </div>

    <div class="icon">

      <i class="ion ion-clipboard"></i>

    </div>

    <a href="categorias" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-yellow">

    <div class="inner">

      <h3><?php echo number_format($totalClientes); ?></h3>

      <p>Empleados</p>

    </div>

    <div class="icon">

      <i class="ion ion-person-add"></i>

    </div>

    <a href="clientes" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-red">

    <div class="inner">

      <h3><?php echo number_format($totalProductos); ?></h3>

      <p>Mantenimientos</p>

    </div>

    <div class="icon">

      <i class="ion ion-ios-cart"></i>

    </div>

    <a href="mantenimientos" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-yellow">

    <div class="inner">

      <h3><?php echo number_format($totalRepuestos); ?></h3>

      <p>Repuestos</p>

    </div>

    <div class="icon">

      <i class="ion ion-model-s"></i>

    </div>

    <a href="productos" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>


<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-purple">

    <div class="inner">

      <h3><?php echo number_format($totalIngesos); ?></h3>

      <p>Finanzas</p>

    </div>

    <div class="icon">

      <i class="ion ion-social-usd"></i>

    </div>

    <a href="ingresosdiarios" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

    </div>
  </div>
