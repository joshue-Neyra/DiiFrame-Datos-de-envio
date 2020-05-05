$(document).ready(function () {
    GetIVA();
    DetalleProducto();

});

function dosDecimales(n) {
    let t = n.toString();
    let regex = /(\d*.\d{0,2})/;
    return t.match(regex)[0];
}

function DetalleProducto() {
    var parametros = {
        "Tamano": document.getElementById("Tamano_ID").value,
        "Producto": document.getElementById("Producto_ID").value,
        "Marialuisa_ID": 0
    }

    $.ajax({
        data: parametros,
        url: '/assets/tools/Productos/ProductoPrecio.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            var DatosJson = JSON.parse(JSON.stringify(response));
            var orientacion = "";
            var Meta = document.getElementById("Meta").value;
            var iva_porcentaje = document.getElementById("inp_iva").value;
            var iva = parseFloat(1) + parseFloat(iva_porcentaje);
            for (i = 0; i < DatosJson.length; i++) {
                if (DatosJson[i].Orientacion == 1) {
                    orientacion = "portrait";
                } else {
                    orientacion = "landscape";
                }

                $("#carrusel_zoom2").append('<div class="border border-warning box4" data-toggle="modal" data-target="#lightbox1">' +
                    '<img src="' + DatosJson[i].RutaImagen2 + '" class="img-fluid" alt="img">' +
                    '<div class="box-content ">' +
                    '<h3 class = "text-center text-warning" ><i class = "fa fa-search fa-2x" > </i> </h3>' +
                    '</div >' +
                    '</div>');

                $("#carrusel_zoom").append(
                    '<div class="col-md-6 border border-warning">' +
                    '<div href="#" class="thumbnail box4" data-toggle="modal" data-target="#lightbox2">' +
                    '<img class="img-fluid img-zoom" src="' + DatosJson[i].RutaImagen3 + '" alt="">' +
                    '<div class="box-content ">' +
                    '<h3 class = "text-center text-warning" ><i class = "fa fa-search fa-2x" > </i> </h3>' +
                    '</div >' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-6 border border-warning">' +
                    '<div href="#" class="thumbnail box4" data-toggle="modal" data-target="#lightbox3">' +
                    '<img class="img-fluid img-zoom" src="' + DatosJson[i].RutaImagen4 + '" alt="">' +
                    '<div class="box-content ">' +
                    '<h3 class = "text-center text-warning" ><i class = "fa fa-search fa-2x" > </i> </h3>' +
                    '</div >' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-12 border border-warning">' +
                    '<div class="device-mockup ambiente1 landscape white" data-toggle="modal" data-target="#lightbox4">' +
                    '<div class="device" style="background-image: url(/assets/img/ambiente1.jpg);">' +
                    '<div class="screen ' + orientacion + '" >' + //orientacion
                    '<img src="' + DatosJson[i].RutaImagen1 + '" class="img-fluid" alt="img">' +
                    '</div>' +
                    '</div>' +
                    '</div>');
                $("#modal1").append(
                    '<img class="img-fluid" src="' + DatosJson[i].RutaImagen2 + '" alt="img">');
                $("#modal2").append(
                    '<img class="img-fluid" src="' + DatosJson[i].RutaImagen3 + '" alt="img">');
                $("#modal3").append(
                    '<img class="img-fluid" src="' + DatosJson[i].RutaImagen4 + '" alt="img">');
                $("#modal4").append(
                    '<div class="device-mockup ambiente1 landscape white" data-toggle="modal" data-target="#lightbox4">' +
                    '<div class="device" style="background-image: url(/assets/img/ambiente1.jpg);">' +
                    '<div class="screen ' + orientacion + '" >' + //orientacion
                    '<img src="' + DatosJson[i].RutaImagen1 + '" class="img-fluid" alt="img">' +
                    '</div>' +
                    '</div>' +
                    '</div>');
                var PrecioTotal = DatosJson[i].Precio * iva;
                $("#Descripcion").append('<p class="last-sold text-muted"><strong>Detalles del proyecto:</strong></p>' +
                    '<h4 class="product-title mb-2"> Marco: ' + DatosJson[i].Prod_Nombre +'<br>'+ DatosJson[i].Prod_Descripcion + '<br> Tamaño de marco: ' + DatosJson[i].Tamano + '</h4>' +
                    '<h2 class="product-price display-4">$ ' + PrecioTotal.toFixed(2) + ' MXN </h2>' +
                    '<p class="text-success"><i class="fab fa-cc-mastercard"></i> <i class="fab fa-cc-visa"></i></p>' +
                    '<p class="mb-0"><i class="fa fa-truck"></i> Envios a todo México</p>' +
                    '<div class="text-muted mb-2"><small>Aplica restricciones</small></div>' +
                    '<form class="form-inline">' +
                    '<div class="form-group mb-2">' +
                    '<label for="quant">Cantidad:  </label>' +
                    '<input type="number" min="1" id="inp_cant" class="form-control input-lg" value="1" placeholder="1">' +
                    '<input type="number"  id="inp_precioproducto" class="d-none" value="' + DatosJson[i].Precio + '">' +
                    '<input type="number"  id="inp_precio" class="d-none" value="' + DatosJson[i].Precio + '">' +
                    '<input type="text"  id="inp_imagen" class="d-none" value="' + DatosJson[i].RutaImagen2 + '">' +
                    '<input type="number"  id="inp_Tamano_ID" class="d-none" value="' + DatosJson[i].Tamano_ID + '">' +
                    '<input type="text"  id="inp_Tamano" class="d-none" value="' + DatosJson[i].Tamano + '">' +
                    '<input type="text"  id="inp_ProdNombre" class="d-none" value="' + DatosJson[i].Prod_Nombre + '">' +
                    '<input type="text"  id="inp_inv_descripcion" class="d-none" value="' + DatosJson[i].Tamano + '">' +
                    '</div>' +
                    '</form>' +
                    '<div id="btn_descripcion">' +
                    '<button class="btn btn-primary btn-lg btn-block" onclick="cart(' + parametros.Producto + ')">Agregar al Carrito</button></div>');
            }
        }
    });
}

function Precio(valor) {
    var PrecioProducto = document.getElementById("inp_precio").value;
    var PrecioSuma = parseFloat(PrecioProducto) + parseFloat(valor);
    $("#inp_precio").val(PrecioSuma);
    var iva_porcentaje = document.getElementById("inp_iva").value;
    var iva = parseFloat(1) + parseFloat(iva_porcentaje);
    var PrecioTotal = PrecioSuma * iva;
    $(".product-price").text('$ ' + PrecioTotal.toFixed(2) + ' MXN ');
}

function GetIVA() {
    $.ajax({
        type: 'post',
        url: '/assets/tools/Productos/GetIva.php',
        dataType:"json",
        success: function (response) {
            var DatosJson = JSON.parse(JSON.stringify(response));
             $("#inp_iva").val(DatosJson[0].TasaOCuota);
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
            Meta: document.getElementById("Meta").value,
            inv_descripcion: document.getElementById("inp_inv_descripcion").value,
        },
        success: function (response) {
            $("#Cantidad_Carrito").html(response);
            var solomarco = document.getElementById("Meta").value;
            $("#btn_descripcion").text("");
            $("#btn_descripcion").append('<a class="nav-link" href="/Cart/"><button class="btn btn-warning btn-lg btn-block" >Ir al Carrito</button></a>');
        }
    });

}
