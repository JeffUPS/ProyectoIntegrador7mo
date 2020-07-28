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
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Politicas y Condiciones</h2>
						<p>Viaja a tus lugares favoritos.</p>
					</header>

                    <p>Siempre le recordamos a nuestros clientes la importancia de confirmar con antelación todos los datos de su boleto aéreo antes de pagarlo. Las cancelaciones, cambio de nombre y otras simples alteraciones de datos pueden ser un dolor de cabeza, debido al rigor con que las compañías aéreas manejan sus vuelos y pasajeros lo cual puede representar una considerable pérdida de dinero, en muchas ocasiones, por falta de atención.</p>

                    <p>Por lo anterior, vamos a recordar juntos todo lo que debes saber al <b>comprar un boleto aéreo</b> y garantizar así la tranquilidad de tu viaje. Conoce a continuación las preguntas más frecuentes que recibimos en relación con las alteraciones y cancelaciones de pasajes.</p>
                    
                    <p><b>Me equivoqué al digitar el nombre del pasajero durante la compra del boleto, ¿puedo hacer la alteración pertinente?</b></p>
                    
                    <p>¿Ocurrió un error durante la digitación del nombre o apellido del pasajero? Entra en contacto con nuestra área de Atendimento y solicita la corrección correspondiente. No siempre es permitido realizar alteraciones al nombre del pasajero, pero, si lo consigues, podrías ahorrar el valor que cobra la compañía aérea por hacerlo. Por otro lado, no es posible cambiar un nombre o apellido por otro, esto por razones de seguridad.</p>

                    <p><b>Quiero alterar algunos datos importantes de mi boleto como el destino de vuelo y el horario, ¿es posible?</b></p>

                    <p>Sí, es posible realizar una alteración en el trayecto y horario del vuelo hasta 3 horas antes del mismo. Sin embargo, debes saber que toda alteración al boleto ya reservado, sea para uno o más trayectos, generará un costo adicional. Ese cobro de alteración es un porcentaje que varía de acuerdo con el valor total del pasaje. Además, cualquier alteración en tu boleto aéreo estará sujeto a las tarifas de la aerolínea correspondiente y a la disponibilidad de boletos para el día que deseas. Por eso, para evitar los sobrecostos, es mejor cancelar el pasaje lo más rápido posible y rehacer el pedido directamente.</p>

                    <p><b>Quiero alterar el nombre del pasajero, ¿es posible?</b></p>

                    <p>No, por razones de seguridad no está permitido alterar parcial o completamente el nombre de un pasajero. En caso de haberte equivocado con el nombre, cancela la reserva del boleto lo antes posible.</p>

                    <p><b>Quiero cancelar mi boleto, ¿cómo debo proceder?</b></p>

                    <p>Puedes solicitar la cancelación de tu boleto aéreo en cualquier momento hasta 3 horas antes del vuelo. Para ello, cada aerolínea cuenta con sus propias reglas, por lo que muchas veces esta cancelación se refleja en grandes sobrecostos para el pasajero. Además, el servicio de intermediación que ofrecemos para estos cancelamientos también es cobrado. La tarifa varía en relación con el valor del boleto, igual que el precio de cualquier alteración solicitada, a menos que la compañía aérea reembolse completamente el valor del pasaje.</p>

                    <p><b>Compré un boleto en promoción, ¿puedo cancelarlo y pedir reembolso?</b></p>
                    
                    <p>Si compraste un pasaje en promoción, lo más probable es que no puedas recibir reembolso por su cancelación, perdiendo así el dinero invertido inicialmente. En caso de realizar alguna alteración, si el valor del nuevo pasaje es menor al original, las aerolíneas no devolverán la diferencia al pasajero, y en caso de canelar sólo uno de los dos trayectos (en boletos comprados para ida y vuelta), es necesario verificar las condiciones de cancelación, pues la aerolínea podría cancelar ambos trayectos automáticamente.</p>

                    <h3>CONSEJOS PARA LA COMPRA DE TU BOLETO AÉREO:</h3>
                    
                    <p>Para evitar la necesidad de alteraciones o cancelaciones, utiliza la siguiente lista antes de confirmar la reserva.</p>
                    <ul>
                        <li>1.	¿El país, ciudad y aeropuertos de cada trayecto están correctos?</li>           
                        <li>2.	¿El aeropuerto en el que voy a hacer conexión cumple con las necesidades de mi horario?</li>
                        <li>3.	¿La ciudad a la que viajo tiene más de un aeropuerto? ¿El aterrizaje es en el aeropuerto correcto?</li>
                        <li>4.	Si mi viaje tiene conexión entre varios vuelos, ¿es suficiente el tiempo para cada una de ellas?</li>
                        <li>5.	¿El nombre y apellido de todos los pasajeros está completo y correctamente escrito?</li>
                        <li>6.	¿Los datos de mi método de pago son correctos?</li>
                        <li>7.	¿Tengo todos los documentos necesarios para salir de mi país y entrar al país de destino?</li>
                    </ul>
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