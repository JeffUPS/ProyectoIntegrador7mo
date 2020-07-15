<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'Proyecto';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>

<?php
$mysqli = new mysqli('localhost', 'root', '', 'proyecto1');

if($mysqli->connect_error){
  die('Error en la conexion'. $mysqli->connect_error);
}

#print('Conexion exitosa: '. $mysqli->server_info);

?>
