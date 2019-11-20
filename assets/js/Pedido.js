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
                $("#carrusel_zoom").html('<img class="xzoom img-fluid" id="xzoom-default" src="' + DatosJson[i].RutaImagen2 + '" xoriginal="' + DatosJson[i].RutaImagen2 + '" />' +
                    '<div class="xzoom-thumbs">' +
                    '<a href="' + DatosJson[i].RutaImagen2 + '"><img class="xzoom-gallery" width="80" src="' + DatosJson[i].RutaImagen2 + '" xpreview="' + DatosJson[i].RutaImagen2 + '" title="The description goes here"></a>' +
                    '<a href="' + DatosJson[i].RutaImagen3 + '"><img class="xzoom-gallery" width="80" src="' + DatosJson[i].RutaImagen3 + '" xpreview="' + DatosJson[i].RutaImagen3 + '" title="The description goes here"></a>' +
                    '<a href="' + DatosJson[i].ImagenUsuario + '"><img class="xzoom-gallery" width="80" src="' + DatosJson[i].ImagenUsuario + '" xpreview="' + DatosJson[i].ImagenUsuario + '" title="The description goes here"></a>' +
                    '</div>');
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
                    '<input type="number"  id="inp_Tamano" class="d-none" value="' + DatosJson[i].Tamano_ID + '">' +
                    '</div>' +
                    '</form>' +

                    '<button class="btn btn-primary btn-lg btn-block" onclick="cart(' + parametros.Producto + ')">Agregar al Carrito</button>');
            }
        }
    });
}



    function cart(id)
    {
	  var ele=id;
	  var img_src=document.getElementById("inp_imagen").value;
	  var name=document.getElementById("inp_Tamano").value;
	  var price=document.getElementById("inp_precio").value;
	
	  $.ajax({
        type:'post',
        url:'/assets/tools/Carrito/AgregarCarrito.php',
        data:{
          item_src:img_src,
          item_name:name,
          item_price:price
        },
        success:function(response) {
            alert("Elemento Agregado exitosamente")
            document.getElementById("Cantidad_Carrito").innerHTML = response;
        }
      });
	
    }

