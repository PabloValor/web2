<header>
	<nav class="light-blue darken-1">
		<div class="nav-wrapper">
			<div class="container">
				<a href="index.php" class="brand-logo">Dirty Trucks Inc.</a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li>
						<i class="material-icons">perm_identity</i>
					</li>
					<li>
						<a href="#!">
							<strong>
								Bienvenido, <?php echo $_SESSION['nombre']; ?>
							</strong>
						</a>
					</li>
					<li>
						<a href="salir.php" class="tooltipped" data-position="bottom" data-tooltip="Salir">
							<i class="material-icons">settings_power</i>
						</a>
					</li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li>
						<a href="#!">
							<strong>
								<?php echo $_SESSION['nombre']; ?>
							</strong>
						</a>
					</li>
					<li>
						<a href="#!">Mi Perfil</a>
					</li>
					<li>
						<a href="#!">Configuración</a>
					</li>
					<li>
						<a href="#!">Salir</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
