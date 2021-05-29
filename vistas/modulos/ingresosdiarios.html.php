<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Ingresos

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar Ingresos</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarIngresos">

          Agregar Ingreso

        </button>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>Placa</th>
           <th>Sede</th>
           <th>Motorista</th>
           <th>Jefe</th>
           <th>Monto</th>
           <th>Fecha</th>
           <th>Hora</th>
           <th>Administrar</th>

         </tr>

        </thead>

        <tbody>

          <tr>


            <td>Juan Villegas</td>

            <td>816j1123</td>

            <td>juan@hotmail.com</td>

            <td>555 57 j67</td>

            <td>45</td>

            <td>1982-15-11</td>

            <td>12:05:32</td>

            <td>

              <div class="btn-group">

                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

              </div>

            </td>

          </tr>


        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>



<!--=====================================
MODAL AGREGAR CLIENTE
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


    </div>

  </div>

</div>
