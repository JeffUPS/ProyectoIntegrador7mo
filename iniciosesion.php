<?php include('registro.php') ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ticket Express | Inicio Sesion</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
	
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		
	</head>
	<body >

		<!-- Header -->
			<header id="header">
				<h1><a href="index.php">Ticket Express</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Inicio</a></li>
						<li><a href="info.php">Información</a></li>
						<li><a href="help.php">Ayuda</a></li>
						<li><a href="iniciosesion.php" class="button special">Inicio Sesión</a></li>
					</ul>
				</nav>
			</header>
			<section id="three" class="wrapper style2 special">
				<div class="row 150%">
					<div class="4u 12u$(medium)">
							<img src="images/sierra.jpg" width="350" height="650">
					</div>
					<div class="4u 12u$(medium)">
						</br></br></br></br>
						<div class="container 50%">
							<header class="major">
								<h2>Inicio de Sesion</h2>
							</header>
						

							<form method="post" action="iniciosesion.php">
							<div class="row uniform">
								<div class="12u 12u(small)">
									<input type="text" name="correo" placeholder="Ingrese su Correo Electronico" required/>
								</div>
								<div class="12u 12u$">
									<input type="password" name="password" placeholder="Ingrese su Contraseña" required/>
								</div>
								<div class="12u 12u$">
									</br>No eres miembro?<a href="registrar.php"><b>&nbsp;&nbsp;Unete Ahora</b></a></br>
								</div>
								<div class="12u$">
									<ul class="actions">
										<li><button type="submit" class="button fit" name="login_user">Iniciar Sesion</button></li>
									</ul>
								</div>
							</div>
							</form>
						</div>
					</div>
					<div class="4u$ 12u$(medium)">
							<img src="images/costa.jpg"width="350" height="650">
					</div>
				</div>
			</section>
		

			<footer id="footer">
				<div class="container">
					<section class="links">
						<div class="row">
							<section class="3u 6u(medium) 12u$(small)">
								<h3>Somos Ticket Express</h3>
								<ul class="unstyled">
									<li><a href="nuestrotelefono.php">Nuestro Telefono</a></li>
									<li><a href="trabajo.php">Trabaja en Ticket Express</a></li>
									<li><a href="sobre.php">Sobre Ticket Express</a></li>
								</ul>
							</section>
							<section class="3u 6u$(medium) 12u$(small)">
								<h3>Confianza en tus Compras</h3>
								<ul class="unstyled">
									<li><a href="terminoscondiciones.php">Terminos y Condiciones</a></li>
									<li><a href="politica.php">Politica de Privacidad</a></li>
									<li><a href="formaspago.php">Conoce las Formas de Pago</a></li>
								</ul>
							</section>
							<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
							</ul>
						</div>
							
						</div>
					</section>
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; Arnaldo Ortiz - Wilian Tapia - Jefferson Yanqui</li>
								<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
	</body>
</html>