<?php
session_start();
require('../php/conexionB.php');
require('../php/cotizacionesDatos.php');
$consulta = ("SELECT placas FROM automovil");
$resultado = mysqli_query($conexion, $consulta);
$consulta2 = ("SELECT id, NomServicio FROM servicios");
$resultadoServicios = mysqli_query($conexion, $consulta2);

$nombre = $apellido = $correo = $telefono = $direccion = "";
$vin = $placas = $notas = $año = $marca = $modelo = $color = $tipo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["clientes"])) {
  $placas = $_POST['clientes'];
  $datos = obtenerDatosPorPlaca($placas, $conexion);

  if ($datos) {
    // Asignamos las variables
    $nombre = $datos["nombre"];
    $apellido = $datos["apellido"];
    $correo = $datos["correo"];
    $telefono = $datos["telefono"];
    $direccion = $datos["direccion"];
    $vin = $datos["vin"];
    $placas = $datos["placas"];
    $notas = $datos["notas"];
    $año = $datos["año"];
    $marca = $datos["NomMarca"];
    $modelo = $datos["modelo"];
    $color = $datos["Color"];
    $tipo = $datos["Nom_tipo"];
  } else {
    echo "No se encontraron datos para la placa: $placas";
  }
}


?>



<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Team Service</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="/styles/cotizaciones.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <script src="/javascript/botones.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    
        function agregarFila() {
            var servicio = document.getElementById("servicios").value;
            var cantidad = document.getElementById("cantidad").value;
            var unitario = document.getElementById("unitario").value;
            var horas = document.getElementById("horas").value;
            var hora = document.getElementById("hora").value;

            if (servicio && cantidad && unitario && horas && hora) {
                var tabla = document.getElementById("tabla-body");
                var fila = document.createElement("tr");

                fila.innerHTML = `
                    <td>${servicio}</td>
                    <td>${cantidad}</td>
                    <td>${unitario}</td>
                    <td>${horas}</td>
                    <td>${hora}</td>
                    <td><button class="btn btn-danger btn-sm" onclick="eliminarFila(this)">Eliminar</button></td>
                `;

                tabla.appendChild(fila);
                document.getElementById("formServicio").reset();
            } else {
                alert("Completa todos los campos");
            }
        }

        function eliminarFila(boton) {
            var fila = boton.parentNode.parentNode;
            fila.remove();
        }
    </script>

</head>

