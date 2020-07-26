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
         #AND ciudad_origen ='$valor2' AND num_vuelo = '$valor1'";
         #"WHERE ciudad_origen LIKE '%$ciudad_origen%' AND ciudad_destino LIKe '%$ciudad_destino%' AND fecha_salida LIKE '%$fecha_salida%' AND fecha_llegada LIKE '%$fecha_llegada%'";
         
      }
  }

  $ql= "SELECT * FROM vuelo $where";
  $resultado1 = $mysqli->query($ql);
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ticket Express | Administrador</title>
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
		<section id="one" class="wrapper style1 special">
			<div class="container">
				<header class="major">
					<h2>Viaja a tus lugares favoritos</h2>
				</header>
				<div class="row">
					<div class="12u$">
					<?php
        			$query = $mysqli->query("SELECT * FROM vuelo ORDER BY id DESC LIMIT 10");
        			if($query->num_rows > 0){ 
            		while($row = $query->fetch_assoc()){
        			?>
						<section class="box">	
                            	<div>
                            		<img src="images/avion.png" width="30" height="30">
									<?php echo $row['ciudad_origen']; ?><b> -> </b><?php echo $row['ciudad_destino']; ?>
								<div class="4u">
									
									<b>Ida:</b>
									<?php echo $row['fecha_salida']; ?>
									<b>Hora:</b>
									<?php echo $row['hora_salida']; ?>Hs
									<b>Vuelta:</b>
									<?php echo $row['fecha_llegada']; ?>
									<b>Hora:</b>
									<?php echo $row['hora_llegada']; ?>Hs
									<?php echo $row['aereolinea']; ?>
									<?php echo $row['num_vuelo']; ?>
								</div>
								<div class="col-md-6">
                            		<p class="lead"><?php echo '$'.$row["valor_pasaje"].' USD'; ?></p>
                        		</div>
								<div>
								<a class="button" href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>">Comprar</a>
								</div>
						</section>
						<?php } }else{ ?>
        				<p>Product(s) not found.....</p>
        				<?php } ?>
							
						
					</div>
				
					
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