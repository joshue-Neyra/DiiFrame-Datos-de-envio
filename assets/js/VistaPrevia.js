$(document).ready(function () {
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
        "Marialuisa_ID": document.getElementById("Marialuisa_ID").value
    }

    $.ajax({
        data: parametros,
        url: '/assets/tools/Productos/ProductoPrecio.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            //console.log(response);
            var DatosJson = JSON.parse(JSON.stringify(response));
            var orientacion = "";
            var Meta = document.getElementById("Meta").value;

            for (i = 0; i < DatosJson.length; i++) {
                if (DatosJson[i].Orientacion == 1) {
                    orientacion = "portrait";
                } else {
                    orientacion = "landscape";
                }
                var ml = document.getElementById("Tamano_M").value;
                if (ml == 15) {
                    var device = "galaxy_s5";
                    var width = "80%";
                } else {
                    var device = "ipad_pro";
                    var width = "50%";
                }
                if (Meta == "SoloMarco") {
                    $("#carrusel_zoom2").append('<div class="border border-warning   ">' +
                        '<img src="' + DatosJson[i].RutaImagen2 + '" class="img-fluid" alt="img">' +
                        '</div>');
                    var imagenusuario = DatosJson[i].RutaImagen2;
                } else {
                    $("#carrusel_zoom2").append('<div style="background-color:#' + DatosJson[i].Color + ';" class="border border-warning device-mockup ' + device + ' ' + orientacion + ' white ">' +
                        '<div class="device" style="background-image: url(' + DatosJson[i].RutaImagen1 + ');">' +
                        '<div class="screen " >' +
                        '<img src="' + DatosJson[i].ImagenUsuario + '" class="img-fluid foto" width="' + width + '" alt="img">' +
                        '</div>');
                    var imagenusuario = DatosJson[i].ImagenUsuario;
                }
                //console.log(DatosJson[i].RutaImagen2);
                $("#carrusel_zoom").append(
                    '<div class="col-md-6 border border-warning">' +
                    '<a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox1">' +
                    '<img class="img-fluid" src="' + DatosJson[i].RutaImagen2 + '" alt="">' +
                    '</a>' +
                    '</div>' +
                    '<div class="col-md-6 border border-warning">' +
                    '<a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox2">' +
                    '<img class="img-fluid" src="' + DatosJson[i].RutaImagen3 + '" alt="">' +
                    '</a>' +
                    '</div>' +
                    '<div class="col-md-12 border border-warning">' +
                    '<div class="device-mockup ambiente1 landscape white">' +
                    '<div class="device" style="background-image: url(/assets/img/ambiente1.jpg);">' +
                    '<div class="screen ' + orientacion + '" >' +
                    '<div style="background-color:#' + DatosJson[i].Color + ';" class="device-mockup ' + device + ' ' + orientacion + ' white ">' +
                    '<div class="device" style="background-image: url(' + DatosJson[i].RutaImagen1 + ');">' +
                    '<div class="screen " >' +
                    '<img src="' + DatosJson[i].ImagenUsuario + '" class="img-fluid" width="' + width + '" alt="img">' +
                    '</div>' +
                    '</div>' +
                    '</div>');
                ////$("#modal1").append(
                //   '<img class="img-fluid" src="' + DatosJson[i].RutaImagen2 + '" alt="img">');
                //$("#modal2").append(
                //   '<img class="img-fluid" src="' + DatosJson[i].RutaImagen3 + '" alt="img">');
                var PrecioTotal = DatosJson[i].Precio * 1.16;
                $("#Descripcion").append('<p class="last-sold text-muted"><strong>Detalles del projecto:</strong></p>' +
                    '<h4 class="product-title mb-2"> Marco: ' + DatosJson[i].Prod_Nombre + '<br> Tamaño de impresión: ' + DatosJson[i].Tamano +  '</h4>' +
                    '<h2 class="product-price display-4">$ ' + PrecioTotal.toFixed(2) + ' MXN </h2>' +
                    '<p class="text-success"><i class="fab fa-cc-mastercard"></i> <i class="fab fa-cc-visa"></i> <i class="fab fa-cc-paypal"></i></p>' +
                    '<p class="mb-0"><i class="fa fa-truck"></i> Envios a todo México</p>' +
                    '<div class="text-muted mb-2"><small>Aplica restricciones</small></div>' +
                    '<form class="form-inline">' +
                    '<div class="form-group mb-2">' +
                    '<label for="quant">Cantidad:  </label>' +
                    '<input type="number" min="1" id="inp_cant" class="form-control input-lg" value="1" placeholder="1">' +
                    '<input type="number"  id="inp_precioproducto" class="d-none" value="' + DatosJson[i].Precio + '">' +
                    '<input type="number"  id="inp_precio" class="d-none" value="' + DatosJson[i].Precio + '">' +
                    '<input type="text"  id="inp_imagen" class="d-none" value="' + imagenusuario + '">' +
                    '<input type="number"  id="inp_Tamano_ID" class="d-none" value="' + DatosJson[i].Tamano_ID + '">' +
                    '<input type="text"  id="inp_Tamano" class="d-none" value="' + DatosJson[i].Tamano + '">' +
                    '<input type="text"  id="inp_ProdNombre" class="d-none" value="' + DatosJson[i].Prod_Nombre + '">' +
                    '<input type="text"  id="inp_inv_descripcion" class="d-none">' +
                    '</div>' +
                    '</form>' +
                    '<div id="btn_descripcion">' +
                    '<button class="btn btn-primary btn-lg btn-block" onclick="cart(' + parametros.Producto + ')">Agregar al Carrito</button></div>');

            }
            var solomarco = document.getElementById("Meta").value;
            if (solomarco == "SoloMarco") {
                $("#inp_inv_descripcion").val("Solo Marco");
            } else {
                DetalleMarialuisa();
                DetalleVidrio();

            }

        }

    });
}

