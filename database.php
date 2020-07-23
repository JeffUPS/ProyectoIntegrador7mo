<?php
$mysqli = new mysqli('localhost', 'root', '', 'proyecto1');

if($mysqli->connect_error){
  die('Error en la conexion'. $mysqli->connect_error);
}

#print('Conexion exitosa: '. $mysqli->server_info);

?>

<?php
$link = mysqli_connect('localhost', 'root', '', 'ProyectoIntegrador');

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

<?php
//DB details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'proyecto1';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}