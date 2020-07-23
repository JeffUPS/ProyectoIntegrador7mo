<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
  $conexion = mysqli_connect("localhost", "root", "", "pasajero") or
    die("Problemas con la conexión");

  mysqli_query($conexion, "insert into pasajero(nombre_pasajero,num_pasaporte,fecha_nacimiento) values 
                       ('$_REQUEST[nombre]','$_REQUEST[pasaporte]','$_REQUEST[nacimiento]')")
    or die("Problemas en el select" . mysqli_error($conexion));

  mysqli_close($conexion);

  echo "Datos del Pasajero Registrado.";
  ?>
</body>
</html>