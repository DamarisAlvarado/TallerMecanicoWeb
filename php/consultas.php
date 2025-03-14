<?php
$usuario=$_POST["usuario"];
$contraseña=$_POST["pass"];
session_start();
$_SESSION["usuario"]=$usuario;
$conexion = mysqli_connect('localhost','root','','teamprueba');
$datos=$_SESSION["usuario"];
$consulta = "SELECT*FROM login WHERE user='$usuario' and password='$contraseña'";
$resultado = mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  header("location: /logi.php");
 
}else{
   ?>
    
   <?php 
    include("index.php");
    
   ?>
     <script>
      Swal.fire({
         icon: "error",
         title: "Error...",
         text: "Usuario o Contraseña incorrecta"
      });
         
      </script>
   <?php
   
}
