<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location:indexcliente.php");
  exit;
}
 
// Include config file
require_once "database.php";
 
// Define variables and initialize with empty values
$correo = $password = "";
$correo_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if correo is empty
    if(empty(trim($_POST["correo"]))){
        $correo_err = "Por favor ingrese su usuario.";
    } else{
        $correo = trim($_POST["correo"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($correo_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id_user, correo, password FROM users WHERE correo = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_correo);
            
            // Set parameters
            $param_correo = $correo;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if correo exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $correo, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["correo"] = $correo;                            
                            
                            // Redirect user to welcome page
							header("location: indexcliente.php");

							if($correo == 'jeff.0318@gmail.com'){
								header('Location: admin.php');
							}
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "La contraseña que has ingresado no es válida.";
                        }
                    }
                } else{
                    // Display an error message if correo doesn't exist
                    $correo_err = "No existe cuenta registrada con ese nombre de usuario.";
                }
            } else{
                echo "Algo salió mal, por favor vuelve a intentarlo.";
            }
        }
        
        // Close statement
    }
    
    // Close connection
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ticket Express | Inicio Sesion</title>
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
	<body >

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

			<section id="main" class="wrapper" style="text-align:center" >
				<div class="container" >
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
						<header>
							<h2>Inicio de Sesion</h2>
						</header>
						<div class="row uniform 100%">
							<div class="4u$ 12u$(4)">
								<input type="text" name="correo" id="name" value="" placeholder="Ingrese su Correo Electronico" required/>
							</div>
							<div class="4u$ 12u$(4)">
								<input type="password" name="password" id="email" value="" placeholder="Ingrese su Contraseña" required/>
							</div>
							<div class="4u$ 12u$(4)"
							<br>No eres miembre?<a href="registrar.php">Unete Ahora</a></br>
							</div>
							<div class="4u 12u$(4)">
								<ul class="actions">
									<li><input type="submit" value="Iniciar Sesion" class="special" /></li>
								</ul>
							</div>
						</div>
					</form>
				</div>	
			</section>
		

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