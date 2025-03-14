function clientes() {
    location= "/cotizacionesphp/altaclientes.php";
}

function auto(){
    location= "/cotizacionesphp/altavehiculo.php";
}

function cotiza(){
    location= "/cotizacionesphp/cotizacion.php";
}

function clic(){
   const nombre = document.getElementsByName('datos');

   nombre.forEach((elemento) => {
     elemento.textContent = "Damaris Yamileth Alvarado Arciga";
   });
}