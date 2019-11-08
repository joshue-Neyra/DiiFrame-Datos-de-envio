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
                console.log(DatosJson[i].RutaImagen2);
                $("#carrusel_zoom").html('<img class="xzoom img-fluid" id="xzoom-default" src="'+DatosJson[i].RutaImagen2+'" xoriginal="'+DatosJson[i].RutaImagen2+'" />' +
                    '<div class="xzoom-thumbs">' +
                    '<a href="'+DatosJson[i].RutaImagen2+'"><img class="xzoom-gallery" width="80" src="'+DatosJson[i].RutaImagen2+'" xpreview="'+DatosJson[i].RutaImagen2+'" title="The description goes here"></a>' +
                    '<a href="'+DatosJson[i].RutaImagen3+'"><img class="xzoom-gallery" width="80" src="'+DatosJson[i].RutaImagen3+'" xpreview="'+DatosJson[i].RutaImagen3+'" title="The description goes here"></a>' +
                    '</div>');
                $("#Descripcion").append('<p class="last-sold text-muted"><small>145 articulos vendidos</small></p>'+
                    '<h4 class="product-title mb-2">'+DatosJson[i].Prod_Nombre+' - '+DatosJson[i].Prod_Descripcion+ ' - ' +DatosJson[i].Tamano+'"'+'</h4>'+
                    '<h2 class="product-price display-4">$ '+DatosJson[i].Precio+'</h2>'+
                    '<p class="text-success"><i class="fab fa-cc-mastercard"></i> <i class="fab fa-cc-visa"></i> <i class="fab fa-cc-paypal"></i></p>'+
                    '<p class="mb-0"><i class="fa fa-truck"></i> Envio gratuito en CDMX</p>'+
                    '<div class="text-muted mb-2"><small>Aplica restricciones</small></div>'+
                    '<form class="form-inline">'+
                    '<div class="form-group mb-2">'+
                        '<label for="quant">Cantidad:  </label>'+
                        '<input type="number" min="1" id="inp_cant" class="form-control input-lg" value="1" placeholder="1">'+
                    '</div>'+
                    '</form>'+
                    
                    '<button class="btn btn-primary btn-lg btn-block" onclick="Pedido('+parametros.Tamano+','+parametros.Producto+')">Agregar al Carrito</button>');
            }
        }
    });
}

function Pedido(Tamano,Producto) {
    var d = new Date();
	var dia = d.getDate();
	var mes = d.getMonth() + 1;
	var año = d.getFullYear();
	var hora = d.getHours();
	var minuto = d.getMinutes();
	var segundos = d.getSeconds();
	if (mes.toString().length < 2) {
		mes = "0" + mes.toString();
	} else {
		mes = mes.toString();
	}
	if (dia.toString().length < 2) {
		dia = "0" + dia.toString();
	} else {
		dia = dia.toString();
	}
	var fecha = dia + "-" + mes + "-" + año.toString() + " " + hora.toString() + ":" + minuto.toString() + ":" + segundos.toString();
    var parametros = {
        "Tamano": Tamano,
        "Producto": Producto,
        "Cantidad": document.getElementById("inp_cant").value,
        "Fecha": fecha
    }

    $.ajax({
        data: parametros,
        url: '/assets/tools/Carrito/AgregarCarrito.php',
        type: 'post',
        success: function (response) {
            console.log(response);
            if(response == 'Registro exitoso'){
                location.href="/Cart/";
            }
            else{
                location.href="/Login/?Pedido=1";
                
            }
           
        }
    });
}

