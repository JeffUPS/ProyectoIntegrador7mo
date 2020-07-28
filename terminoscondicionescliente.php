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
						<h2>Términos y Condiciones</h2>
						<p>Viaja a tus lugares favoritos.</p>
					</header>
					<p>Ticket Express es una agencia de viajes en línea, cuya plataforma tecnológica permite a una gran cantidad de prestadores de servicios turísticos (el/los “Proveedor/es”) ofrecer y comercializar sus servicios hacia los usuarios, quienes a su vez pueden procurar averiguaciones sobre vuelos, alojamientos, autos, cruceros, actividades y demás servicios turísticos (el/los “Servicio/s Turístico/s”), comparar y reservar dichas prestaciones en tiempo real, y adquirirlas por separado o combinadas, armando y gestionando su propio viaje, de conformidad con sus necesidades personales.</p>
					
					<p>Ticket Express no es el proveedor de los Servicios Turísticos y actúa en nombre y por cuenta de los Proveedores, por lo que no está obligado -directa ni indirectamente- a la ejecución del Servicio Turístico. Cuando Usted contrata Servicios Turísticos a través de Ticket Express, está celebrando un contrato directamente con el Proveedor que ofrece sus Servicios Turísticos a través de nuestra Plataforma. Ticket Express actúa como intermediario entre Usted y los Proveedores de Servicios Turísticos, y actúa en nombre y representación del Proveedor.</p>

					<p>Al contratar Servicios Turísticos a través de Ticket Express, Usted garantiza y declara bajo formal protesta de decir verdad que: (i) es mayor de edad; (ii) acepta  expresamente los presentes Términos y Condiciones, los cuales ha comprendido en su totalidad y manifiesta su consentimiento expreso para usar medios electrónicos; (iii) posee plena capacidad para celebrar contratos; (iv) sólo utiliza la Plataforma de Ticket Express para reservar o contratar Servicios Turísticos para Usted y/o para otra persona para quien Usted tenga autorización de actuar; (v) en caso de adquirir servicios con destino/escala Cuba, no es ciudadano ni residente Norteamericano, ni se encuentra sujeto a la jurisdicción de Estados Unidos; y (vi) toda la información que Usted brinda a Ticket Express es verídica, exacta, actual y completa.</p>
					
                    <p>Estas condiciones son las de carácter general que se aplican a los servicios de intermediación que le presta Ticket Express y bajo ningún aspecto reemplazan o modifican las limitaciones de responsabilidad legalmente establecidas conforme a su país de residencia, ni a las condiciones especiales que cada Proveedor Turístico ha definido para sus Servicios Turísticos. Antes de contratar, revise directamente las condiciones particulares de cada Servicio Turístico y de cada Proveedor. Ticket Express no se hace responsable ni tiene injerencia en las condiciones particulares establecidas por cada Proveedor para la prestación de sus Servicios Turísticos.</p>

                    <p>Usted entiende y acepta expresamente que la actividad de intermediación de Ticket Express en la comercialización de Servicios Turísticos no garantiza que el destino elegido no presente riesgos para la salud e integridad de las personas. Ticket Express no es responsable ni directa ni indirectamente por los daños o pérdidas que de cualquier modo Usted o quienes viajen junto a Usted puedan sufrir antes, durante o como consecuencia del destino elegido. Ticket Express no se responsabiliza por los hechos derivados de caso fortuito o fuerza mayor, incluyendo fenómenos climáticos, hechos de la naturaleza, conflictos gremiales, entre otros, que pudieran acontecer antes o durante la prestación del Servicio Turístico, y que pudieran eventualmente demorar, interrumpir o impedir la ejecución del mismo.</p>

                    <p>Antes de confirmar su solicitud de compra y previa aceptación expresa de estas Condiciones Generales (la “Solicitud de Compra”), le aconsejamos que revise directamente los términos y condiciones particulares aplicables al Servicio Turístico que desea contratar. Así evitará sorpresas y podrá disfrutar de su viaje como lo planeó. Los términos y condiciones de cada Servicio Turístico son establecidas por cada Proveedor sin injerencia de Ticket Express. Se aclara especialmente que Ticket Express no tiene injerencia alguna en el cobro de penalidades por parte de los Proveedores o diferencias de tarifa en el caso de ser aplicables, que dependerán de los términos y condiciones de cada Proveedor.</p>
                
                    <p>El solo uso de la Plataforma implica la aceptación de todas y cada una de las condiciones generales y particulares incluidas en estos términos y condiciones, que se consideran un contrato de adhesión, aún cuando el presente documento no contenga todas las cláusulas ordinarias de un contrato. Su lectura y comprensión le permitirá ejercer en mejor forma sus derechos como consumidor. Le sugerimos imprimirlas y conservarlas, junto con el resto de la documentación de viaje. Recuerde tomar nota del número de Solicitud de Compra que aparecerá en la pantalla al confirmar su solicitud y/o en el mail de confirmación de compra. Ese número identifica su transacción y será indispensable para realizar cualquier aclaración y/ o gestión a través de Ticket Express</p>
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