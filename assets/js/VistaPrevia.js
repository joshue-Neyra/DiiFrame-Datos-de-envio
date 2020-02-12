$(document).ready(function () {
    Producto();
});

function dosDecimales(n) {
    let t = n.toString();
    let regex = /(\d*.\d{0,2})/;
    return t.match(regex)[0];
}

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
            var orientacion = "";
            var Color = document.getElementById("Color").value;
            for (i = 0; i < DatosJson.length; i++) {

                //console.log(DatosJson[i].RutaImagen2);
                $("#carrusel_zoom").append(
                    '<div class="col-md-4 border border-warning">' +
                    '<a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox1">' +
                    '<img class="img-fluid" src="' + DatosJson[i].RutaImagen2 + '" alt="">' +
                    '</a>' +
                    '</div>' +
                    '<div class="col-md-4 border border-warning">' +
                    '<a href="#" class="thumbnail" data-toggle="modal" data-target="#lightbox2">' +
                    '<img class="img-fluid" src="' + DatosJson[i].RutaImagen3 + '" alt="">' +
                    '</a>' +
                    '</div>');
                if (DatosJson[i].Orientacion == 1) {
                    orientacion = "portrait";
                } else {
                    orientacion = "landscape";
                }
                $("#carrusel_zoom2").append('<div style="background-color:' + Color + ';" class="border border-warning device-mockup ipad_pro ' + orientacion + ' white ">' +
                    '<div class="device" style="background-image: url(' + DatosJson[i].RutaImagen1 + ');">' +
                    '<div class="screen " >' +
                    '<img src="' + DatosJson[i].ImagenUsuario + '" class="img-fluid" width="50%" alt="img">' +
                    '</div>');


                $("#modal1").append(
                    '<img class="img-fluid" src="' + DatosJson[i].RutaImagen2 + '" alt="img">');
                $("#modal2").append(
                    '<img class="img-fluid" src="' + DatosJson[i].RutaImagen3 + '" alt="img">');
                $("#Descripcion").append('<p class="last-sold text-muted"><small>145 articulos vendidos</small></p>' +
                    '<h4 class="product-title mb-2">' + DatosJson[i].Prod_Nombre + ' - ' + DatosJson[i].Prod_Descripcion + ' - ' + DatosJson[i].Tamano + '"' + '</h4>' +
                    '<h2 class="product-price display-4">$ ' + dosDecimales(DatosJson[i].Precio) + ' MXN </h2>' +
                    '<p class="text-success"><i class="fab fa-cc-mastercard"></i> <i class="fab fa-cc-visa"></i> <i class="fab fa-cc-paypal"></i></p>' +
                    '<p class="mb-0"><i class="fa fa-truck"></i> Envios solo a CDMX</p>' +
                    //'<div class="text-muted mb-2"><small>Aplica restricciones</small></div>' +
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
                    '<div id="btn_descripcion">' +
                    '<button class="btn btn-primary btn-lg btn-block" onclick="cart(' + parametros.Producto + ')">Agregar al Carrito</button></div>');
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
            Meta: document.getElementById("Meta").value,
        },
        success: function (response) {

            $("#Cantidad_Carrito").html(response);
            Marialuisa();
            Vidrio()
            $("#btn_descripcion").text("");
            $("#btn_descripcion").append('<a class="nav-link" href="/Cart/"><button class="btn btn-warning btn-lg btn-block" >Ir al Carrito</button></a>');
        }
    });

}

function Marialuisa() {
    var ML = document.getElementById("Color").value;
    if (ML != 'None') {
        $.ajax({
            type: 'post',
            url: '/assets/tools/Carrito/AgregarMarialuisa.php',
            data: {
                Prod_Nombre: document.getElementById("Color").value,
                Tamano_ID: document.getElementById("Tamano_M").value,
                Precio: 0,
                Cantidad: document.getElementById("inp_cant").value,
            },
            dataType: 'json',
            success: function (response) {
                var DatosJson = JSON.parse(JSON.stringify(response));
                //console.log(response);
                //console.log(DatosJson[0].Prod_Nombre);
                $.ajax({
                    type: 'post',
                    url: '/assets/tools/Carrito/AgregarCarrito.php',
                    data: {
                        Producto: DatosJson[0].Producto_ID,
                        Prod_Nombre: DatosJson[0].Prod_Nombre,
                        Imagen: DatosJson[0].Imagen,
                        Tamano_ID: DatosJson[0].Tamano_ID,
                        Tamano: DatosJson[0].Tamano,
                        Precio: DatosJson[0].Precio,
                        Cantidad: DatosJson[0].Cantidad,
                        Meta: 'Marialuisa',
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
    var Vidrio = document.getElementById("Vidrio").value;
    if (Vidrio =='true') {
        $.ajax({
            type: 'post',
            url: '/assets/tools/Carrito/AgregarVidrio.php',
            data: {
                Prod_Nombre: 'Vidrio'
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
                        Imagen: 'none',
                        Tamano_ID: '0',
                        Tamano: 0,
                        Precio: 0,
                        Cantidad: document.getElementById("inp_cant").value,
                    },
                    success: function (response) {
                        console.log(response);
                    }
                });
            }
        });
    }

}
