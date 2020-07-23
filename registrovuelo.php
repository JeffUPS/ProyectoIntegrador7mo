<?php
  session_start();
  require 'database.php';

  $sql="SELECT * FROM ciudades";
  $resultado = $mysqli->query($sql); 
   
  $aer="SELECT * FROM aereolinea";
  $res= $mysqli->query($aer);

  $avi= "SELECT * FROM avion";
  $av=$mysqli->query($avi);

?>

<html lang="en">

<head>
  <title>Registro Vuelos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap.grid.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="icon.png">
  <script src="js/jquery-3.5.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body background="fondo.jpg" >
<div class="header">
  <div class="info"></br>
      <h1>REGISTRO VUELO</h1>
    <div class="meta">
       <center>VIAJA A TUS LUGARES FAVORITOS</center>
    </div>
  </div>
</div>
 <div class="container">
          <form action="guardarvuelo.php" method="POST" enctype="multipart/form-data">
          <center>
          </br><b>Ciudad Origen:</b>
          <select name= "ciudad_origen">
             <option value="Seleccione">---SELECCIONE---</option>
             <?php foreach ($resultado as $opc): ?>
              <option value="<?php echo $opc['ciudad_origen']?>"><?php echo $opc['ciudad_origen'] ?>
              </option> 
             <?php endforeach ?>
          </select><br><br>
          Ciudad Destino:
          <select name= "ciudad_destino">
             <option value="Seleccione">---SELECCIONE---</option> 
             <?php foreach ($resultado as $opc): ?>
              <option value="<?php echo $opc['ciudad_destino']?>"><?php echo $opc['ciudad_destino'] ?>
              </option> 
             <?php endforeach ?>
          </select><br><br>
          Aereolinea:
          <select name= "aereolinea">
             <option value="Seleccione">---SELECCIONE---</option>
             <?php foreach ($res as $opc): ?>
              <option value="<?php echo $opc['aereolinea']?>"><?php echo $opc['aereolinea'] ?>
              </option> 
             <?php endforeach ?>
          </select><br><br>
          <input type="file" name="foto" id="foto"><br><br>
          Numero de vuelo:
          <input type="text" name="numero_vuelo" required=""><br><br>
          Hora de salida:
          <input type="time" name="hora_salida" min="1:00" max="24:00" step="600"><br><br>
          Hora de llegada:
          <input type="time" name="hora_llegada" min="1:00" max="24:00" step="600"><br><br>
          Fecha de salida:
          <input type="date" name="fecha_salida" value="2020-07-22" min="2020-05-01" max="2021-12-31"><br><br>
          Fecha de llegada:
          <input type="date" name="fecha_llegada" value="2020-07-22" min="2020-05-01" max="2021-12-31"><br><br>
          Asientos:
         <input type="number" name="asientos">
    
          <input type="submit" class="btn btn-primary" value="Guardar">
          </center>
        </form>
  </div>
</body>

</html>
