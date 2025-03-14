<?php 

$nombre = $_POST["Ausuario"];
$contra = $_POST["Acontraseña"];
$modo = $_POST["Amodo"];

$conexion = mysqli_connect('localhost','root','','teamprueba');



if (empty($nombre) || empty($contra) || empty($modo)) {
    include "../altausuarios.php"
    ?>
    <?php 
    ?>
      <script>
       Swal.fire({
          icon: "error",
          title: "Error...",
          text: "llena los campos"
       });
          
       </script>
    <?php

}else{
    $consulta = "INSERT INTO login (user,password,modo) VALUES ('$nombre','$contra','$modo')";
    if(mysqli_query($conexion, $consulta)){
        include "../altausuarios.php"
    ?>
   <?php 
   ?>
     <script>
      Swal.fire({
         icon: "error",
         title: "Error...",
         text: "se agrego"
      });
         
      </script>
   <?php
    }else{
        ?>
        <?php 
        ?>
          <script>
           Swal.fire({
              icon: "error",
              title: "Error...",
              text: "error"
           });
              
           </script>
        <?php
    }
    
}

?>