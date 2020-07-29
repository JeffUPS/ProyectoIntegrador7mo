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
		 $nombre= $_POST['nombre'];
   
		 if(!empty($nombre)){
			$where= "WHERE nombre ='$nombre'";
	
		 }
	 }
?>

<?php
    if(isset($_SESSION['correo'])) { // comprobamos que la sesión esté iniciada
        if(isset($_POST['enviar'])) {
            if($_POST['password'] != $_POST['usuario_clave_conf']) {
                echo "Las contraseñas ingresadas no coinciden. <a href='profieladmin.php;'>Reintentar</a>";
            }else {
                $usuario_nombre = $_SESSION['correo'];
                $usuario_clave = mysqli_real_escape_string($_POST["password"]);
                $usuario_clave = md5($usuario_clave); // encriptamos la nueva contraseña con md5
                $sql = mysqli_query("UPDATE clientes SET password='".$password."' WHERE correo ='".$correo."'");
                if($sql) {
                    echo "Contraseña cambiada correctamente.";
                }else {
                    echo "Error: No se pudo cambiar la contraseña. <a href='profieladmin.php'>Reintentar</a>";
                }
            }
        }else {
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
						<a href="profieladmin.php"><?php echo $_SESSION['correo']; ?></a>
						<?php endif ?></li>	
						<li><a href="admin.php">Inicio</a></li>
						<li><a href="registrovuelo.php">Registrar Vuelo</a></li>
						<li><a href="verclientes.php">Ver Clientes</a></li>
						<li><a href="salir.php" class="button special">Salir</a></li>
					</ul>
				</nav>
			</header>

		<!-- Main -->
			<section id="two" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h3>Perfil</h3>
					</header>
					<section class="profiles">
						<div class="row">
							<section class="3u 4u(small) profile">
								<img src="images/profile_placeholder.gif" alt="" />
								<?php
        							$query = $mysqli->query("SELECT * FROM clientes ORDER BY id DESC LIMIT 10");
        							if($query->num_rows > 0){ 
            						$row = $query->fetch_assoc()
								?>
								<h5>Nombre</h5>
								<?php echo $row['nombre']; ?>
								<?php }?>
								<h5>Correo</h5>
								<?php echo $_SESSION['correo']; ?>
							</section>
							<section class="3u 6u$(medium) 12u$(xsmall) profile">
								<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
									<div class="12u$ 12u$(6)">
										<input type="password" name="password" placeholder="Ingrese Nueva Contraseña" required/>
									</div>
									</br>
									<div class="12u$ 12u$(6)">
										<input type="password" name="usuario_clave_conf" placeholder="Confirmar Nueva Contraseña" required/>
									</div>
									</br>
									<div class="12u$ 12u$(6)">
										<input type="submit" name="enviar" value="Enviar" />
									</div>
								</form>
							</section>
						</div>
					</section>
				</div>
			</section>
			<?php
        }
    }else {
        echo "Acceso denegado.";
    }
?> 

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