function Precio(valor) {
    var PrecioProducto = document.getElementById("inp_precio").value;

    var PrecioSuma = parseFloat(PrecioProducto) + parseFloat(valor);
    $("#inp_precio").val(PrecioSuma);
    var PrecioTotal = PrecioSuma * 1.16;
    $(".product-price").text('$ ' + PrecioTotal.toFixed(2) + ' MXN ');
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
            if (solomarco != "SoloMarco") {
                Marialuisa();
                Vidrio()
            }

            $("#btn_descripcion").text("");
            $("#btn_descripcion").append('<a class="nav-link" href="/Cart/"><button class="btn btn-warning btn-lg btn-block" >Ir al Carrito</button></a>');
        }
    });

}

function DetalleMarialuisa() {
    var x = document.getElementById("Marialuisa_ID").value;
    if (x != 0) {
        $.ajax({
            type: 'post',
            url: '/assets/tools/Carrito/DetalleMarialuisa.php',
            data: {
                Producto_ID: document.getElementById("Marialuisa_ID").value,
                Tamano_ID: document.getElementById("Tamano_M").value,
            },
            dataType: 'json',
            success: function (response) {
                var DatosJson = JSON.parse(JSON.stringify(response));
                $("#Descripcion").append('' +
                    '<input id="inp_ml_Nombre" class="d-none" value="' + DatosJson[0].Prod_Nombre + '" >' +
                    '<input id="inp_ml_id" class="d-none" value="' + DatosJson[0].Producto_ID + '" >' +
                    '<input id="inp_ml_imagen" class="d-none" value="' + DatosJson[0].Imagen + '" >' +
                    '<input id="inp_ml_Tamano_ID" class="d-none" value="' + DatosJson[0].Tamano_ID + '" >' +
                    '<input id="inp_ml_Tamano" class="d-none" value="' + DatosJson[0].Tamano + '" >' +
                    '<input id="inp_ml_Precio" class="d-none" value="' + DatosJson[0].Precio + '" >' +
                    '');
                $(".product-title").append('<br>' + DatosJson[0].Prod_Nombre);
                var descripcion = document.getElementById("inp_inv_descripcion").value;
                $("#inp_inv_descripcion").val(descripcion + ' ' + DatosJson[0].Prod_Nombre);
                Precio(DatosJson[0].Precio);
            }
        });
    }

}

