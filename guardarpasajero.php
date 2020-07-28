<?php

  require 'database.php';

  $nombre_pasajero = $_POST['nombre_pasajero'];
  $num_pasaporte= $_POST['num_pasaporte'];
  $fecha_nacimiento= $_POST['fecha_nacimiento'];
  
  
$sql = "INSERT INTO pasajero (nombre_pasajero, num_pasaporte, fecha_nacimiento) 
VALUES ('$nombre_pasajero','$num_pasaporte','$fecha_nacimiento')";

$resultado = $mysqli->query($sql);

?>
<html lang="en">
     <head> 
     <title>Guardar Vuelo</title>
     
     </head>
         <body>
         <div class="container">
         <div class="container">
           <div class="row">
             <div class="row" style="text-align:center">
             <?php if($resultado) { ?>
                <script> alert("Completa"); window.location="checkout.php";</script>
             <?php } else { ?>
               <script> alert("Incompleto"); window.location="viewCart.php";</script>
             <?php } ?>
            
             


        </body>
</html>
