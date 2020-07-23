<?php
// Include config file
require_once "database.php";
 
// Define variables and initialize with empty values
$correo = $password = $confirm_password = "";
$correo_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
	
	// Validate correo
    if(empty(trim($_POST["correo"]))){
        $correo_err = "Por favor ingrese un usuario.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id_user FROM users WHERE correo = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_correo);
            
            // Set parameters
            $param_correo = trim($_POST["correo"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 2){
                    $correo_err = "Este usuario ya fue tomado.";
                } else{
                    $correo = trim($_POST["correo"]);
                }
            } else{
                echo "Al parecer algo salió mal.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingresa una contraseña.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "La contraseña al menos debe tener 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Confirma tu contraseña.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "No coincide la contraseña.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($correo_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (correo, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss",$param_correo, $param_password);
            
			// Set parameters
            $param_correo = $correo;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: iniciosesion.php");
            } else{
                echo "Algo salió mal, por favor inténtalo de nuevo.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Ticket Express | Registro</title>
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
						<li><a href="generic.php">Información</a></li>
						<li><a href="elements.php">Ayuda</a></li>
						<li><a href="iniciosesion.php" class="button special">Inicio Sesión</a></li>
					</ul>
				</nav>
			</header>

			<section id="main" class="wrapper">
				<div class="container">
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
						<header>
							<h2>Registro Clientes</h2>
						</header>
						<div class="row uniform 100%">
							
                            <div class="4u$ 12u$(4) <?php echo (!empty($correo_err)) ? 'has-error' : ''; ?>">
								<input type="email" name="correo" value="<?php echo $correo; ?>" placeholder="Ingresar su Correo" required/>
							</div>
							<div class="4u$ 12u$(4) <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
								<input type="password" name="password" value="<?php echo $password; ?>" placeholder="Ingrese su Contraseña" required />
                            </div>
                            <div class="4u$ 12u$(4) <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
								<input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>" placeholder="Confirmar Contraseña" required/>
							</div>
							<div class="12u$">
								<ul class="actions">
									<li><input type="submit" value="Registrar" class="special" /></li>
								</ul>
							</div>
						</div>
					</form>
					<?php if(!empty($message)): ?>
					<p><?= $message ?></p>
					<?php endif; ?>
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