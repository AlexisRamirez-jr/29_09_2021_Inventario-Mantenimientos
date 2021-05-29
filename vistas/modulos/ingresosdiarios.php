<?php

if($_SESSION["perfil"] == "Administrador"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Ingresos Diarios

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Ingresos Diarios</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarIngresos">

          Agregar Ingresos

        </button>

 <div class="box-tools pull-right">

        <?php

        if(isset($_GET["fechaInicial"])){

          echo '<a href="vistas/modulos/descargar-ingresosdiarios.php?ingresosdiarios=ingresosdiarios&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'">';

        }else{

           echo '<a href="vistas/modulos/descargar-ingresosdiarios.php?ingresosdiarios=ingresosdiarios">';

        }         

        ?>
           
           <button class="btn btn-success" style="margin-top:5px">Descargar reporte en Excel</button>

          </a>

        </div>


      </div>



      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>Placa</th>
           <th>Sede</th>
           <th>Motorista</th>
           <th>Jefe</th>
           <th>Monto</th>
           <th>Hora</th>
           <th>Fecha</th>
           <th>Administrar</th>

         </tr>

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $ingresosdiarios = ControladorINGRESODIARIO::ctrMostrarIngresos($item, $valor);

          foreach ($ingresosdiarios as $key => $value) {


            echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["placa"].'</td>

                    <td>'.$value["sede"].'</td>

                    <td>'.$value["conductor"].'</td>

                    <td>'.$value["encargado_jefe"].'</td>

                     <td>$ '.number_format($value["monto"],2).'</td>

                    <td>'.$value["hora"].'</td>


                    <td>'.$value["fecha"].'</td>

                    <td>

                      <div class="btn-group">

                        <button class="btn btn-warning btnEditarIngresos" data-toggle="modal" data-target="#modalEditarIngresos" idIngreso="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';

                      if($_SESSION["perfil"] == "Super Administrador"){
                       
                         echo '  <button class="btn btn-danger btnEliminarIngresos" idIngreso="'.$value["id"].'"><i class="fa fa-times"></i></button>';
                          

                      }

                      echo '</div>

                    </td>

                  </tr>';

            }

        ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR Empleado
======================================-->

<div id="modalAgregarIngresos" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Ingreso</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoPlaca" placeholder="Ingresar placa" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoSede" placeholder="Ingresar Sede" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoConductor" placeholder="Ingresar nombre del conductor" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoJefe" placeholder="Ingresar nombre del encargado" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL SALARIO -->

                     <div class="form-group">

                       <div class="input-group">

                         <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                         <input type="decimal" class="form-control input-lg" name="nuevoMonto" placeholder="Ingresar Monto" required>

                       </div>

                     </div>


                   </div>

                 </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoHora" placeholder="Ingresar Hora" required>

              </div>

            </div>

             <!-- ENTRADA PARA LA FECHA  -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoFecha" placeholder="Ingresar fecha" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>



        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Ingreso</button>

        </div>

      </form>

      <?php

        $crearIngreso = new ControladorINGRESODIARIO();
        $crearIngreso -> ctrCrearIngreso();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

<div id="modalEditarIngresos" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Ingreso</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarPlaca" id="editarPlaca" required>
               <input type="hidden" id="idIngreso" name="idIngreso">
              
              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" name="editarSede" id="editarSede" required >

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="text" class="form-control input-lg" name="editarConductor" id="editarConductor" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="editarJefe" id="editarJefe" required>

              </div>

            </div>

            <div class="form-group">

             <div class="input-group">

               <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

               <input type="decimal" class="form-control input-lg" name="editarMonto" id="editarMonto" required>

             </div>

           </div>

            <!-- ENTRADA PARA  -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="editarHora" id="editarHora"  required>

              </div>

            </div>

             <!-- ENTRADA PARA LA FECHA DE NACIMIENTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" name="editarFechas" id="editarFechas"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

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

        $editarIngreso = new ControladorINGRESODIARIO();
        $editarIngreso -> ctrEditarIngresos();

      ?>



    </div>

  </div>

</div>

<?php

  $eliminarIngreso = new ControladorINGRESODIARIO();
  $eliminarIngreso -> ctrEliminarIngresos();

?>
