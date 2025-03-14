<?php 
require '../php/conexionB.php';
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellido'];
$correo = $_POST['correo'];
$tele = $_POST['tele'];
$dire = $_POST['direccion'];


if(empty($nombre) || empty($apellidos) ||empty($correo) ||empty($tele) || empty($dire) || $tele < 10 ){
    include "../cotizacionesphp/altaclientes.php"
    ?>
    <?php 
    ?>
      <script>
       Swal.fire({
          icon: "info",
          title: "Favor...",
          confirmButtonColor: '#8E0E00',
          text: "Debes de llenar todos los campos correctamente"
       });
          
       </script>
    <?php
}else{
    $resultado = "INSERT INTO clientes (nombre,apellido,correo,telefono,celular,direccion)
    VALUES ('$nombre','$apellidos','$correo','$tele','$tele','$dire')";
    //print_r("nom: $nombre, ape:$apellidos,correo:$correo,tele:$tele,dire:$dire");
    if(mysqli_query($conexion,$resultado)){
        include "../cotizacionesphp/altaclientes.php"
        ?>
        <?php
        ?>
        <script>
        Swal.fire({
          icon: "success",
          title: "Agregado...",
          confirmButtonColor: '#8E0E00',
          text: "Debes de llenar todos los campos"
       });
          
        </script>
        <?php
    }else{
        include "../cotizacionesphp/altaclientes.php"
        ?>
        <?php
        ?>
        <script>
        Swal.fire({
          icon: "error",
          title: "Ocurrio un error...",
          confirmButtonColor: '#8E0E00',
          text: "Error"
       });
          
        </script>
        <?php
    }
}

?>