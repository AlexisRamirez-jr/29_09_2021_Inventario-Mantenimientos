<?php

if($_SESSION["perfil"] == "Especial"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<div class="content-wrapper">

  <section class="content-header">

    <h1>

       Registro Financiero

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Registro Financiero</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarFinanzas">

          Registrar Nueva Finanza

        </button>

<div class="box-tools pull-right">

        <?php

        if(isset($_GET["fechaInicial"])){

          echo '<a href="vistas/modulos/descargar-finanzas.php?RegistroFinanciero=RegistroFinanciero&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'">';

        }else{

           echo '<a href="vistas/modulos/descargar-finanzas.php?RegistroFinanciero=RegistroFinanciero">';

        }         

        ?>
           
           <button class="btn btn-success" style="margin-top:5px">Descargar Reporte de Financiero</button>

          </a>

        </div>


      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablaFinanzas" width="100%">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>Fecha</th>
           <th>Responsable</th>
           <th>Ingreso Diario</th>
           <th>Egreso Diario</th>
           <th>Total Salarios</th>
           <th>Ganancia Neta</th>
           <th>Acciones</th>

         </tr>

        </thead>

      </thead>

       </table>

       <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">
      </div>
    </div>





  </section>

</div>




<!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->

<div id="modalAgregarFinanzas" class="modal fade" role="dialog">

  <div class="modal-dialog">

        <div class="modal-content">

          <form role="form" method="post" enctype="multipart/form-data">

            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

              <button type="button" class="close" data-dismiss="modal">&times;</button>

              <h4 class="modal-title">Agregar Finanza</h4>

            </div>

            <!--=====================================
            CUERPO DEL MODAL
            ======================================-->

            <div class="modal-body">

              <div class="box-body">


                <!-- ENTRADA PARA  -->

               <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                    <input type="text" class="form-control input-lg" name="nuevoFechaFinanza" placeholder="Ingresar fecha" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>


                  </div>

                </div>

                <!-- ENTRADA PARA  -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" class="form-control input-lg" id="nuevoResponsable" name="nuevoResponsable" placeholder="Ingresar su Nombre" required>

                  </div>

                </div>


               <!-- ENTRADA PARA VALOR -->

                <div class="form-group">
                      <div class="input-group">

                        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                        <input type="number" class="form-control input-lg" id="nuevoIngresoDiario" name="nuevoIngresoDiario" step="any" min="0" placeholder="Ingreso Diario" required>

                      </div>

                </div>


                 <!-- ENTRADA PARA VALOR -->

                 <div class="form-group row">

                    <div class="col-xs-6">

                      <div class="input-group">

                        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                        <input type="number" class="form-control input-lg" id="nuevoEgresoDiario" name="nuevoEgresoDiario" step="any" min="0" placeholder="Egreso Diario" required>

                      </div>

                    </div>

                    <!-- ENTRADA PARA PRECIO VENTA -->

                    <div class="col-xs-6">

                      <div class="input-group">
                      <span class="input-group-addon">Salarios:   <i class="ion ion-social-usd"></i></span>
                      <input type="decimal" class="form-control input-lg nuevoTotalSalario" min="0" value="10" required>
                      <input type="hidden" id="newtotalsalario" name="newtotalsalario">
                      </div>

                      <br>


                    </div>
                      <div class="col-xs-6">

                        <div class="form-group">
                        <label>
                            <input type="checkbox" class="minimal porcentaje" checked>
                            Calculo Automatico
                          </label>
                        </div>

                      </div>


                <div class="col-xs-6" >

                    <div class="input-group">

                  <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                    <input type="number" class="form-control input-lg" id="nuevoGanancia" name="nuevoGanancia" step="any" min="0" placeholder="Ganacia Neta" required>

                        </div>
                    </div>

                </div>


          
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Finanza</button>

        </div>

      </form>

        <?php

          $crearFinanza = new ControladorFinanzas();
          $crearFinanza -> ctrCrearFinanzas();

        ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

<div id="modalEditarFinanzas" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Finanza</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->


                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                    <input type="text" class="form-control input-lg" name="editarFechaFinanza" id="editarFechaFinanza"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
                     <input type="hidden" id="idFinanza" name="idFinanza">
                  </div>

                </div>

                <!-- ENTRADA PARA  -->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" class="form-control input-lg" id="editarResponsable" name="editarResponsable" required>

                  </div>

                </div>

              <!-- html comment -->

                  <div class="form-group">
                      <div class="input-group">

                        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                        <input type="number" class="form-control input-lg" id="editarIngresoDiario" name="editarIngresoDiario" step="any" min="0"  required>

                      </div>

                </div>


                 <!-- ENTRADA PARA VALOR -->

                 <div class="form-group row">

                    <div class="col-xs-6">

                      <div class="input-group">

                        <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                        <input type="number" class="form-control input-lg" id="editarEgresoDiario" name="editarEgresoDiario" step="any" min="0" required>

                      </div>

                    </div>

            

 <!-- ENTRADA PARA PRECIO VENTA -->

                    <div class="col-xs-6">

                      <div class="input-group">
                      <span class="input-group-addon">Salarios:   <i class="ion ion-social-usd"></i></span>
                      <input type="decimal" class="form-control input-lg nuevoTotalSalario" min="0" required>
                      <input type="hidden" id="edittotalsalario" name="edittotalsalario">
                      </div>

                      <br>

                    </div>
                      <div class="col-xs-6">

                        <div class="form-group">
                        <label>
                            <input type="checkbox" class="minimal porcentaje" checked>
                            Calculo Automatico
                          </label>
                        </div>

                      </div>


                <div class="col-xs-6" >

                    <div class="input-group">

                  <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>
                    <input type="decimal" class="form-control input-lg" id="editarGanancia" name="editarGanancia" step="any" min="0" required>

                        </div>
                    </div>

                </div>


          
          </div>

        </div>


        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

        <?php

            $editarFinanzas = new ControladorFinanzas();
          $editarFinanzas -> ctrEditarFinanzas();

        ?>

    </div>

  </div>

</div>

<?php

   $eliminarFinanza = new ControladorFinanzas();
   $eliminarFinanza -> ctrEliminarFinanzas();

?>
