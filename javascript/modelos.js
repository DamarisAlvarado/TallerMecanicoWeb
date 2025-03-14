const lmarca = document.getElementById('marca');
const lmodelo = document.getElementById('modelo');
lmarca.addEventListener('change',getModelos);


function Setdata(url ,formData,elemento){
return fetch(url,{
    method: "POST",
    body: formData,
    mode: 'cors'
})
    .then(Response => Response.json())
    .then(data =>{
        elemento.innerHTML = data
    })
    .catch(err => console.log(err))
}


function getModelos(){
    let marca = lmarca.value
    let url ='/cotizacionesphp/obtenermodelos.php'
    let formData = new FormData()
    formData.append('id_marca',marca)  

    Setdata(url,formData,lmodelo)
}


