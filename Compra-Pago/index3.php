<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label>Proceso de Pago</label>
</br>
<form action="index4.php" method="POST">
    <label>Nombre del Titular</label>
    <input type="text" name="titular" placeholder="Ingresar el nombre del titular" required>
</br>
    <label>Numero de Tarjeta</label>
    <input type="text" name="numero" placeholder="0000 0000 0000 0000" required>
</br>
    <label>Fecha de Vencimiento</label>
    <input type="text" name="vencimiento" placeholder="MM/AA" required>
</br>
    <label>CVC</label>
    <input type="text" name="cvc" placeholder="XXX" required>
</br>
    <input type="submit" value="Pagar">
</form>

<a href="index.php">Pasajero</a>

</body>
</html>