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


 $where = "";
 $sql= "SELECT * FROM clientes WHERE correo='$_SESSION[correo]'";
 $resultado = $mysqli->query($sql);
  while($row = $resultado->fetch_array(
    MYSQLI_ASSOC))  { 
  
 mysqli_query($mysqli,"insert into recomendacion (id_user,id_ciudadestino, ranking) values 
 ('$row[id_user]','$_REQUEST[id_ciudad0]','$_REQUEST[ranking0]'),
 ('$row[id_user]','$_REQUEST[id_ciudad1]','$_REQUEST[ranking1]'),
 ('$row[id_user]','$_REQUEST[id_ciudad2]','$_REQUEST[ranking2]'),
 ('$row[id_user]','$_REQUEST[id_ciudad3]','$_REQUEST[ranking3]'),
 ('$row[id_user]','$_REQUEST[id_ciudad4]','$_REQUEST[ranking4]'),
 ('$row[id_user]','$_REQUEST[id_ciudad5]','$_REQUEST[ranking5]'),
 ('$row[id_user]','$_REQUEST[id_ciudad6]','$_REQUEST[ranking6]'),
 ('$row[id_user]','$_REQUEST[id_ciudad7]','$_REQUEST[ranking7]'),
 ('$row[id_user]','$_REQUEST[id_ciudad8]','$_REQUEST[ranking8]'),
 ('$row[id_user]','$_REQUEST[id_ciudad9]','$_REQUEST[ranking9]'),
 ('$row[id_user]','$_REQUEST[id_ciudad10]','$_REQUEST[ranking10]'),
 ('$row[id_user]','$_REQUEST[id_ciudad11]','$_REQUEST[ranking11]'),
 ('$row[id_user]','$_REQUEST[id_ciudad12]','$_REQUEST[ranking12]'),
 ('$row[id_user]','$_REQUEST[id_ciudad13]','$_REQUEST[ranking13]'),
 ('$row[id_user]','$_REQUEST[id_ciudad14]','$_REQUEST[ranking14]'),
 ('$row[id_user]','$_REQUEST[id_ciudad15]','$_REQUEST[ranking15]')");
    }   
 ?>

<html lang="en">
     <head> 
     <title>Guardar Vuelo</title>
     
     </head>
         <body>
         <div class="container">
         <div class="container">
           <div class="row">
             <div class="row" style="text-align:center">
             <?php if($row) { ?>
                <script> alert("GRACIAS!!!"); window.location="indexcliente.php";</script>
             <?php } else { ?>
                <script> alert("GRACIAS!!!"); window.location="indexcliente.php";</script>
             <?php } ?>
            
             


        </body>
</html>
