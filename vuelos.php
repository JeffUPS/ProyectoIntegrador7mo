<?php

 require 'database.php';
 $where = "";

 if(!empty($_POST)){
	$ciudad_origen= $_POST['ciudad_origen'];
	$ciudad_destino= $_POST['ciudad_destino'];
	$fecha_salida= $_POST['fecha_salida'];
	$fecha_llegada=$_POST['fecha_llegada'];

	if(!empty($ciudad_origen and $ciudad_destino and $fecha_salida and $fecha_llegada)){
	   $where= "WHERE ciudad_origen ='$ciudad_origen' AND ciudad_destino='$ciudad_destino' AND fecha_salida='$fecha_salida' AND fecha_llegada='$fecha_llegada'";

	}
}

$ql= "SELECT * FROM vuelo $where";
$resultado1 = $mysqli->query($ql);
?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ticket Express | Vuelos</title>
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
				<h1><a href="index.php">Ticket Express</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Inicio</a></li>
						<li><a href="info.php">Información</a></li>
						<li><a href="help.php">Ayuda</a></li>
						<li><a href="iniciosesion.php" class="button special">Iniciar Sesion</a></li>
					</ul>
				</nav>
			</header>

		<!-- Main -->
		<section id="two" class="wrapper style2 special">
			<div class="container">
				<header class="major">
					<h2>Viaja a tus lugares favoritos</h2>
				</header>
							<hr>
					<div class="12u$">
						<!-- Consulta Busqueda de Vuelo -->
						<?php while($row = $resultado1->fetch_array(MYSQLI_ASSOC)) { ?>
							
					<section class="links">
						<div class="row">
							<section class="3u 6u(medium) 12u$(small)">
								<img src="images/avion.png" width="30" height="30">
								<b><?php echo $row['ciudad_origen']; ?> -> <?php echo $row['ciudad_destino']; ?></b>
							</section>
							<section class="3u 6u$(medium) 12u$(small)">
								<?php echo '<img src="'.$row["foto_aereo"].'" width="100" heigth="100">';?>	
								<b>Salida:</b>
								<?php echo $row['fecha_salida']; ?></br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<b>Hora:</b>
								<?php echo $row['hora_salida']; ?>Hs
							</section>
							<section class="3u 6u(medium) 12u$(small)">
									</br>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<b>Llegada:</b>
								<?php echo $row['fecha_llegada'];?></br>
								<b>Hora:</b>
								<?php echo $row['hora_llegada']; ?>Hs</br>
								<b><?php echo $row['aereolinea']; ?></br>
								<?php echo $row['num_vuelo']; ?></b>
							</section>
									</br>
							<section class="3u$ 6u$(medium) 12u$(small)">
								<h3>Costo</h3>
								<h4>$<?php echo $row['valor_pasaje']; ?>USD</h4></br>
								<a class="button" href="iniciosesion.php">Comprar</a>
									</br>
							</section>
						</div>
					</section>
					
								
						<?php } ?>
					</div>
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
