<?php
 require 'database.php';

 if(isset($_POST['export_data'])){
     header('Content-Type:text/csv; charset-latin1');
     header('Content-Disposition: attachment; filename="users.csv"');

     $salida=fopen('php://output','w');
     fputcsv($salida,array('userId','username','name'));
     $sql= "SELECT * FROM clientes";
     $resultado = $mysqli->query($sql);

     while($row = $resultado->fetch_assoc())
         fputcsv($salida,array($row['id'],$row['nombre'],$row['correo']));

 }
?>