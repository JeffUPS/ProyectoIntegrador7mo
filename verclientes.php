<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: iniciosesion.php");
    exit;
}
 
// Include config file
require_once "database.php";

    // Close connection
    mysqli_close($link);

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
				<h1><a href="admin.php">Ticket Express</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="admin.php">Inicio</a></li>
						<li><a href="registrovuelo.php">Registrar Vuelo</a></li>
						<li><a href="verclientes.php">Ver Clientes</a></li>
						<li><a href="salir.php" class="button special">Salir</a></li>
						
					</ul>
				</nav>
			</header>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
					
					</header>
			
		<div class="row" style="text-align:center">
			<h3>Visualización Clientes</h3>
		</div>
		
		<div class="row table-responsive">
			<table class="table table-striped">
				<thead>
                <tr>
                <th>ID</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th> </th>
                <th> </th>
                </tr>
                </thead>
                <tbody>
					
                
                   <tr>
                   <td><?php echo htmlspecialchars($_SESSION["id_user"]); ?></td>
                   <td><?php echo htmlspecialchars($_SESSION["correo"]); ?></td>
                   <td><?php echo htmlspecialchars($_SESSION["password"]); ?></td>
                   <td><a href="actualizarvuelo.php?id=<?php echo $row['id'];?>" class="btn btn-info"><i class="fa fa-pencil-square-o"></i>Edit</a></td>
                   <td><a href="eliminarvuelo.php?id=<?php echo $row['id'];?>" class="btn btn-danger"><i class="fa fa-trash-o fa-lg"></i> Delete</a></td>
                   </tr>
               

                 </tbody>
            </table>




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