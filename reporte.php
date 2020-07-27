<?php
 require 'database.php';

 if(isset($_POST['export_data'])){
     header('Content-Type:text/csv; charset-latin1');
     header('Content-Disposition: attachment; filename="dataset.csv"');

     $salida=fopen('php://output','w');
     fputcsv($salida,array('ID','CIUDAD_ORIGEN','CIUDAD_DESTINO','FECHA_SALIDA','FECHA_LLEGADA','HORA_SALIDA','HORA_LLEGADA','AEREOLINEA','ASIENTOS','NUMERO_VUELO','VALOR_PASAJE'));
     $sql= "SELECT * FROM vuelo";
     $resultado = $mysqli->query($sql);

     while($row = $resultado->fetch_assoc())
         fputcsv($salida,array($row['id'],$row['ciudad_origen'],$row['ciudad_destino'],$row['fecha_salida'],$row['fecha_llegada'],$row['hora_salida'],$row["hora_llegada"],$row["aereolinea"],$row['asientos'],$row['num_vuelo'],$row['valor_pasaje']));

 }
?>