	<div class="fixed">
		<nav class="top-bar" data-topbar role="navigation">
			<ul class="title-area">
				<li class="name"><h1><a href="index.php">Fontus</a></h1></li>
				<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
			</ul>
			<?php
			session_start();
			switch (@$_SESSION['acesso']) {
				case 1:
					echo '
					<section class="top-bar-section">
					<ul class="right">
					<li><a href="alertas.php">Alertas</a></li>
					<li><a href="conf_caixa.php">Configurar Alertas</a></li>
					<li><a href="registro.php">Registro</a></li>
					<li><a href="contato.php">Contato</a></li>
					<li><a href="usuario.php">Usuario</a></li>
					<li><a href="actions/logout.php">Logout</a></li>
					</ul>
					</section> 
					';
					break;
				case 2:
					echo '
					<section class="top-bar-section">
					<ul class="left">
					<li><a href="cadastro_usu.php">Cadastro Usuário</a></li>
					</ul>
					</section> 
					<section class="top-bar-section">
					<ul class="right">
					<li><a href="contato.php">Contato</a></li>
					<li><a href="usuario.php">Usuario</a></li>
					<li><a href="actions/logout.php">Logout</a></li>
					</ul>
					</section> 
					';
					break;
				case 3:
					echo '
					<section class="top-bar-section">
					<ul class="left">
					<li><a href="cadastro_usu.php">Cadastro Usuário</a></li>
					<li><a href="cadastro_admin.php">Cadastro Administrador</a></li>
					</ul>
					</section> 
					<section class="top-bar-section">
					<ul class="right">
					<li><a href="contato.php">Contato</a></li>
					<li><a href="usuario.php">Usuario</a></li>
					<li><a href="actions/logout.php">Logout</a></li>
					</ul>
					</section>
					';
				break;
			}
			?>
		</nav>

	</div>    