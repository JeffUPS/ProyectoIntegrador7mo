<?php

  require 'database.php';
 
  $id_vuelo = $_POST['id_vuelo'];
  $ciudad_origen = $_POST['ciudad_origen'];
  $ciudad_destino = $_POST['ciudad_destino'];
  $asientos= $_POST['asientos'];
  $fecha_salida= $_POST['fecha_salida'];
  $fecha_llegada= $_POST['fecha_llegada'];
  $hora_salida= $_POST['hora_salida'];
  $hora_llegada = $_POST['hora_llegada'];
  $aereolinea = $_POST['aereolinea'];
  $num_vuelo = $_POST['num_vuelo'];
  $valor_pasaje = $_POST['valor_pasaje'];
  $foto_aereo=$_FILES["foto_aereo"]["name"];
  $ruta=$_FILES["foto_aereo"]["tmp_name"];
  $destino="fotos/".$foto_aereo;
  copy($ruta,$destino);
  
 $sql="UPDATE vuelo SET ciudad_origen='$ciudad_origen', ciudad_destino='$ciudad_destino', asientos='$asientos', fecha_salida='$fecha_salida', fecha_llegada='$fecha_llegada', hora_salida='$hora_salida', hora_llegada='$hora_llegada',
 aereolinea='$aereolinea', num_vuelo='$num_vuelo', valor_pasaje='$valor_pasaje', foto_aereo='$destino' WHERE id_vuelo='$id_vuelo'";

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
                echo"<script> alert("VUELO ACTUALIZADO"); window.location="admin.php";</script>";
             <?php } else { ?>
               echo"<script> alert("VUELO NO ACTUALIZADO"); window.location="actualizarvuelo.php";</script>";
             <?php } ?>

        </body>
</html>
