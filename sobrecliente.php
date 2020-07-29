<?php 
	session_start(); 

	if (!isset($_SESSION['correo'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: iniciosesion.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['correo']);
		header("location: iniciosesion.php");
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ticket Express | Información</title>
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
	<body>

		<!-- Header -->
        <header id="header">
				<h1><a href="indexcliente.php">Ticket Express</a></h1>
				<nav id="nav">
					<ul>
						
						<li><?php  if (isset($_SESSION['correo'])) : ?>
						<a href="profiel.php"><?php echo $_SESSION['correo']; ?></a>
						<?php endif ?></li>	
						<li><a href="indexcliente.php">Inicio</a></li>
						<li><a href="infocliente.php">Información</a></li>
						<li><a href="helpcliente.php">Ayuda</a></li>
						<li><a href="viewCart.php" title="View Cart"><img src="images/logocarrito.png" width="30" height="30"></a></li>
						<li><a href="salir.php" class="button special">Salir</a></li>
					</ul>
				</nav>
			</header>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Sobre Ticket Express</h2>
						<p>Viaja a tus lugares favoritos.</p>
					</header>
					<p>Ticket Express una compañía de venta de ticket aereos, es líder en el sector de la aviación privada. Somos propietarios, gestionamos y operamos la flota de aviones privados más amplia y diversa del mundo. </p>
				
					<p>Ticket Express empezó en 2019 como la primera empresa de venta de boletos aéreos nacional introdujimos el concepto de propiedad fraccionada para ofrecer a particulares y empresas todas las ventajas de la propiedad de un avión – y más – con un coste mucho menor. Hoy en día, Ticket Express ofrece una amplia gama de soluciones de aviación privada que satisfacen todo tipo de necesidades de viaje. Entre estas soluciones figuran, por ejemplo, vuelos expres, reserva de vuelos, vuelos extraordinarios, rutas específicas, servicio privado. </p>
				</div>
			</section>
			

		<!-- Footer -->
        <footer id="footer">
				<div class="container">
					<section class="links">
						<div class="row">
							<section class="3u 6u(medium) 12u$(small)">
								<h3>Somos Ticket Express</h3>
								<ul class="unstyled">
									<li><a href="nuestrotelefonocliente.php">Nuestro Telefono</a></li>
									<li><a href="trabajocliente.php">Trabaja en Ticket Express</a></li>
									<li><a href="sobrecliente.php">Sobre Ticket Express</a></li>
								</ul>
							</section>
							<section class="3u 6u$(medium) 12u$(small)">
								<h3>Confianza en tus Compras</h3>
								<ul class="unstyled">
									<li><a href="terminoscondicionescliente.php">Terminos y Condiciones</a></li>
									<li><a href="politicacliente.php">Politica de Privacidad</a></li>
									<li><a href="formaspagocliente.php">Conoce las Formas de Pago</a></li>
								</ul>
							</section>
							<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a href="https://www.facebook.com/Ticket-Express-100616961753420/" class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
								<li>
									<a href="https://github.com/JeffUPS/ProyectoIntegrador7mo" class="icon rounded fa-github"><span class="label">Github</span></a>
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