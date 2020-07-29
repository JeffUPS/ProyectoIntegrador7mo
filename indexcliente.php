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
<?php
 require 'database.php';
 $sql="SELECT DISTINCTROW ciudad_origen,ciudad_destino FROM vuelo";
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
									<input type="radio" id="priority-normal" name="ranking0" checked>
									<label for="priority-normal">Ida y Vuelta</label>
								</div>
							<div class="4u(3)">
								<input type="radio" id="priority-normal" name="ranking0">
								<label for="priority-low">Solo Ida</label>
							</div>

							</div>
							<form action="vueloscliente.php" method="POST">
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
										<input type="date" name="fecha_salida" value="2020-07-22" >
									</div>
									<div class="6u(small)">
										<h3>Fecha Vuelta:</h3>
									</div>
									<div class="6u(small)">
										<input type="date" name="fecha_llegada"  value="2020-07-22">
									</div>
									<div class="6u(small)">
										<ul class="actions">
											<li><input value="Buscar" id="enviar" name="enviar" class="special big" type="submit"></li>
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
							<h3>Recomendaciones</h3>
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
		<section id="two" class="wrapper style2 special">
				<div class="container">
					<form action="guardarvaloracion.php" method="POST">								
						<header class="major">
							<h2>Recomendaciones</h2>
						</header>
						
							<section class="profiles">
								<div class="row">
									<section class="4u 6u(medium) 12u$(xsmall)">
									<div class="row uniform">
									<div class="12u$(3)">
									<h3>AZUAY</h3>
										<input type="hidden" name="id_ciudad0" value="1">
										<input type="radio" id="priority-rk0" name="ranking0" >
										<label for="priority-rk0">1</label>
									
										<input type="radio" id="priority-rk1" name="ranking0">
										<label for="priority-rk1">2</label>
								
										<input type="radio" id="priority-rk3" name="ranking0">
										<label for="priority-rk3">3</label>
									
										<input type="radio" id="priority-rk4" name="ranking0">
										<label for="priority-rk4">4</label>
			
										<input type="radio" id="priority-rk5" name="ranking0">
										<label for="priority-rk5">5</label>
									</div>
								</div>
								<div class="row uniform">
									<div class="12u$(3)">
									<h3>COTOPAXI</h3>
										<input type="hidden" name="id_ciudad1" value="2">
										<input type="radio" id="priority-rk01" name="ranking1" >
										<label for="priority-rk01">1</label>
									
										<input type="radio" id="priority-rk11" name="ranking1">
										<label for="priority-rk11">2</label>
								
										<input type="radio" id="priority-rk31" name="ranking1">
										<label for="priority-rk31">3</label>
									
										<input type="radio" id="priority-rk41" name="ranking1">
										<label for="priority-rk41">4</label>
			
										<input type="radio" id="priority-rk51" name="ranking1">
										<label for="priority-rk51">5</label>
									</div>
								</div>
								<div class="row uniform">
									<div class="12u$(3)">
									<h3>EL ORO</h3>
										<input type="hidden" name="id_ciudad2" value="3">
										<input type="radio" id="priority-rk02" name="ranking2" >
										<label for="priority-rk02">1</label>
									
										<input type="radio" id="priority-rk12" name="ranking2">
										<label for="priority-rk12">2</label>
								
										<input type="radio" id="priority-rk32" name="ranking2">
										<label for="priority-rk32">3</label>
									
										<input type="radio" id="priority-rk42" name="ranking2">
										<label for="priority-rk42">4</label>
			
										<input type="radio" id="priority-rk52" name="ranking2">
										<label for="priority-rk52">5</label>
									</div>
								</div>
								<div class="row uniform">
									<div class="12u$(3)">
									<h3>ESMERALDAS</h3>
										<input type="hidden" name="id_ciudad3" value="4">
										<input type="radio" id="priority-rk03" name="ranking3" >
										<label for="priority-rk03">1</label>
									
										<input type="radio" id="priority-rk13" name="ranking3">
										<label for="priority-rk13">2</label>
								
										<input type="radio" id="priority-rk33" name="ranking3">
										<label for="priority-rk33">3</label>
									
										<input type="radio" id="priority-rk43" name="ranking3">
										<label for="priority-rk43">4</label>
			
										<input type="radio" id="priority-rk53" name="ranking3">
										<label for="priority-rk53">5</label>
									</div>
								</div>
								<div class="row uniform">
									<div class="12u$(3)">
									<h3>GALÁPAGOS</h3>
										<input type="hidden" name="id_ciudad4" value="5">
										<input type="radio" id="priority-rk04" name="ranking4" >
										<label for="priority-rk04">1</label>
									
										<input type="radio" id="priority-rk14" name="ranking4">
										<label for="priority-rk14">2</label>
								
										<input type="radio" id="priority-rk34" name="ranking4">
										<label for="priority-rk34">3</label>
									
										<input type="radio" id="priority-rk44" name="ranking4">
										<label for="priority-rk44">4</label>
			
										<input type="radio" id="priority-rk54" name="ranking4">
										<label for="priority-rk54">5</label>
									</div>
								</div>
									</section>
									<section class="4u 6u$(medium) 12u$(xsmall)">
									<div class="row uniform">
									<div class="12u$(3)">
									<h3>GUAYAS</h3>
										<input type="hidden" name="id_ciudad5" value="6">
										<input type="radio" id="priority-rk05" name="ranking5" >
										<label for="priority-rk05">1</label>
									
										<input type="radio" id="priority-rk15" name="ranking5">
										<label for="priority-rk15">2</label>
								
										<input type="radio" id="priority-rk35" name="ranking5">
										<label for="priority-rk35">3</label>
									
										<input type="radio" id="priority-rk45" name="ranking5">
										<label for="priority-rk45">4</label>
			
										<input type="radio" id="priority-rk55" name="ranking5">
										<label for="priority-rk55">5</label>
									</div>
								</div>
								<div class="row uniform">
									<div class="12u$(3)">
									<h3>LOJA</h3>
										<input type="hidden" name="id_ciudad6" value="7">
										<input type="radio" id="priority-rk06" name="ranking6" >
										<label for="priority-rk06">1</label>
									
										<input type="radio" id="priority-rk16" name="ranking6">
										<label for="priority-rk16">2</label>
								
										<input type="radio" id="priority-rk36" name="ranking6">
										<label for="priority-rk36">3</label>
									
										<input type="radio" id="priority-rk46" name="ranking6">
										<label for="priority-rk46">4</label>
			
										<input type="radio" id="priority-rk56" name="ranking6">
										<label for="priority-rk56">5</label>
									</div>
								</div>
								<div class="row uniform">
									<div class="12u$(3)">
									<h3>MACAS</h3>
										<input type="hidden" name="id_ciudad7" value="8">
										<input type="radio" id="priority-rk07" name="ranking7" >
										<label for="priority-rk07">1</label>
									
										<input type="radio" id="priority-rk17" name="ranking7">
										<label for="priority-rk17">2</label>
								
										<input type="radio" id="priority-rk37" name="ranking7">
										<label for="priority-rk37">3</label>
									
										<input type="radio" id="priority-rk47" name="ranking7">
										<label for="priority-rk47">4</label>
			
										<input type="radio" id="priority-rk57" name="ranking7">
										<label for="priority-rk57">5</label>
									</div>
								</div>
								<div class="row uniform">
									<div class="12u$(3)">
									<h3>MANABÍ</h3>
										<input type="hidden" name="id_ciudad8" value="9">
										<input type="radio" id="priority-rk08" name="ranking8" >
										<label for="priority-rk08">1</label>
									
										<input type="radio" id="priority-rk18" name="ranking8">
										<label for="priority-rk18">2</label>
								
										<input type="radio" id="priority-rk38" name="ranking8">
										<label for="priority-rk38">3</label>
									
										<input type="radio" id="priority-rk48" name="ranking8">
										<label for="priority-rk48">4</label>
			
										<input type="radio" id="priority-rk58" name="ranking8">
										<label for="priority-rk58">5</label>
									</div>
								</div>
								<div class="row uniform">
									<div class="12u$(3)">
									<h3>MORONA SANTIAGO</h3>
										<input type="hidden" name="id_ciudad9" value="10">
										<input type="radio" id="priority-rk09" name="ranking9" >
										<label for="priority-rk09">1</label>
									
										<input type="radio" id="priority-rk19" name="ranking9">
										<label for="priority-rk19">2</label>
								
										<input type="radio" id="priority-rk39" name="ranking9">
										<label for="priority-rk39">3</label>
									
										<input type="radio" id="priority-rk49" name="ranking9">
										<label for="priority-rk49">4</label>
			
										<input type="radio" id="priority-rk59" name="ranking9">
										<label for="priority-rk59">5</label>
									</div>
								</div>
								<div class="row uniform">
									<div class="12u$(3)">
									<h3>ORELLANA</h3>
										<input type="hidden" name="id_ciudad10" value="11">
										<input type="radio" id="priority-rk010" name="ranking10" >
										<label for="priority-rk010">1</label>
									
										<input type="radio" id="priority-rk110" name="ranking10">
										<label for="priority-rk110">2</label>
								
										<input type="radio" id="priority-rk310" name="ranking10">
										<label for="priority-rk310">3</label>
									
										<input type="radio" id="priority-rk410" name="ranking10">
										<label for="priority-rk410">4</label>
			
										<input type="radio" id="priority-rk510" name="ranking10">
										<label for="priority-rk510">5</label>
									</div>
								</div>
									</section>
									<section class="4u 6u(medium) 12u$(xsmall)">
								<div class="row uniform">
									<div class="12u$(3)">
									<h3>PASTAZA</h3>
										<input type="hidden" name="id_ciudad11" value="12">
										<input type="radio" id="priority-rk011" name="ranking11" >
										<label for="priority-rk011">1</label>
									
										<input type="radio" id="priority-rk111" name="ranking11">
										<label for="priority-rk111">2</label>
								
										<input type="radio" id="priority-rk311" name="ranking11">
										<label for="priority-rk311">3</label>
									
										<input type="radio" id="priority-rk411" name="ranking11">
										<label for="priority-rk411">4</label>
			
										<input type="radio" id="priority-rk511" name="ranking11">
										<label for="priority-rk511">5</label>
									</div>
								</div>
								<div class="row uniform">
									<div class="12u$(3)">
									<h3>PICHINCHA</h3>
										<input type="hidden" name="id_ciudad12" value="13">
										<input type="radio" id="priority-rk012" name="ranking12" >
										<label for="priority-rk012">1</label>
									
										<input type="radio" id="priority-rk112" name="ranking12">
										<label for="priority-rk112">2</label>
								
										<input type="radio" id="priority-rk312" name="ranking12">
										<label for="priority-rk312">3</label>
									
										<input type="radio" id="priority-rk412" name="ranking12">
										<label for="priority-rk412">4</label>
			
										<input type="radio" id="priority-rk512" name="ranking12">
										<label for="priority-rk512">5</label>
									</div>
								</div>
								<div class="row uniform">
									<div class="12u$(3)">
									<h3>SANTA ELENA</h3>
										<input type="hidden" name="id_ciudad13" value="14">
										<input type="radio" id="priority-rk013" name="ranking13" >
										<label for="priority-rk013">1</label>
									
										<input type="radio" id="priority-rk113" name="ranking13">
										<label for="priority-rk113">2</label>
								
										<input type="radio" id="priority-rk313" name="ranking13">
										<label for="priority-rk313">3</label>
									
										<input type="radio" id="priority-rk413" name="ranking13">
										<label for="priority-rk413">4</label>
			
										<input type="radio" id="priority-rk513" name="ranking13">
										<label for="priority-rk513">5</label>
									</div>
								</div>
								<div class="row uniform">
									<div class="12u$(3)">
									<h3>SUCUMBIOS</h3>
										<input type="hidden" name="id_ciudad15" value="15">
										<input type="radio" id="priority-rk015" name="ranking15" >
										<label for="priority-rk015">1</label>
									
										<input type="radio" id="priority-rk115" name="ranking15">
										<label for="priority-rk115">2</label>
								
										<input type="radio" id="priority-rk315" name="ranking15">
										<label for="priority-rk315">3</label>
									
										<input type="radio" id="priority-rk415" name="ranking15">
										<label for="priority-rk415">4</label>
			
										<input type="radio" id="priority-rk515" name="ranking15">
										<label for="priority-rk515">5</label>
									</div>
								</div>
								<div class="row uniform">
									<div class="12u$(3)">
									<h3>ZAMORA CHINCHIPE</h3>
										<input type="hidden" name="id_ciudad16" value="16">
										<input type="radio" id="priority-rk016" name="ranking16" >
										<label for="priority-rk016">1</label>
									
										<input type="radio" id="priority-rk116" name="ranking16">
										<label for="priority-rk116">2</label>
								
										<input type="radio" id="priority-rk316" name="ranking16">
										<label for="priority-rk316">3</label>
									
										<input type="radio" id="priority-rk416" name="ranking16">
										<label for="priority-rk416">4</label>
			
										<input type="radio" id="priority-rk516" name="ranking16">
										<label for="priority-rk516">5</label>
									</div>
								</div>
									</section>
							</div>
						</section>
						<footer>
							<ul class="actions">
								<li>
									<input type="submit" class="special big" value="Guardar">
								</li>
							</ul>
						</footer>
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
	
	<script src="js/check.js"></script>
	</body>
</html>