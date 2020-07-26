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

  $sql="SELECT * FROM ciudad";
  $resultado = $mysqli->query($sql); 

  $destino="SELECT * FROM ciudadesti";
  $dest= $mysqli->query($destino);
   
  $aer="SELECT * FROM aereolinea";
  $res= $mysqli->query($aer);

  $avi= "SELECT * FROM avion";
  $av=$mysqli->query($avi);

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
						
						<li><?php  if (isset($_SESSION['correo'])) : ?>
						<a href="profiel.php"><?php echo $_SESSION['correo']; ?></a>
						<?php endif ?></li>	
						<li><a href="admine.php">Inicio</a></li>
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
   
    
    <div class="row">
      <h2 style="text-align:center">REGISTRO DE VUELOS</h2>
    </div>
       <form action="guardarvuelo.php" method="POST" enctype="multipart/form-data">
       <select name= "ciudad_origen">
             <option value="Seleccione">---SELECCIONE---</option>
             <?php foreach ($resultado as $opc): ?>
              <option value="<?php echo $opc['ciudad_origen']?>"><?php echo $opc['ciudad_origen'] ?>
              </option> 
             <?php endforeach ?>
          </select><br><br>
          Ciudad Destino:
          <select name= "ciudad_destino">
             <option value="Seleccione">---SELECCIONE---</option> 
             <?php foreach ($dest as $opc): ?>
              <option value="<?php echo $opc['ciudad_destino']?>"><?php echo $opc['ciudad_destino'] ?>
              </option> 
             <?php endforeach ?>
          </select><br><br>
          Aereolinea:
          <select name= "aereolinea">
             <option value="Seleccione">---SELECCIONE---</option>
             <?php foreach ($res as $opc): ?>
              <option value="<?php echo $opc['aereolinea']?>"><?php echo $opc['aereolinea'] ?>
              </option> 
             <?php endforeach ?>
          </select><br><br>
          <input type="file" name="foto_aereo" id="foto_aereo"><br><br>
          Numero de vuelo:
          <input type="text" name="num_vuelo" required=""><br><br>
          Hora de salida:
          <input type="time" name="hora_salida" min="1:00" max="24:00" step="600"><br><br>
          Hora de llegada:
          <input type="time" name="hora_llegada" min="1:00" max="24:00" step="600"><br><br>
          Fecha de salida:
          <input type="date" name="fecha_salida" value="" min="2020-05-01" max="2021-12-31"><br><br>
          Fecha de llegada:
          <input type="date" name="fecha_llegada" value="" min="2020-05-01" max="2021-12-31"><br><br>
          Asientos:
          <select name= "asientos">
             <option value="Seleccione">---SELECCIONE---</option>
             <?php foreach ($av as $opc): ?>
              <option value="<?php echo $opc['asientos']?>"><?php echo $opc['asientos'] ?>
              </option> 
             <?php endforeach ?>
          </select><br><br>
         Valor Pasaje
         <input type="text" name="valor_pasaje" required=""><br><br>

    
          <input type="submit" class="special" value="Guardar">
        </form>
					





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
