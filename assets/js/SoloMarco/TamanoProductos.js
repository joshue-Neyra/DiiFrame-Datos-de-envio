$(document).ready(function () {
    size();
    DatosProducto();
});

function size() {
    
    $.ajax({
        url: '/assets/tools/tamano/Tamanos.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            var producto = document.getElementById("Producto_ID").value
            var DatosJson = JSON.parse(JSON.stringify(response));
            //console.log(DatosJson.length);
            for (i = 0; i < DatosJson.length; i++) {
                var contenido = '';
               
                $("#botones").append('<tr>' +
                    '<th scope="row">' + DatosJson[i].Tamano + ' </th>' +
                    '<td><a href="/Productos/VistaPrevia/?prod='+producto+'&tamano='+DatosJson[i].Tamano_ID+'&Meta=SoloMarco"><button class="btn btn-primary m-1">' +
                    'Elegir </button></a></td>' +
                    '</tr>');

            }
        }
    });
}

function DatosProducto() {
    var parametros = {
        "Producto_ID": document.getElementById("Producto_ID").value
    }
    $.ajax({
        data: parametros,
        url: '/assets/tools/tamano/DatosProducto.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            var DatosJson = JSON.parse(JSON.stringify(response));
            //console.log(DatosJson.length);
            for (i = 0; i < DatosJson.length; i++) {

                $("#prod_imagen").append('<a><img width="250px" class="img-fluid" src="'+DatosJson[i].RutaImagen2+'"' +
                    'alt="build"></a>' +
                    '<div class = "card-footer container" >' +
                    '<p> '+DatosJson[i].Prod_Nombre+' </p> </div >');

            }
        }
    });
}
