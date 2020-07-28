
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
 ('$row[id_user]','$_REQUEST[id_ciudad5]','$_REQUEST[ranking5]')");
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