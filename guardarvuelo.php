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
  $numero_vuelo = $_REQUEST['numero_vuelo'];
  $foto=$_FILES["foto"]["name"];
  $ruta=$_FILES["foto"]["tmp_name"];
  $destino="fotos/".$foto;
  copy($ruta,$destino);
  
$sql = "INSERT INTO bd_vuelo (ciudad_destino, ciudad_origen, asientos, fecha_salida, fecha_llegada, hora_salida, numero_vuelo, hora_llegada, aereolinea, foto) 
VALUES ('$ciudad_destino','$ciudad_origen','$asientos','$fecha_salida','$fecha_llegada','$hora_salida','$numero_vuelo','$hora_llegada','$aereolinea','$destino')";

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
                echo "OK";
             <?php } else { ?>
               echo "no";
             <?php } ?>
            
             


        </body>
</html>
