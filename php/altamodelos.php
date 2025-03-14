<?php 

$idmarca = $_POST["marca"];
$modelo = $_POST["modelo"];
$conexion = mysqli_connect('localhost','root','','teamprueba');

if( $idmarca === "Seleccionar Marca"||empty($modelo) ){
    include "../altamodelosV.php"
    ?>
    <?php 
    ?>
    <script>
       Swal.fire({
          icon: "warning",
          title: "Team Service",
          confirmButtonColor: '#8E0E00',
          text: "Selecciona una marca válida y llena el campo de modelo."
       });
          
       </script>
    <?php
    
}else{
    
    $registroModelo = "INSERT INTO modelosm (`id_marca`, `modelo`) VALUES ('$idmarca', '$modelo')";       
    $resultado = mysqli_query($conexion, $registroModelo);

    if ($resultado) {
        include "../altamodelosV.php"
        ?> 
        <?php 
        ?> 
        <script>
            Swal.fire({
                icon: "success",
                title: "Team Service",
                confirmButtonColor: '#8E0E00',
                text: "Modelo agregado con éxito."
             });
        </script>
        <?php
        
    }else{
        include "../altamodelosV.php"
        ?> 
        <?php 
        ?> 
        <script>
            Swal.fire({
                icon: "error",
                title: "Porfavor..",
                 text: "Error."
                 });
        </script>
        <?php
       
        }
    }

mysqli_close($conexion);
?>
