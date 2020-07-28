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

  mysqli_query($conexion, "insert into pago(nombre_titular,numero_tarjeta,fecha_vencimiento,cvc) values 
                       ('$_REQUEST[titular]','$_REQUEST[numero]','$_REQUEST[vencimiento]','$_REQUEST[cvc]')")
    or die("Problemas en el select" . mysqli_error($conexion));

  mysqli_close($conexion);

  echo "Pago Procesado.";
  ?>
</body>
</html>