function DetalleVidrio() {
    var Producto_ID = document.getElementById("Vidrio_F").value;
    $.ajax({
        type: 'post',
        url: '/assets/tools/Carrito/DetalleVidrio.php',
        data: {
            Producto_ID: Producto_ID,
            Tamano_ID: document.getElementById("Tamano_M").value,
        },
        dataType: 'json',
        success: function (response) {
            var DatosJson = JSON.parse(JSON.stringify(response));
            $("#Descripcion").append('' +
                '<input id="inp_vidrio_Nombre" class="d-none" value="' + DatosJson[0].Prod_Nombre + '" >' +
                '<input id="inp_vidrio_id" class="d-none" value="' + DatosJson[0].Producto_ID + '" >' +
                '<input id="inp_vidrio_imagen" class="d-none" value="' + DatosJson[0].Imagen + '" >' +
                '<input id="inp_vidrio_Tamano_ID" class="d-none" value="' + DatosJson[0].Tamano_ID + '" >' +
                '<input id="inp_vidrio_Tamano" class="d-none" value="' + DatosJson[0].Tamano + '" >' +
                '<input id="inp_vidrio_Precio" class="d-none" value="' + DatosJson[0].Precio + '" >' +
                '');
            $(".product-title").append('<br>Marialuisa: ' + DatosJson[0].Tamano + '<br>' + DatosJson[0].Prod_Nombre);
            Precio(DatosJson[0].Precio);
            var descripcion = document.getElementById("inp_inv_descripcion").value;
            //alert(descripcion);
            $("#inp_inv_descripcion").val(descripcion + ' ' + ',  Marialuisa: ' + DatosJson[0].Tamano + ' ' + DatosJson[0].Prod_Nombre);
        }
    });
}

function Marialuisa() {
    var x = document.getElementById("Marialuisa_ID").value;
    if (x != 0) {
        $.ajax({
            type: 'post',
            url: '/assets/tools/Carrito/DetalleMarialuisa.php',
            data: {
                Producto_ID: document.getElementById("Marialuisa_ID").value,
                Tamano_ID: document.getElementById("Tamano_M").value,
            },
            dataType: 'json',
            success: function (response) {
                var DatosJson = JSON.parse(JSON.stringify(response));
                $.ajax({
                    type: 'post',
                    url: '/assets/tools/Carrito/AgregarCarrito.php',
                    data: {
                        Producto: DatosJson[0].Producto_ID,
                        Prod_Nombre: DatosJson[0].Prod_Nombre,
                        Imagen: DatosJson[0].Imagen,
                        Tamano_ID: DatosJson[0].Tamano_ID,
                        Tamano: DatosJson[0].Tamano,
                        Precio: 0,
                        Cantidad: document.getElementById("inp_cant").value,
                        Meta: 'Marialuisa',
                        inv_descripcion: document.getElementById("inp_inv_descripcion").value,
                    },
                    success: function (response) {
                        console.log(response);
                        $("#btn_descripcion").text("");
                        $("#btn_descripcion").append('<a class="nav-link" href="/Cart/"><button class="btn btn-warning btn-lg btn-block" >Ir al Carrito</button></a>');
                        //document.getElementById("Cantidad_Carrito").innerHTML = response;
                    }
                });
            }
        });
    }
}

function Vidrio() {
    $.ajax({
        type: 'post',
        url: '/assets/tools/Carrito/DetalleVidrio.php',
        data: {
            Producto_ID: document.getElementById("Vidrio_F").value,
            Tamano_ID: document.getElementById("Tamano_M").value,
        },
        dataType: 'json',
        success: function (response) {
            var DatosJson = JSON.parse(JSON.stringify(response));
            console.log(DatosJson[0].Prod_Nombre);
            $.ajax({
                type: 'post',
                url: '/assets/tools/Carrito/AgregarCarrito.php',
                data: {
                    Producto: DatosJson[0].Producto_ID,
                    Prod_Nombre: DatosJson[0].Prod_Nombre,
                    Imagen: DatosJson[0].Imagen,
                    Tamano_ID: DatosJson[0].Tamano_ID,
                    Tamano: DatosJson[0].Tamano,
                    Precio: 0,
                    Cantidad: document.getElementById("inp_cant").value,
                    Meta: 'Vidrio',
                    inv_descripcion: document.getElementById("inp_inv_descripcion").value,
                },
                success: function (response) {
                    console.log(response);
                }
            });
        }
    });

}
