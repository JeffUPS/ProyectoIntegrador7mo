<?php

require_once 'database.php';

  $ciudad_origen = $_REQUEST['ciudad_origen'];
  $ciudad_destino = $_REQUEST['ciudad_destino'];
  $asientos= $_REQUEST['asientos'];
  $fecha_salida= $_REQUEST['fecha_salida'];
  $fecha_llegada= $_REQUEST['fecha_llegada'];
  $hora_salida= $_REQUEST['hora_salida'];
  $hora_llegada = $_REQUEST['hora_llegada'];
  $aereolinea = $_REQUEST['aereolinea'];
  $num_vuelo = $_REQUEST['num_vuelo'];
  $valor_pasaje = $_REQUEST['valor_pasaje'];
  $foto_aereo=$_FILES["foto_aereo"]["name"];
  $ruta=$_FILES["foto_aereo"]["tmp_name"];
  $destino="fotos/".$foto_aereo;
  copy($ruta,$destino);
  
$sql = "INSERT INTO vuelo (ciudad_destino, ciudad_origen, asientos, fecha_salida, fecha_llegada, hora_salida, num_vuelo, hora_llegada, aereolinea, foto_aereo, valor_pasaje) 
VALUES ('$ciudad_destino','$ciudad_origen','$asientos','$fecha_salida','$fecha_llegada','$hora_salida','$num_vuelo','$hora_llegada','$aereolinea','$destino','$valor_pasaje')";

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
     <link href="style.css" rel="stylesheet" type="text/css" />

     </head>
     <body>
         <div class="container">
         <div class="container">
           <div class="row">
             <div class="row" style="text-align:center">
             <?php if($resultado) { ?>
                echo "<script> alert("VUELO REGISTRADO"); window.location="admin.php";</script>";
             <?php } else { ?>
               echo "<script> alert("VUELO NO REGISTRADO"); window.location="registrovuelo.php";</script>";
             <?php } ?>
        </body>
</html>
