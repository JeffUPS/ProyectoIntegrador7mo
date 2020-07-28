<?php
 require 'database.php';

 if(isset($_POST['export_data'])){
     header('Content-Type:text/csv; charset-latin1');
     header('Content-Disposition: attachment; filename="usuarios.csv"');

     $salida=fopen('php://output','w');
     fputcsv($salida,array('user_Id','nombre','correo'));
     $sql= "SELECT * FROM clientes";
     $resultado = $mysqli->query($sql);

     while($row = $resultado->fetch_assoc())
         fputcsv($salida,array($row['id_user'],$row['nombre'],$row['correo']));

 }
?>