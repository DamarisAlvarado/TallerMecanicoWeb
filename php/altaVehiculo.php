<?php 

$marca=$_POST['marca'];
$modelo=$_POST['modelo'];
$tipo =$_POST['mMode'];
$cliente=$_POST['clientes'];
$vin=$_POST['vin'];
$placas=$_POST['placas'];
$color=$_POST['color'];
$nota=$_POST['nota'];
//echo "marca :$marca modelo: $modelo tipo de auto: $tipo cliente: $cliente vin: $vin placas:$placas  color: $color nota:$nota";


if($vin<16 || $placas<6){
    include '../cotizacionesphp/altavehiculo.php';
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
}if(in_array('', [$marca, $modelo,$tipo,$cliente,$color,$nota])){
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
    echo 'hola';

}



?>