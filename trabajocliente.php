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
						<h2>Trabaja en Ticket Express</h2>
						<p>Viaja a tus lugares favoritos.</p>
					</header>
					<p>Trabajar para Ticket Express es una de las oportunidades más envidiadas entre los amantes de los negocios. Tenemos a los mejores aviadores, a los más apasionados, a los que no les importa siempre dar más, y volamos en las mejores aeronaves, con el apoyo continuo de los equipos mejor preparados, más profesionales e innovadores, y que tienen la seguridad siempre en mente.</p>
					
					<p>Como Lider de Ticket Express, disfrutará de cada vuelo sabiendo que está ofreciendo un servicio extraordinario a personas extraordinarias. Le invitamos a leer la información siguiente para familiarizarse con nuestra compañía, nuestra filosofía y los procesos de contratación</p>
					
					<p>Ticket Express ofrece una retribución competitiva y un excelente paquete de beneficios que consiste en:</p>
                    <ul>
                        <li>Salario competitivo</li>
                        <li>Seguro médico que cubre también servicios odontológicos y oftalmológicos (desde el primer día de trabajo)</li>
                        <li>Seguro de vida</li>
                        <li>Seguro para discapacidad </li>
                        <li>Pérdida de licencia </li>
                        <li>Vacaciones pagadas </li>
                    </ul>
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