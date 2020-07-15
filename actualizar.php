<?php

  require 'database.php';
 
  $id = $_POST['id'];
  $ciudad_origen = $_POST['ciudad_origen'];
  $ciudad_destino = $_POST['ciudad_destino'];
  $asientos= $_POST['asientos'];
  $fecha_salida= $_POST['fecha_salida'];
  $fecha_llegada= $_POST['fecha_llegada'];
  $hora_salida= $_POST['hora_salida'];
  $hora_llegada = $_POST['hora_llegada'];
  $aereolinea = $_POST['aereolinea'];
  $numero_vuelo = $_POST['numero_vuelo'];
  
 $sql="UPDATE bd_vuelo SET ciudad_origen='$ciudad_origen', ciudad_destino='$ciudad_destino', asientos='$asientos', fecha_salida='$fecha_salida', fecha_llegada='$fecha_llegada', hora_salida='$hora_salida', hora_llegada='$hora_llegada',
 aereolinea='$aereolinea', numero_vuelo='$numero_vuelo' WHERE id='$id'";

 $resultado = $mysqli->query($sql);

?>


<html lang="en">
     <head> 
     <title>Vuelo Modificado</title>
     <link rel="shortcut icon" href="icon.png">
     </head>
         <body>
         <div class="container">
           <div class="row">
             <div class="row" style="text-align:center">
             <?php if($resultado) { ?>
                echo "<script> alert("Itinerario Actualizado"); window.location="admin.php";</script>";
             <?php } else { ?>
               echo "<script> alert("Itinerario no actualizado"); window.location="admin.php";</script>";
             <?php } ?>
             

        </body>
</html>
