<?php

  require 'database.php';
  
  $id = $_GET['id'];
  
$sql = "DELETE FROM vuelo WHERE id = '$id' ";
					
$resultado = $mysqli->query($sql);

?>


<html lang="en">
     <head> 
     <title>Eliminar Vuelos</title>
     <link rel="shortcut icon" href="icon.png">
     </head>
         <body>
         <div class="container">
           <div class="row">
             <div class="row" style="text-align:center">
             <?php if($resultado) { ?>
                echo "<script> alert("VUELO ELIMINADO"); window.location="admin.php";</script>";
             <?php } else { ?>
               echo "<script> alert("VUELO NO ELIMINADO"); window.location="admin.php";</script>";
             <?php } ?>


        </body>
</html>
