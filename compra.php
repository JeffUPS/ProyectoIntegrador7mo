<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del Pasajero</title>
</head>
<body>
  <label>Datos del Pasajero</label>
</br>

<form action="index2.php" method="POST">
  <label >Apellido(s)*</label>
  <input type="text" name="apellido" placeholder="Ingresar su Apellido(s)*" required/>
</br>
  <label>Nombre(s)*</label>
  <input type="text" name="nombre" placeholder="Ingresar su Nombre(s)*" required/>
</br>
  <label>Fecha de nacimiento</label>
  <input name="dia">
</br>
  <label>Correo Electronico</label>
  <input type="email" name="correo" placeholder="Ingrese su correo electronico" required/>
</br>
  <label>Numero de Telefono</label>
  <input type="text" name="telefono" placeholder="Ingresar su numero de telefono" required minlength="10" maxlength="10"/>
</br>
<input type="submit" name="">
</form>
<a href="index3.php">Pago</a>
</body>
</html>