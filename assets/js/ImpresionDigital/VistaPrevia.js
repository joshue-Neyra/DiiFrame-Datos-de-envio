$(document).ready(function () {
    GetIVA();
});

function dosDecimales(n) {
    let t = n.toString();
    let regex = /(\d*.\d{0,2})/;
    return t.match(regex)[0];
}

function GetIVA() {
    $.ajax({
        type: 'post',
        url: '/assets/tools/Productos/GetIva.php',
        dataType: "json",
        success: function (response) {
            var DatosJson = JSON.parse(JSON.stringify(response));
            $("#inp_iva").val(DatosJson[0].TasaOCuota);
            DetalleProducto();
        }
    });
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

            var imagenusuario = document.getElementById("Imagen_Usuario").value;
            var ml = document.getElementById("Tamano_Marialuisa").value;
            if (ml == 15) {
                var device = "galaxy_s5";
                var width = "80%";
            } else {
                var device = "tm_35cm";
                var width = "50%";
            }
            if (DatosJson[0].Orientacion == 1) {
                orientacion_marco = "marco_portrait";
                rotar = "";

                if (ml == 15) {
                    orientacion_foto = "foto_portrait_SM";
                    $('.cartulina')
                        .css({
                            backgroundColor: ''
                        });
                } else if (ml == 14) {
                    orientacion_foto = "foto_portrait_10cm";

                } else if (ml == 13) {
                    //alert(ml);
                    orientacion_foto = "foto_portrait_5cm";

                } else if (ml == 12) {
                    orientacion_foto = "foto_portrait_3cm";

                } else {
                    orientacion_foto = "foto_portrait_3cm";
                }
            } else if (DatosJson[0].Orientacion == 2) {
                if (ml == 15) {
                    orientacion_foto = "foto_landscape_SM";
                    $('.cartulina')
                        .css({
                            backgroundColor: ''
                        });
                } else if (ml == 14) {
                    orientacion_foto = "foto_landscape_10cm";

                } else if (ml == 13) {
                    //alert(ml);
                    orientacion_foto = "foto_landscape_5cm";

                } else if (ml == 12) {
                    orientacion_foto = "foto_landscape_3cm";

                } else {
                    orientacion_foto = "foto_landscape_3cm";
                }
                orientacion_marco = "marco_landscape";
                rotar = "transform: rotate(90deg);"
            } else {
                if (ml == 15) {
                    orientacion_foto = "foto_square_SM";
                    $('.cartulina')
                        .css({
                            backgroundColor: ''
                        });
                } else if (ml == 14) {
                    orientacion_foto = "foto_square_10cm";

                } else if (ml == 13) {
                    //alert(ml);
                    orientacion_foto = "foto_square_5cm";

                } else if (ml == 12) {
                    orientacion_foto = "foto_square_3cm";

                } else {
                    orientacion_foto = "foto_square_3cm";
                }
                orientacion_marco = "marco_square";
                rotar = ""
            }
            $("#Precio_Marco").val(DatosJson[0].Precio);
            $("#carrusel_zoom2").append(
                '<div class="thumbnail box4"  id="ImagenDiv_' + DatosJson[0].Producto_ID + '" data-toggle="modal" data-target="#lightbox1">' +
                '<img src="/assets/tools/imageupload/' + imagenusuario + '" class="foto ' + orientacion_foto + '" style="z-index: 1;" />' +
                '<img src="' + DatosJson[0].RutaImagen1 + '" class="' + orientacion_marco + ' cartulina" style="background-color:#' + DatosJson[0].Color + ';' + rotar + ' "/>' +

                '</div>');

            $("#modal1").append('<div class= "pic-1" id="ImagenDiv_' + DatosJson[0].Producto_ID + '">' +
                '<img src="/assets/tools/imageupload/' + imagenusuario + '" class="foto ' + orientacion_foto + '" style="z-index: 1;" />' +
                '<img src="' + DatosJson[0].RutaImagen1 + '" class="' + orientacion_marco + ' cartulina" style="background-color:#' + DatosJson[0].Color + ';' + rotar + ' "/>' +
                '</div>');

            $("#carrusel_zoom").append(
                '<div class="col-md-6 border border-warning">' +
                '<div href="#" class="thumbnail box4" data-toggle="modal" data-target="#lightbox2">' +
                '<img class="img-fluid img-zoom" src="' + DatosJson[0].RutaImagen2 + '" alt="">' +
                '<div class="box-content ">' +
                '<h3 class = "text-center text-warning" ><i class = "fa fa-search fa-2x" > </i> </h3>' +
                '</div >' +
                '</div>' +
                '</div>' +
                '<div class="col-md-6 border border-warning">' +
                '<div href="#" class="thumbnail box4" data-toggle="modal" data-target="#lightbox3">' +
                '<img class="img-fluid img-zoom" src="' + DatosJson[0].RutaImagen3 + '" alt="">' +
                '<div class="box-content ">' +
                '<h3 class = "text-center text-warning" ><i class = "fa fa-search fa-2x" > </i> </h3>' +
                '</div >' +
                '</div>' +
                '</div>'

            );
            $("#ambiente1").append(
                '<div class="col-md-12 border border-warning">' +
                '<div class="device-mockup ambiente1 landscape white" data-toggle="modal" data-target="#lightbox4">' +
                '<div class="device" style="background-image: url(/assets/img/ambiente1.jpg);">' +
                '<div  class="screen" >' +
                '<div id="ambiente1" style=";" class="device-mockup">' +
                '<div class="device ' + orientacion_marco + '" style="background-color:#' + DatosJson[0].Color + ';background-image: url(' + DatosJson[0].RutaImagen1 + ');">' +
                '<img src="/assets/tools/imageupload/' + imagenusuario + '" class="' + orientacion_foto + '" width="" alt="img">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>');

            $("#modal2").append(
                '<img class="img-fluid" src="' + DatosJson[0].RutaImagen2 + '" alt="img">');
            $("#modal3").append(
                '<img class="img-fluid" src="' + DatosJson[0].RutaImagen3 + '" alt="img">');
            $("#modal4").append(
                
                '<div class="col-md-12 border border-warning">' +
                '<div class="device-mockup ambiente1 landscape white" data-toggle="modal" data-target="#lightbox4">' +
                '<div class="device" style="background-image: url(/assets/img/ambiente1.jpg);">' +
                '<div  class="screen" >' +
                '<div id="ambiente1" style=";" class="device-mockup">' +
                '<div class="device ' + orientacion_marco + '" style="background-color:#' + DatosJson[0].Color + ';background-image: url(' + DatosJson[0].RutaImagen1 + ');">' +
                '<img src="/assets/tools/imageupload/' + imagenusuario + '" class="' + orientacion_foto + '" width="" alt="img">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>');

            $("#Descripcion").append('<p class="last-sold text-muted"><strong>Detalles del proyecto:</strong></p>' +
                '<h4 class="product-title mb-2"> Marco: ' + DatosJson[0].Prod_Nombre + '<br> Tamaño de impresión: ' + DatosJson[0].Tamano + '</h4>' +
                '<h2 class="product-price display-4">$ ? MXN </h2>' +
                '<p class="text-success"><i class="fab fa-cc-mastercard"></i> <i class="fab fa-cc-visa"></i></p>' +
                '<p class="mb-0"><i class="fa fa-truck"></i> Envios a todo México</p>' +
                '<div class="text-muted mb-2"><small>Aplica restricciones</small></div>' +
                '<form class="form-inline">' +
                '<div class="form-group mb-2">' +
                '<label for="quant">Cantidad:  </label>' +
                '<input type="number" min="1" id="inp_cant" class="form-control input-lg" value="1" placeholder="1">' +
                '<input type="text"  id="inp_imagen" class="d-none" value="' + imagenusuario + '">' +
                '<input type="text"  id="inp_ProdNombre" class="d-none" value="' + DatosJson[0].Prod_Nombre + '">' +
                '<input type="text"  id="inp_Tamano_Impresion" class="d-none" value="' + DatosJson[0].Tamano + '">' +
                '<input type="text"  id="inp_inv_descripcion" class="d-none">' +
                '</div>' +
                '</form>' +
                '<div id="btn_descripcion">' +
                '<button class="btn btn-primary btn-lg btn-block" onclick="cart(' + parametros.Producto + ')">Agregar al Carrito</button></div>');
            PrecioMarialuisa();
            DetalleMarialuisa();
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
            Tamano_ID: document.getElementById("Tamano_ID").value,
            Tamano: document.getElementById("inp_Tamano_Impresion").value,
            Precio: document.getElementById("Subtotal").value,
            Cantidad: document.getElementById("inp_cant").value,
            Meta: document.getElementById("Meta").value,
            inv_descripcion: document.getElementById("inp_inv_descripcion").value,
        },
        success: function (response) {
            $("#Cantidad_Carrito").html(response);
            var solomarco = document.getElementById("Meta").value;
            if (solomarco != "SoloMarco") {
                Marialuisa();

            }
            $("#btn_descripcion").text("");
            $("#btn_descripcion").append('<a class="nav-link" href="/Cart/"><button class="btn btn-warning btn-lg btn-block" >Ir al Carrito</button></a>');
        }
    });

}


