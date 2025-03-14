<?php

require '../php/conexionB.php';


$Cliente = $_POST['clientes'];
$Vin = $_POST['vin'];
$Placas = $_POST['placas'];
$Marca = $_POST['marca'];
$Modelo = $_POST['modelo'];
$Tipo = $_POST['mMode'];
$Color = $_POST['color'];
$Notas = $_POST['nota'];

///print_r("Cliente: " . $Cliente . " Vin: " . $Vin ." Placas: " . $Placas . " Marca: " . $Marca . " Modelo: " .$Modelo . " Tipo: " . $Tipo . " Color: " . $Color ." Notas: " . $Notas);


    if(empty($Cliente) || empty($Vin) ||empty($Placas) ){
        include "../cotizacionesphp/altavehiculo.php"
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
        $resultado = "INSERT INTO automovil (id_Dueño, vin, placas, notas, marca, modelo, Color, id_tipo)
        VALUES ('$Cliente','$Vin','$Placas','$Notas','$Marca','$Modelo','$Color','$Tipo')";
        //print_r("nom: $nombre, ape:$apellidos,correo:$correo,tele:$tele,dire:$dire");
        if(mysqli_query($conexion,$resultado)){
            include "../cotizacionesphp/altavehiculo.php"
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
            include "../cotizacionesphp/altavehiculo.php"
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
