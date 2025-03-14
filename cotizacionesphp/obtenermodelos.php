<?php 
require '../php/conexionB.php';

$idMarca = $conexion-> real_escape_string( $_POST['id_marca']); 

$consulta= "SELECT id , modelo FROM modelosm WHERE id_marca = $idMarca ORDER BY modelo ASC";
$res= $conexion->query($consulta);

$respuesta = "<option value = '' > Selecciona un modelo </option>";

while ($row = $res-> fetch_assoc()){
    $respuesta .= "<option value = '".$row['id']."' > ".$row['modelo']." </option>";
}

echo json_encode($respuesta , JSON_UNESCAPED_UNICODE);

