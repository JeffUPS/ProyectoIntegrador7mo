<?php
 require 'database.php';

 if(isset($_POST['export_data'])){
     header('Content-Type:text/csv; charset-latin1');
     header('Content-Disposition: attachment; filename="repositorio.csv"');

     $salida=fopen('php://output','w');
     fputcsv($salida,array('id_user','id_destino','ranking'));
     $sql= "SELECT * FROM recomendacion";
     $resultado = $mysqli->query($sql);

     while($row = $resultado->fetch_assoc())
         fputcsv($salida,array($row['id_user'],$row['id_ciudadestino'],$row['ranking']));

 }
?>