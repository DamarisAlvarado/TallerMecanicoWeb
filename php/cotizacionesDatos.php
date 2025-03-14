<?php 
require ('../php/conexionB.php');
function obtenerDatosPorPlaca($placas, $conexion) {

        $consultaP = "SELECT * FROM automovil
        INNER JOIN clientes ON automovil.id_Dueño = clientes.id_cliente
        INNER JOIN modelosm ON automovil.modelo = modelosm.id
        INNER JOIN marcas ON modelosm.id_marca = marcas.id
        INNER JOIN tiposa ON automovil.id_tipo = tiposa.id
        WHERE automovil.placas = '$placas'";

    $res = mysqli_query($conexion, $consultaP);

    if (mysqli_num_rows($res) > 0) {
        return mysqli_fetch_assoc($res); // Devuelve los datos como un array asociativo
    } else {
        return null; // Retorna null si no hay resultados
    }
}

?>