function PrecioFinal() {
    var P_Marco = document.getElementById("Precio_Marco").value;
    var P_Marialuisa = document.getElementById("Precio_Marialuisa").value;
    var P_Vidrio_Frontal = document.getElementById("Precio_Vidrio_Frontal").value;
    var iva_porcentaje = document.getElementById("inp_iva").value;
    var iva = parseFloat(1) + parseFloat(iva_porcentaje);
    var SubTotal = (parseFloat(P_Marco) + parseFloat(P_Marialuisa) + parseFloat(P_Vidrio_Frontal));
    var PrecioFinal = (parseFloat(P_Marco) + parseFloat(P_Marialuisa) + parseFloat(P_Vidrio_Frontal)) * iva;
    $("#Subtotal").val(SubTotal);
    $(".product-price").text("$ " + PrecioFinal.toFixed(2) + "MXN");

}

function PrecioMarialuisa() {
    var x = document.getElementById("Marialuisa_ID").value;
    if (x != 0) {
        var Id = document.getElementById("Marialuisa_ID").value;
    } else {
        var Id = 2;
    }
    var parametros = {
        Tamano_Impresion: document.getElementById("Tamano_ID").value,
        Tamano_Marialuisa: document.getElementById("Tamano_Marialuisa").value,
        Marialuisa_ID: Id

    }
    $.ajax({
        type: 'post',
        url: '/assets/tools/ImpresionDigital/PrecioMarialuisa.php',
        data: parametros,
        dataType: 'json',
        success: function (response) {
            var DatosJson = JSON.parse(JSON.stringify(response));
            //console.log(response);
            var x = DatosJson[0].Marialuisa_cm;
            var y = DatosJson[0].Ancho_Impresion;
            var z = DatosJson[0].Alto_Impresion;
            var CostoMarialuisa = DatosJson[0].CostoMarialuisa;
            var metros = ((y * z) + (y * (2 * x)) + ((2 * x) * z) + (4 * (x * x))) / 10000;
            var PrecioMarialuisa = metros * CostoMarialuisa;
            $("#Precio_Marialuisa").val(PrecioMarialuisa);

            PrecioVidrioFrontal();
        }
    });
}

