<?php 
	session_start(); 
  require 'database.php';
  
	if (!isset($_SESSION['correo'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: iniciosesion.php');
	}
    
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['correo']);
		header("location: iniciosesion.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		
	</head>
	<body>
    <form action="guardarvaloracion.php" method="POST">


AZUAY<input type="hidden" name="id_ciudad0" value="1">
<fieldset>
  <input type="radio" name="ranking0" value="1">1
  <input type="radio" name="ranking0" value="2">2
  <input type="radio" name="ranking0" value="3">3
  <input type="radio" name="ranking0" value="4">4
  <input type="radio" name="ranking0" value="5">5
</fieldset>

COTOPAXI<input type="hidden" name="id_ciudad1" value="2">
<fieldset>
  <input type="radio" name="ranking1" value="1">1
  <input type="radio" name="ranking1" value="2">2
  <input type="radio" name="ranking1" value="3">3
  <input type="radio" name="ranking1" value="4">4
  <input type="radio" name="ranking1" value="5">5
</fieldset>

EL ORO<input type="hidden" name="id_ciudad2" value="3">
<fieldset>
  <input type="radio" name="ranking2" value="1">1
  <input type="radio" name="ranking2" value="2">2
  <input type="radio" name="ranking2" value="3">3
  <input type="radio" name="ranking2" value="4">4
  <input type="radio" name="ranking2" value="5">5
</fieldset>

ESMERALDAS<input type="hidden" name="id_ciudad3" value="4">
<fieldset>
  <input type="radio" name="ranking3" value="1">1
  <input type="radio" name="ranking3" value="2">2
  <input type="radio" name="ranking3" value="3">3
  <input type="radio" name="ranking3" value="4">4
  <input type="radio" name="ranking3" value="5">5
</fieldset>

GALÁPAGOS<input type="hidden" name="id_ciudad4" value="5">
<fieldset>
  <input type="radio" name="ranking4" value="1">1
  <input type="radio" name="ranking4" value="2">2
  <input type="radio" name="ranking4" value="3">3
  <input type="radio" name="ranking4" value="4">4
  <input type="radio" name="ranking4" value="5">5
</fieldset>

GUAYAS<input type="hidden" name="id_ciudad5" value="6">
<fieldset>
  <input type="radio" name="ranking5" value="1">1
  <input type="radio" name="ranking5" value="2">2
  <input type="radio" name="ranking5" value="3">3
  <input type="radio" name="ranking5" value="4">4
  <input type="radio" name="ranking5" value="5">5
</fieldset>

LOJA<input type="hidden" name="id_ciudad6" value="7">
<fieldset>
  <input type="radio" name="ranking6" value="1">1
  <input type="radio" name="ranking6" value="2">2
  <input type="radio" name="ranking6" value="3">3
  <input type="radio" name="ranking6" value="4">4
  <input type="radio" name="ranking6" value="5">5
</fieldset>

MACAS<input type="hidden" name="id_ciudad7" value="8">
<fieldset>
  <input type="radio" name="ranking7" value="1">1
  <input type="radio" name="ranking7" value="2">2
  <input type="radio" name="ranking7" value="3">3
  <input type="radio" name="ranking7" value="4">4
  <input type="radio" name="ranking7" value="5">5
</fieldset>

MANABÍ<input type="hidden" name="id_ciudad8" value="9">
<fieldset>
  <input type="radio" name="ranking8" value="1">1
  <input type="radio" name="ranking8" value="2">2
  <input type="radio" name="ranking8" value="3">3
  <input type="radio" name="ranking8" value="4">4
  <input type="radio" name="ranking8" value="5">5
</fieldset>

MORONA SANTIAGO<input type="hidden" name="id_ciudad9" value="10">
<fieldset>
  <input type="radio" name="ranking9" value="1">1
  <input type="radio" name="ranking9" value="2">2
  <input type="radio" name="ranking9" value="3">3
  <input type="radio" name="ranking9" value="4">4
  <input type="radio" name="ranking9" value="5">5
</fieldset>

ORELLANA<input type="hidden" name="id_ciudad10" value="11">
<fieldset>
  <input type="radio" name="ranking10" value="1">1
  <input type="radio" name="ranking10" value="2">2
  <input type="radio" name="ranking10" value="3">3
  <input type="radio" name="ranking10" value="4">4
  <input type="radio" name="ranking10" value="5">5
</fieldset>

PASTAZA<input type="hidden" name="id_ciudad11" value="12">
<fieldset>
  <input type="radio" name="ranking11" value="1">1
  <input type="radio" name="ranking11" value="2">2
  <input type="radio" name="ranking11" value="3">3
  <input type="radio" name="ranking11" value="4">4
  <input type="radio" name="ranking11" value="5">5
</fieldset>

PICHINCHA<input type="hidden" name="id_ciudad12" value="13">
<fieldset>
  <input type="radio" name="ranking12" value="1">1
  <input type="radio" name="ranking12" value="2">2
  <input type="radio" name="ranking12" value="3">3
  <input type="radio" name="ranking12" value="4">4
  <input type="radio" name="ranking12" value="5">5
</fieldset>

SANTA ELENA<input type="hidden" name="id_ciudad13" value="14">
<fieldset>
  <input type="radio" name="ranking13" value="1">1
  <input type="radio" name="ranking13" value="2">2
  <input type="radio" name="ranking13" value="3">3
  <input type="radio" name="ranking13" value="4">4
  <input type="radio" name="ranking13" value="5">5
</fieldset>

SUCUMBIOS<input type="hidden" name="id_ciudad14" value="15">
<fieldset>
  <input type="radio" name="ranking14" value="1">1
  <input type="radio" name="ranking14" value="2">2
  <input type="radio" name="ranking14" value="3">3
  <input type="radio" name="ranking14" value="4">4
  <input type="radio" name="ranking14" value="5">5
</fieldset>

ZAMORA CHINCHIPE<input type="hidden" name="id_ciudad15" value="16">
<fieldset>
  <input type="radio" name="ranking15" value="1">1
  <input type="radio" name="ranking15" value="2">2
  <input type="radio" name="ranking15" value="3">3
  <input type="radio" name="ranking15" value="4">4
  <input type="radio" name="ranking15" value="5">5
</fieldset>


<input type="submit" class="special" value="Guardar">
</form>
	</body>
</html>