<?php
 require 'database.php';
 $sql="SELECT ciudad_origen,ciudad_destino FROM ciudad,ciudadesti WHERE ciudad_origen=ciudad_destino";
 $resultado = $mysqli->query($sql); 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ticket Express</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		
	</head>
	<body class="landing">
		<!-- Header -->
			<header id="header">
				<h1><a href="index.php">Ticket Express</a></h1>
				<nav id="nav">
					<ul>
						
						<li><a href="index.php">Inicio</a></li>
						<li><a href="info.php">Información</a></li>
						<li><a href="help.php">Ayuda</a></li>
						<li><a href="iniciosesion.php" class="button special">Inicio Sesión</a></li>
					</ul>
				</nav>
			</header>
		<!-- Banner -->
			<section id="banner">
				<h2>Bienvenido a Ticket Express</h2>
				<p>Viaja a tus lugares favoritos.</p>
			</section>

		<!-- One -->
			<section id="two" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>Elige tu Vuelo</h2>
					</header>

					
					<div class="container 150%">
							<div class="row">
								<div class="4u(3)">
									<input type="radio" id="isDiscounted" name="isDiscounted" value= 1 th:field="*{discounted}" checked>
									<label for="isDiscounted">Ida y Vuelta</label>
								</div>
							<div class="4u(3)">
								<input type="radio" id="isNotDiscounted" name="isDiscounted" value= 0 th:field="*{discounted}">
								<label for="isNotDiscounted">Solo Ida</label>
							</div>
							<form action="vuelos.php" method="POST">
								<div class="row uniform">
									<div class="6u(small)">
										<h3>Origen:</h3>
									</div>
									<div class="6u(small)">
									<select name= "ciudad_origen">
             							<option value="Seleccione">Seleccione</option>
            							<?php foreach ($resultado as $opc): ?>
              							<option value="<?php echo $opc['ciudad_origen']?>"><?php echo $opc['ciudad_origen'] ?>
              							</option> 
             							<?php endforeach ?>
          							</select>
									</div>
									<div class="6u(small)">
										<h3>Destino:</h3>
									</div>
									<div class="6u(small)">
										<select name="ciudad_destino">
											<option value="value1">Seleccione</option>
											<?php foreach ($resultado as $opc): ?>
              								<option value="<?php echo $opc['ciudad_destino']?>"><?php echo $opc['ciudad_destino'] ?>
              								</option> 
             								<?php endforeach ?>
										  </select>
									</div>
									<div class="6u(small)">
										<h3>Fecha Ida:</h3>
									</div>
									<div class="6u(small)">
										<input type="date" name="fecha_salida" value="2020-07-22">
									</div>
									<div class="6u(small)">
										<h3>Fecha Vuelta:</h3>
									</div>
									<div class="6u(small)">
										<input type="date" name="fecha_llegada" value="2020-07-22" id="discountPercentage" th:field="*{discountPercentage}" enable>
									</div>
									<div class="6u(small)">
										<ul class="actions">
											<input value="Buscar" id="enviar" name="enviar" class="special medium" type="submit">
										</ul>
									</div>
								</div>
						</form>
						
						</div>
				
				</div>
			</section>

		<!-- Two -->
		<section id="one" class="wrapper style1 special">
			<div class="container">
				<header class="major">
					<h2>Viaja a tus lugares favoritos</h2>
				</header>
				<div class="row 150%">
					<div class="4u 12u$(medium)">
						<section class="box">
							<img src="images/img3.png" width="277" height="277">
							<h3>Busca</h3>
							<p>Elige el destino y la fecha de tu próximo vuelo. Puedes añadir requisitos adicionales para tu búsqueda como: clase, número de viajeros adultos, niños, etc.</p>
						</section>
					</div>
					<div class="4u 12u$(medium)">
						<section class="box">
							<img src="images/img2.jpeg" width="300" height="300">
							<h3>Destinos</h3>
							<p>Puedes filtrar los resultados según tus necesidades para encontrar el vuelo a tu necesidad y destino que te dirijas.</p>
						</section>
					</div>
					<div class="4u$ 12u$(medium)">
						<section class="box">
							<img src="images/img1.jpeg"width="300" height="300">
							<h3>Viaja</h3>
							<p>¡Encuentra el vuelo ideal! Podrás comprar los boletos de avión directamente en el sitio web de la agencia de viajes.</p>
						</section>
					</div>
				</div>
			</div>
		</section>

		<!-- Two -->
			

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
	
	<script src="js/check.js"></script>
	</body>
</html>