function PrecioVidrioFrontal() {
    var parametros = {
        Tamano_Impresion: document.getElementById("Tamano_ID").value,
        Tamano_Marialuisa: document.getElementById("Tamano_Marialuisa").value,
        Marialuisa_ID: document.getElementById("Vidrio_F").value, //vidrio Frontal

    }
    $.ajax({
        type: 'post',
        url: '/assets/tools/ImpresionDigital/PrecioMarialuisa.php',
        data: parametros,
        dataType: 'json',
        success: function (response) {
            var DatosJson = JSON.parse(JSON.stringify(response));
            //console.log(response);
            var x = DatosJson[0].Marialuisa_cm;
            var y = DatosJson[0].Ancho_Impresion;
            var z = DatosJson[0].Alto_Impresion;
            var CostoVidrioFrontal = DatosJson[0].CostoMarialuisa;
            var metros = ((y * z) + (y * (2 * x)) + ((2 * x) * z) + (4 * (x * x))) / 10000;
            var PrecioVidrio = metros * CostoVidrioFrontal;
            $("#Precio_Vidrio_Frontal").val(PrecioVidrio);
            PrecioFinal();
        }
    });

}

function DetalleMarialuisa() {
    var x = document.getElementById("Marialuisa_ID").value;
    if (x != 0) {
        var Id = document.getElementById("Marialuisa_ID").value;
    } else {
        var Id = 2;
    }
    $.ajax({
        type: 'post',
        url: '/assets/tools/Carrito/DetalleMarialuisa.php',
        data: {
            Producto_ID: Id,
            Tamano_ID: document.getElementById("Tamano_Marialuisa").value,
        },
        dataType: 'json',
        success: function (response) {
            console.log(response);
            var DatosJson = JSON.parse(JSON.stringify(response));
            if (DatosJson[0].Prod_Nombre == "Vidrio Normal") {
                $(".product-title").append('<br>Entre Vidrios <br>' + DatosJson[0].Tamano);
                var descripcion = document.getElementById("inp_inv_descripcion").value;
                //alert(descripcion);
                $("#inp_inv_descripcion").val(descripcion + ',  Marialuisa: ' + DatosJson[0].Tamano + ' Entre Vidrios');
                $("#Nombre_Marialuisa").val(DatosJson[0].Prod_Nombre);
            } else {
                $(".product-title").append('<br>' + DatosJson[0].Prod_Nombre + '<br>' + DatosJson[0].Tamano);
                var descripcion = document.getElementById("inp_inv_descripcion").value;
                //alert(descripcion);
                $("#inp_inv_descripcion").val(descripcion + ',  Marialuisa: ' + DatosJson[0].Tamano + ' ' + DatosJson[0].Prod_Nombre);
                $("#Nombre_Marialuisa").val(DatosJson[0].Prod_Nombre);
                $("#Nombre_Tamano_Marialuisa").val(DatosJson[0].Tamano);
            }

            DetalleVidrio();
        }
    });
}

