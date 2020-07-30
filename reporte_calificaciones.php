<?php
 require 'database.php';

 if(isset($_POST['export_data'])){
     header('Content-Type:text/csv; charset-latin1');
     header('Content-Disposition: attachment; filename="ratings.csv"');

     $salida=fopen('php://output','w');
     fputcsv($salida,array('userId','repoId','rating'));
     $sql= "SELECT * FROM recomendacion";
     $resultado = $mysqli->query($sql);

     while($row = $resultado->fetch_assoc())
         fputcsv($salida,array($row['id'],$row['id_ciudadestino'],$row['ranking']));

 }
?>

