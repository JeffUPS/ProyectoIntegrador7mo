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
		<section id="two" class="wrapper style2 special">
			<div class="container">
				<header class="major">
					<h2>Viaja a tus lugares favoritos</h2>
				</header>
							<hr>
					<div class="12u$">
						<!-- Consulta Busqueda de Vuelo -->
						<?php while($row = $resultado1->fetch_array(MYSQLI_ASSOC)) {?>
							<!-- Consulta Compra de Vuelo -->
							<?php $query = $mysqli->query("SELECT * FROM vuelo ORDER BY id DESC LIMIT 10");
        						if($query->num_rows > 0){ 
            						while($row = $query->fetch_assoc()){
							?>
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
								<a class="button" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">Comprar</a>
									</br>
							</section>
						</div>
					</section>
					
								<?php } }else{ ?>
        								<p>No Exitsten Vuelo</p>
									<?php } ?>
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