function DetalleVidrio() {
    $.ajax({
        type: 'post',
        url: '/assets/tools/Carrito/DetalleMarialuisa.php',
        data: {
            Producto_ID: document.getElementById("Vidrio_F").value,
            Tamano_ID: document.getElementById("Tamano_Marialuisa").value,
        },
        dataType: 'json',
        success: function (response) {
            console.log(response);
            var DatosJson = JSON.parse(JSON.stringify(response));
            $(".product-title").append('<br>' + DatosJson[0].Prod_Nombre);
            var descripcion = document.getElementById("inp_inv_descripcion").value;
            //alert(descripcion);
            $("#inp_inv_descripcion").val(descripcion + ', ' + DatosJson[0].Prod_Nombre);
            $("#Nombre_Vidrio").val(DatosJson[0].Prod_Nombre);
        }
    });
}

function Marialuisa() {
    var x = document.getElementById("Marialuisa_ID").value;
    if (x != 0) {
        var Id = document.getElementById("Marialuisa_ID").value;
        var meta = 'Marialuisa';
    } else {
        var Id = 2;
        var meta = "Vidrio";
    }
    $.ajax({
        type: 'post',
        url: '/assets/tools/Carrito/AgregarCarrito.php',
        data: {
            Producto: Id,
            Prod_Nombre: document.getElementById("Nombre_Marialuisa").value,
            Imagen: 'Marialuisa',
            Tamano_ID: document.getElementById("Tamano_Marialuisa").value,
            Tamano: document.getElementById("Nombre_Tamano_Marialuisa").value,
            Precio: 0,
            Cantidad: document.getElementById("inp_cant").value,
            Meta: meta,
            inv_descripcion: document.getElementById("inp_inv_descripcion").value,
        },
        success: function (response) {
            console.log(response);
            Vidrio();
            //document.getElementById("Cantidad_Carrito").innerHTML = response;
        }
    });


}

function Vidrio() {
    $.ajax({
        type: 'post',
        url: '/assets/tools/Carrito/AgregarCarrito.php',
        data: {
            Producto: document.getElementById("Vidrio_F").value,
            Prod_Nombre: document.getElementById("Nombre_Vidrio").value,
            Imagen: 'Vidrio',
            Tamano_ID: document.getElementById("Tamano_Marialuisa").value,
            Tamano: document.getElementById("Nombre_Tamano_Marialuisa").value,
            Precio: 0,
            Cantidad: document.getElementById("inp_cant").value,
            Meta: 'Vidrio',
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
