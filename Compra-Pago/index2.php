<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
  $conexion = mysqli_connect("localhost", "root", "", "Proyecto") or
    die("Problemas con la conexión");

  mysqli_query($conexion, "insert into pasajeros(apellido,nombre,fecha_nacimiento,correo,telefono) values 
                       ('$_REQUEST[apellido]','$_REQUEST[nombre]','$_REQUEST[dia]','$_REQUEST[correo]','$_REQUEST[telefono]')")
    or die("Problemas en el select" . mysqli_error($conexion));

  mysqli_close($conexion);

  echo "Pasajero Registrado.";
  ?>

  <a href="index3.php">Pago</a>


</body>
</html>