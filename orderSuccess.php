<?php
if(!isset($_REQUEST['id'])){
	header("Location: vueloscliente.php");
}

?>
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
		 $correo= $_POST['correo'];
		 $ciudad_origen= $_POST['ciudad_origen'];
		 $ciudad_destino= $_POST['ciudad_destino'];
		 $fecha_salida= $_POST['fecha_salida'];
		 $fecha_llegada= $_POST['fecha_llegada'];
		 $hora_salida= $_POST['hora_salida'];
		 $hora_llegada= $_POST['hora_llegada'];
		 $aereolinea= $_POST['aereolinea'];
		 $num_vuelo= $_POST['num_vuelo'];


   
		 if(!empty($nombre) && !empty($correo) && !empty($ciudad_origen) && !empty($ciudad_destino) && !empty($fecha_salida) && !empty($fecha_llegada) && !empty($hora_salida) && !empty($hora_llegada) && !empty($aereolinea) && !empty($num_vuelo) ){
			$where= "WHERE nombre ='$nombre' AND correo='$correo' AND ciudad_origen='$ciudad_origen' AND ciudad_destino='$ciudad_destino' AND fecha_salida='$fecha_salida' AND fecha_llegada='$fecha_llegada' AND hora_salida='$hora_salida' AND hora_llegada='$hora_llegada' AND aereolinea='$aereolinea' AND num_vuelo='$num_vuelo'";
	
		 }
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
		<script src="js/print.js"></script>
        <script>
    function updateCartItem(obj,id){
        $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
            if(data == 'ok'){
                location.reload();
            }else{
                alert('Cart update failed, please try again.');
            }
        });
    }
    </script>
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
			<div id="imp1">
		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h1>Ticket Express</h1>
						<h2>Boleto</h2>
						<p>Viaja a tus lugares favoritos.</p>
					</header>
                    <p>Su compra se ha realizado correctamente.. ID de su compra es #<?php echo $_GET['id']; ?></p>
					<?php
        					$query = $mysqli->query("Select DISTINCT nombre,correo,ciudad_origen,ciudad_destino,fecha_salida,fecha_llegada,hora_salida,hora_llegada,num_vuelo,aereolinea from vuelo,compras,clientes,boleto where clientes.id=compras.customer_id and compras.id=boleto.order_id and boleto.product_id=vuelo.id");
        					if($query->num_rows > 0){ 
            				$row = $query->fetch_assoc()
        					?>
							<h2>Datos clientes</h2>
							NOMBRE DEL clientes:
							<?php echo $row['nombre']; ?>
							</br></br>
							NUMERO DE PASAPORTE:
							<?php echo $row['correo']; ?>
							</br>
							-------------------------------------------------------------------------------------------------------------------------------
							<h2>Datos Vuelo</h2>
							</br>
							NUMERO DE BOLETO:
							<?php echo rand() . "\n"; echo rand(1, 15);?>
							</br>
							</br>
							VUELO:&nbsp; 
							<?php echo $row['num_vuelo']; ?> &nbsp; &nbsp; <b><?php echo $row['aereolinea']; ?></b>
							</br></br>
							SALIDA:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
							<?php echo $row['ciudad_origen']; ?>&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <?php echo $row['fecha_salida']; ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <?php echo $row['hora_salida']; ?>
							</br></br>
							LLEGADA:&nbsp; 
							<?php echo $row['ciudad_destino']; ?>&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <?php echo $row['fecha_llegada']; ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <?php echo $row['hora_llegada']; ?>
							
							
							</br>
							<?php }?>
					</div>
					</div>
					<header class="major">
					<a type="button" onclick="javascript:imprim1(imp1);" class="button">Imprimir Boleto</a>
					</header>
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
