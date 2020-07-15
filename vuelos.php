<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id_user, correo, nombre, password FROM clientes WHERE id_user = :id_user');
    $records->bindParam(':id_user', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>
<?php
 require 'database.php';
 $where = "";

  if(!empty($_POST)){
      
      $fecha_salida= $_POST['fecha_salida'];
      $fecha_llegada=$_POST['fecha_llegada'];

      if(!empty($fecha_salida and $fecha_llegada)){
         $where= "WHERE fecha_salida='$fecha_salida' AND fecha_llegada='$fecha_llegada'";
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
				<h1><a href="indexcliente.php">Ticket Express</a></h1>
				<nav id="nav">
					<ul>
                        <li><a href="indexcliente.php">Inicio</a></li>
						<li><a href="info.php">Información</a></li>
						<li><a href="help.php">Ayuda</a></li>
						<li><a href="iniciosesion.php" class="button special">Inicio Sesión</a></li>
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
						<section class="box">
						<?php while($row = $resultado1->fetch_array(MYSQLI_ASSOC))  { ?>
                            <div class="4u">
                            <img src="images/avion.png" width="30" height="30">
							<img src="images/tame.png" width="80" height="50">
							<div>
							<b>Ida:</b>
							<?php echo $row['fecha_salida']; ?>
							<b>Hora:</b>
							<?php echo $row['hora_salida']; ?>Hs
						</section>
						</br>
						<section class="box">
							<img src="images/avion.png" width="30" height="30">
							<img src="images/tame.png" width="80" height="50">
							<div>
							<b>Vuelta:</b>
							<?php echo $row['fecha_llegada']; ?>
							<b>Hora:</b>	
							<?php echo $row['hora_llegada']; ?>Hs  
						</div>
						</div> 
                            </div>
                          
						<?php } ?>
						</section>
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