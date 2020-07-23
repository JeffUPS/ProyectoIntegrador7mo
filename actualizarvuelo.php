<?php
 require 'database.php';
 $id = $_GET['id'];

 $sql = "SELECT * FROM bd_vuelo WHERE id='$id'";
 $resultado = $mysqli->query($sql); 
 
 $row = $resultado->fetch_assoc();
 
 $ciu="SELECT * FROM ciudades";
 $resu = $mysqli->query($ciu); 
   
 $aer="SELECT * FROM aereolinea";
 $res= $mysqli->query($aer);

 $avi= "SELECT * FROM avion";
 $av=$mysqli->query($avi);

 $logo= "SELECT * FROM logo";
 $log = $mysqli->query($log);
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
						<li><a href="help.php">Ayuda</a></li>
						<li><a href="salir.php" class="button special">Salir</a></li>
						
					</ul>
				</nav>
			</header>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

						
	<div class="row">
      <h2 style="text-align:center">MODIFICAR VUELO</h2>
    </div>
       <form action="actualizarvuelo.php" method="POST">
          <input type= "hidden" name="id" value="<?php echo $row['id']; ?>" >
          Ciudad Origen:
          <select name= "ciudad_origen">
             <option value="Seleccione">---SELECCIONE---</option>
             <?php foreach ($resu as $opc): ?>
              <option value="<?php echo $opc['ciudad_origen']?>"><?php echo $opc['ciudad_origen'] ?>
              </option> 
             <?php endforeach ?>
          </select><br><br>
          
          Ciudad Destino:
          <select name= "ciudad_destino">
             <option value="Seleccione">---SELECCIONE---</option>
             <?php foreach ($resu as $opc): ?>
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
		  Logo Aerolinea:
			 </br>
		  <input type="file" name="logo" value="<?php echo $opc['logo']?>">
			 </br>
          Numero de vuelo:
          <input type="text" name="numero_vuelo" value="<?php echo $row['numero_vuelo']; ?>" ><br><br>
          Hora de salida:
          <input type="time" name="hora_salida" min="1:00" max="24:00" step="600" value="<?php echo $row['hora_salida']; ?>" ><br><br>
          Hora de llegada:
          <input type="time" name="hora_llegada" min="1:00" max="24:00" step="600" value="<?php echo $row['hora_llegada']; ?>" ><br><br>
          Fecha de salida:
          <input type="date" name="fecha_salida"  value="<?php echo $row['fecha_salida']; ?>" ><br><br>
          Fecha de llegada:
          <input type="date" name="fecha_llegada" value="<?php echo $row['fecha_llegada']; ?>" ><br><br>
          Asientos:
          <div class="4u$ 12u$(4)">
			<input type="numero" name="asientos" id="name" value="" placeholder="Ingrese numero de asientos" required/>
		  </div>
			 </br>
    
          <input type="submit" class="btn btn-primary" value="Guardar">
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