<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Service</title>
    <link rel="stylesheet" href="/styles/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
     <form action="/php/consultas.php" method="POST">
     <div id="contenedor">
        <div id="Login">
        </div>
        <div id="info">
           <img id="logo"src="/images/logo-pequeño.png" >
           <h2>Bienvenidos</h2>
           <h3>¡ Listos para empezar !</h3><br>
           <label > Usuario </label> <br>
           <input type="text" name="usuario"><br>

           <label>Contraseña</label><br>
           <input type="password" name="pass" id="pass"><br>

           <button style="margin: 2rem ;" class="btn btn-primary btn-md" name="entrar">Entrar</button><br>
         

        </div>
     </div>
     </form>

</body>
</html>