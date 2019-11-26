$(document).ready(function () {
    Producto();
});

function Producto() {
    var parametros = {
        "Tamano": document.getElementById("Tamano_ID").value,
        "Producto": document.getElementById("Producto_ID").value,
    }

    $.ajax({
        data: parametros,
        url: '/assets/tools/Productos/ProductoPrecio.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            var DatosJson = JSON.parse(JSON.stringify(response));
            for (i = 0; i < DatosJson.length; i++) {
                //console.log(DatosJson[i].RutaImagen2);
                $("#carrusel_zoom").append('<a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox1">' +
                    '<img class="img-fluid" src="'+DatosJson[i].ImagenUsuario+'" alt="">' +
                    '</a>');
                 $("#modal1").append(
                    '<img class="img-fluid" src="'+DatosJson[i].ImagenUsuario+'" alt="">');
                $("#Descripcion").append('<p class="last-sold text-muted"><small>145 articulos vendidos</small></p>' +
                    '<h4 class="product-title mb-2">' + DatosJson[i].Prod_Nombre + ' - ' + DatosJson[i].Prod_Descripcion + ' - ' + DatosJson[i].Tamano + '"' + '</h4>' +
                    '<h2 class="product-price display-4">$ ' + DatosJson[i].Precio + '</h2>' +
                    '<p class="text-success"><i class="fab fa-cc-mastercard"></i> <i class="fab fa-cc-visa"></i> <i class="fab fa-cc-paypal"></i></p>' +
                    '<p class="mb-0"><i class="fa fa-truck"></i> Envio gratuito en CDMX</p>' +
                    '<div class="text-muted mb-2"><small>Aplica restricciones</small></div>' +
                    '<form class="form-inline">' +
                    '<div class="form-group mb-2">' +
                    '<label for="quant">Cantidad:  </label>' +
                    '<input type="number" min="1" id="inp_cant" class="form-control input-lg" value="1" placeholder="1">' +
                    '<input type="number"  id="inp_precio" class="d-none" value="' + DatosJson[i].Precio + '">' +
                    '<input type="text"  id="inp_imagen" class="d-none" value="' + DatosJson[i].ImagenUsuario + '">' +
                    '<input type="number"  id="inp_Tamano_ID" class="d-none" value="' + DatosJson[i].Tamano_ID + '">' +
                    '<input type="text"  id="inp_Tamano" class="d-none" value="' + DatosJson[i].Tamano + '">' +
                    '<input type="text"  id="inp_ProdNombre" class="d-none" value="' + DatosJson[i].Prod_Nombre + '">' +
                    '</div>' +
                    '</form>' +

                    '<button class="btn btn-primary btn-lg btn-block" onclick="cart(' + parametros.Producto + ')">Agregar al Carrito</button>');
            }
        }
    });
}



function cart(id) {

    $.ajax({
        type: 'post',
        url: '/assets/tools/Carrito/AgregarCarrito.php',
        data: {
            Producto: id,
            Prod_Nombre: document.getElementById("inp_ProdNombre").value,
            Imagen: document.getElementById("inp_imagen").value,
            Tamano_ID: document.getElementById("inp_Tamano_ID").value,
            Tamano: document.getElementById("inp_Tamano").value,
            Precio: document.getElementById("inp_precio").value,
            Cantidad: document.getElementById("inp_cant").value,

        },
        success: function (response) {
            alert("Elemento Agregado exitosamente");
            $("#carrusel_zoom").append('<a class="nav-link" href="/Cart/"><button class="btn btn-warning btn-lg btn-block" >Ir al Carrito</button></a>');
            document.getElementById("Cantidad_Carrito").innerHTML = response;
        }
    });

}
