<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php

			if($_SESSION["perfil"] == "Super Administrador"){

				echo '<li class="active">

					<a href="inicio">

						<i class="fa fa-home"></i>
						<span>Inicio</span>

					</a>

				</li>

				<li>

					<a href="usuarios">

						<i class="fa fa-user"></i>
						<span>Usuarios</span>

					</a>

				</li>';

			}




			if($_SESSION["perfil"] == "Super Administrador" || $_SESSION["perfil"] == "Administrador"){

				echo '<li class="treeview">

					<a href="#">

						<i class="ion ion-social-usd"></i>
						
						<span>Ingresos</span>
						
						<span class="pull-right-container">
						
							<i class="fa fa-angle-left pull-right"></i>

						</span>

					</a>

					<ul class="treeview-menu">
						
						<li>

							<a href="ingresosdiarios">
							<i class="fa fa-circle-o"></i>
							<span>Registrar Ingreso diario</span>
							</a>

						</li>

						<li>
							<a href="finanzas">
								<i class="fa fa-circle-o"></i>
								<span> Registrar Estado financiero</span>
							</a>
						</li>
						';


					echo '</ul>

				</li>';

			}




			if($_SESSION["perfil"] == "Super Administrador" || $_SESSION["perfil"] == "Administrador"){

				echo '<li>

					<a href="categorias">

						<i class="fa fa-th"></i>
						<span>Categorías</span>

					</a>

				</li>

				<li>

				<li>

					<a href="mantenimientos">

						<i class="fa fa-refresh fa-spin"></i>
						<span>Mantenimientos</span>

					</a>

				</li>
				<li>
					<a href="productos">

						<i class="fa fa-product-hunt"></i>
						<span>Repuestos</span>

					</a>

				</li>
				';

			}

			

			if($_SESSION["perfil"] == "Super Administrador" || $_SESSION["perfil"] == "Supervisor"){

				echo '<li>

					<a href="clientes">

						<i class="fa fa-users"></i>
						<span>Empleados</span>

					</a>

				</li>';

			}

			

			if($_SESSION["perfil"] == "Super Administrador" || $_SESSION["perfil"] == "Supervisor"){

				echo '<li class="treeview">

					<a href="#">

						<i class="fa fa-list-ul"></i>
						
						<span>REPORTES</span>
						
						<span class="pull-right-container">
						
							<i class="fa fa-angle-left pull-right"></i>

						</span>

					</a>

					<ul class="treeview-menu">
						
						<li>

							<a href="ventas">
							<i class="fa fa-circle-o"></i>
							<span>Administrar Flotas</span>
							</a>

						</li>

						';

						if($_SESSION["perfil"] == "Super Administrador"){

						echo '
						<li>
							<a href="ingresosdiarios">
								<i class="fa fa-circle-o"></i>
								<span>Administrar Finanzas</span>
							</a>
						</li>

						<li>
							<a href="reportes">
								<i class="fa fa-circle-o"></i>
								<span>Reporte de Unidades</span>
							</a>
						</li>
						';

						}

					

					echo '</ul>

				</li>';

			}

		?>

		</ul>

	 </section>

</aside>