<body>
  <main class="d-flex flex-nowrap">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark  vh-100" style="width: 250px;">
      <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <img src="/images/logo-chico.png" style="width: 5.5rem ; height: 5rem; padding: 0.5rem;">
        <span class="fs-5">Team Service</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="/busqueda.php" class="nav-link text-white " aria-current="page">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="15" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
            </svg>
            Búsqueda Rápida
          </a>
        </li>
        <li>
          <a href="/altamodelosV.php" class="nav-link text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="18" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
              <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z" />
            </svg>
            Alta de Modelos
          </a>
        </li>
        <li>
          <a href="/altausuarios.php" class="nav-link text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="20" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
              <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
              <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
            </svg>
            Alta Usuarios
          </a>
        </li>
        <li>
          <a href="/cotizaciones.php" class="nav-link text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="16" fill="currentColor" class="bi bi-clipboard2-check-fill" viewBox="0 0 16 16">
              <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5" />
              <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585q.084.236.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5q.001-.264.085-.5m6.769 6.854-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708" />
            </svg>
            Cotizaciones
          </a>
        </li>
        <li>
          <a href="/cambioplacas.php" class="nav-link text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="20" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
              <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9" />
              <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z" />
            </svg>
            Cambio de placas
          </a>
        </li>
        <li>
          <a href="/index.php" class="nav-link text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
              <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
            </svg>
            Cerrar cuenta
          </a>
        </li>
      </ul>
      <hr>
      <div class="dropdown">
        <img src="https://github.com/mdo.png" alt="" width="40" height="32" class="rounded-circle me-2">
        <strong><?= $_SESSION['usuario'] ?></strong>
        
      </div>
    </div>


    <div id="card2">
      <h4>Generar cotización</h4>
      <form method="POST">
        <label id="labelV"> Placas</label>
        <select name="clientes" id="inp">
          <option selected>Selecciona placas</option>
          <?php
          while ($datasele = mysqli_fetch_array($resultado)) { ?>
            <option value="<?php echo $datasele["placas"]; ?>"> <?php echo ($datasele["placas"]); ?> </option>
          <?php } ?>
        </select>
        <Input type="submit" value="Seleccionar"></Input>


        <div id="contenedorIn">

          <div id="cliente">
            <h5>Cliente</h5>
            <label id="titulo" for="nom">Nombre completo:</label>
            <label id="nombre" name='datos' for="datos"> <?php echo $nombre ?> <?php echo $apellido ?> </label> <br>
            <label id="titulo" for="nom">Correo Electronico:</label>
            <label id="respuesta" for="nombre"><?php echo $correo ?> </label><br>
            <label id="titulo" for="nom">Telefono:</label>
            <label id="respuesta" for="nombre"> <?php echo $telefono ?></label><br>
            <label id="titulo" for="nom">Dirección:</label>
            <label id="respuesta" for="nombre"><?php echo $direccion ?> </label><br>
          </div>

          <div id="vehiculo">
            <h5>Vehiculo</h5>
            <label id="titulo" for="nom">Vehiculo:</label>
            <label id="respuesta" for="nombre"><?php echo $marca ?> <?php echo $modelo ?> </label>
            <label id="titulo" for="nom">Vin:</label>
            <label id="respuesta" for="nombre"><?php echo $vin ?></label><br>
            <label id="titulo" for="nom">Placas:</label>
            <label id="respuesta" for="nombre"><?php echo $placas ?> </label>
            <label id="titulo" for="nom">color:</label>
            <label id="respuesta" for="nombre"><?php echo $color ?></label>
            <label id="titulo" for="nom">Tipo:</label>
            <label id="titulo" for="nombre"><?php echo $tipo ?></label> <br>
            <label id="titulo" for="nom">Notas:</label>
            <label id="respuesta" for="nombre"> <?php echo $notas ?></label> <br>
          </div>
        </div>
      </form>



      <form id="formServicio"  > 
       <div id="registro">
        <label id="titleSer" for="servi">Servicio</label>
        <label id="titleC" for="">Cantidad</label>
        <label id="titleU" for="">$Unitario</label>
        <label id="titleHs" for="">Horas</label>
        <label id="titleH" for=""> $Hora</label><br>

        <div id="registroCa">
          <select name="servicios" id="servicios">
            <option selected>Selecciona Servicio</option>
            <?php
            while ($datasele = mysqli_fetch_array($resultadoServicios)) { ?>
              <option value="<?php echo $datasele["NomServicio"]; ?>"> <?php echo ($datasele["NomServicio"]); ?> </option>
            <?php } ?>
          </select>

          <input id="cantidad" class="cantidad" type="text">
          <input id="unitario" class="cantidad" type="text">
          <input id="horas" class="cantidadh" type="text">
          <input id="hora" class="cantidadh" type="text">
          <button onclick="agregarFila()" > Agregar concepto</button>
          <button onclick="">Eliminar</button>
        </div> <br>
        </form>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">Servicio</th>
              <th scope="col">Cantidad</th>
              <th scope="col">$ Unitario</th>
              <th scope="col">Horas</th>
              <th scope="col">$ Hora</th>
            </tr>
          </thead>
          <tbody id="tabla-body">
        </tbody>
        </table>
        

        <button id="GenPDF">Generar <svg xmlns="http://www.w3.org/2000/svg" width="25" height="30" fill="currentColor" class="bi bi-envelope-arrow-up" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v4.5a.5.5 0 0 1-1 0V5.383l-7 4.2-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h5.5a.5.5 0 0 1 0 1H2a2 2 0 0 1-2-1.99zm1 7.105 4.708-2.897L1 5.383zM1 4v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1" />
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.354 1.25 1.25a.5.5 0 0 1-.708.708L13 12.207V14a.5.5 0 0 1-1 0v-1.717l-.28.305a.5.5 0 0 1-.737-.676l1.149-1.25a.5.5 0 0 1 .722-.016" />
          </svg></button>
        <button id="GuardarC">Guardar Cotización</button>
        <button id="GenEx">Generar</button>

        <label id="calculos" for="">Subtotal: $ </label>
        <label for=""> 1525.20</label>
        <br>
        <label id="calculos2" for="">Iva: $</label>
        <label for=""> 1525.20</label>
        <br>
        <label id="calculos2" for="">Total: $</label>
        <label for=""> 1525.20</label>

      </div>
    </div>


</body>

</html>