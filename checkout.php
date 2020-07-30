<?php
// include database configuration file
include 'database.php';

// initializ shopping cart class
include 'cart.php';
$cart = new Cart;

// redirect to home if cart is empty
if($cart->total_items() <= 0){
    header("Location: vueloscliente.php");
}


// set customer ID in session
$_SESSION['sessCustomerID']=;

// get customer details by session customer ID
$query = $mysqli->query("SELECT * FROM clientes WHERE id = ".$_SESSION['sessCustomerID']);
$custRow = $query->fetch_assoc();
?>
<?php


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

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Detalle Compra</h2>
						<p>Viaja a tus lugares favoritos.</p>
					</header>

                    <table class="table">
    <thead>
        <tr>
        <th>Origen</th>
            <th>Destino</th>
            <th>Salida</th>
            <th>Llegada</th>
            <th>Salida</th>
            <th>Llegada</th>
            <th>Aerolinea</th>
            <th>Vuelo</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["ciudad_origen"]; ?></td>
            <td><?php echo $item["ciudad_destino"]; ?></td>
            <td><?php echo $item["fecha_salida"]; ?></td>
            <td><?php echo $item["fecha_llegada"]; ?></td>
            <td><?php echo $item["hora_salida"]; ?></td>
            <td><?php echo $item["hora_llegada"]; ?></td>
            <td><?php echo $item["aereolinea"]; ?></td>
            <td><?php echo $item["num_vuelo"]; ?></td>
            <td><?php echo '$'.$item["valor_pasaje"].' USD'; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo '$'.$item["subtotal"].' USD'; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No items in your cart......</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="10"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo '$'.$cart->total().' USD'; ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
	</table>
	
	<h2>Datos del Pasajero</h2>
	<form method="post" action="guardarpasajero.php">
		<div class="row uniform">
			<div class="4u 12u$">
				<input type="text" name="nombre_pasajero" placeholder="Ingrese Nombre del Pasajero" required/>
			</div>
			<div class="4u 12u$">
				<input type="text" name="num_pasaporte" placeholder="Ingrese su Numero de Pasaporte" required/>
			</div>
			<div class="4u 12u$">
				<input type="date" name="fecha_nacimiento" required/>
			</div>
			<div class="12u$">
				<ul class="actions">
					<li><button type="submit" class="button fit" name="login_user">Registrar Pasajero</button></li>
				</ul>
			</div>
		</div>
	</form>
    <div >
        <a href="vueloscliente.php" class="button"><i class="glyphicon glyphicon-menu-left"></i>Continuar Comprando</a>
        <a href="cartAction.php?action=placeOrder" class="button">Realizar Compra</a>
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

	</body>
</html>
