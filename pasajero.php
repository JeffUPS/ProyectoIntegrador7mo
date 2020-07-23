<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: iniciosesion.php");
    exit;
}
?>
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
				<h1><a href="indexcliente.php">Ticket Express</a></h1>
				<nav id="nav">
					<ul>
						
						<li><a href="profiel.php"><?php echo htmlspecialchars($_SESSION["correo"]); ?></a></li>	
						<li><a href="indexcliente.php">Inicio</a></li>
						<li><a href="infocliente.php">Información</a></li>
						<li><a href="helpcliente.php">Ayuda</a></li>
						<li><a href="salir.php" class="button special">Salir</a></li>
					</ul>
				</nav>
			</header>

			<section id="main" class="wrapper" style="text-align:center" >
				<div class="container" >
					<form method="post" action="guardarpasajero.php">
						<header>
							<h2>Datos del Pasajero</h2>
						</header>
						<div class="row uniform 100%">
							<div class="4u$ 12u$(4)">
								<input type="text" name="nombre" id="name" value="" placeholder="Ingrese el Nombre del Pasajero" required/>
							</div>
							<div class="4u$ 12u$(4)">
								<input type="text" name="pasaporte" id="email" value="" placeholder="Ingrese el Numero de Pasaporte" required/>
							</div>
							<div class="4u$ 12u$(4)">
								<input type="date" name="nacimiento" id="email" value="" placeholder="Ingrese su fecha de nacimiento" required/>
							</div>
							<div class="4u 12u$(4)">
								<ul class="actions">
									<li><input type="submit" value="Comprar" class="special" /></li>
								</ul>
							</div>
						</div>
					</form>
					<?php if(!empty($message)): ?>
					<p><?= $message ?></p>
					<?php endif; ?>

				</div>	
			</section>
		

	<footer id="footer">
				<div class="container">
					<section class="links">
						<div class="row">
							<section class="3u 6u(medium) 12u$(small)">
								<h3>Somos Ticket Express</h3>
								<ul class="unstyled">
									<li><a href="#">Nuestro Telefono</a></li>
									<li><a href="#">Trabaja en Ticket Express</a></li>
									<li><a href="#">Sobre Ticket Express</a></li>
								</ul>
							</section>
							<section class="3u 6u$(medium) 12u$(small)">
								<h3>Confianza en tus Compras</h3>
								<ul class="unstyled">
									<li><a href="#">Terminos y Condiciones</a></li>
									<li><a href="#">Politica de Privacidad</a></li>
									<li><a href="#">Conoce las Formas de Pago</a></li>
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