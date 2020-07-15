<?php

  require 'database.php';

  $ciudad_origen = $_POST['ciudad_origen'];
  $ciudad_destino = $_POST['ciudad_destino'];
  $asientos= $_POST['asientos'];
  $fecha_salida= $_POST['fecha_salida'];
  $fecha_llegada= $_POST['fecha_llegada'];
  $hora_salida= $_POST['hora_salida'];
  $hora_llegada = $_POST['hora_llegada'];
  $aereolinea = $_POST['aereolinea'];
  $numero_vuelo = $_POST['numero_vuelo'];
  
$sql = "INSERT INTO bd_vuelo (ciudad_destino, ciudad_origen, asientos, fecha_salida, fecha_llegada, hora_salida, numero_vuelo, hora_llegada, aereolinea) 
VALUES ('$ciudad_destino','$ciudad_origen','$asientos','$fecha_salida','$fecha_llegada','$hora_salida','$numero_vuelo','$hora_llegada','$aereolinea')";

$resultado = $mysqli->query($sql);

?>


<html lang="en">
     <head> 
     <title>Guardar Vuelo</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <link rel="shortcut icon" href="icon.png">
     <link href="css/bootstrap.grid.min.css" rel="stylesheet">
     <script src="js/jquery-3.5.0.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
     </head>
         <body>
         <div class="container">
         <div class="container">
           <div class="row">
             <div class="row" style="text-align:center">
             <?php if($resultado) { ?>
                echo "<script> alert("Vuelo Modificado"); window.location="admin.php";</script>";
             <?php } else { ?>
               echo "<script> alert("Vuelo no modificado"); window.location="admin.php";</script>";
             <?php } ?>
            
             


        </body>
</html>
