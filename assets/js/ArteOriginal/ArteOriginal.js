$(document).ready(function () {
    GetIVA();

    //ProdFamilias();
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
            ListaProductos();
        }
    });
}


function ListaProductos() {
    var parametros = "";

    $.ajax({
        data: parametros,
        url: '/assets/tools/ArteOriginal/ListaProductos.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            //console.log(response);
            var DatosJson = JSON.parse(JSON.stringify(response));
            console.log(DatosJson.length);
            var iva_porcentaje = document.getElementById("inp_iva").value;
            var iva = parseFloat(1) + parseFloat(iva_porcentaje);
            for (i = 0; i < DatosJson.length; i++) {
                var precio = parseFloat(DatosJson[i].Prod_Precio) * parseFloat(iva);
                if (DatosJson[i].Existencia > 0) {
                    $("#Productos").append('<div class="col-md-3 col-sm-6 my-3">' +
                        '<div class="product-grid3 disabled">' +
                        '<div class="product-image3">' +
                        '<a disabled href="/build/ArteOriginal/VistaPrevia/?Prd_ID=' + DatosJson[i].Producto_ID + '&Meta=ArteOriginal">' +
                        '<img class="pic-1 img-fluid foto" src="' + DatosJson[i].RutaImagen2 + '">' +
                        '<img class="mypic2 pic-2"  src="' + DatosJson[i].RutaImagen3 + '">' +
                        '</a>' +
                        '<ul class="social">' +
                        '<li class=""><a href="/build/ArteOriginal/VistaPrevia/?Prd_ID=' + DatosJson[i].Producto_ID + '&Meta=ArteOriginal"><i class="fa fa-shopping-bag"></i></a></li>' +
                        '</ul>' +
                        '<span class="product-new-label">Nuevo</span>' +
                        '</div>' +
                        '<div class="product-content">' +
                        '<h3 class="title"><a href="/build/ArteOriginal/VistaPrevia/?Prd_ID=' + DatosJson[i].Producto_ID + '&Meta=ArteOriginal">' + DatosJson[i].Prod_Nombre + '</a></h3>' +
                        '<div class="price">' +
                        '$' + precio.toFixed(2) +
                        '<span></span>' +
                        '</div>' +
                        '<ul class="rating">' +
                        '<li class="fa fa-star"></li>' +
                        '<li class="fa fa-star"></li>' +
                        '<li class="fa fa-star"></li>' +
                        '<li class="fa fa-star"></li>' +
                        '<li class="fa fa-star "></li>' +
                        '</ul>' +
                        '</div>' +
                        '</div>' +
                        '</div>');
                } else {
                    $("#Productos").append('<div class="col-md-3 col-sm-6 my-3 disabled">' +
                        '<div class="product-grid3">' +
                        '<div class="product-image3">' +
                        '<a  >' +
                        '<img class="pic-1 img-fluid foto" src="' + DatosJson[i].RutaImagen2 + '">' +
                        '<img class="mypic2 pic-2"  src="' + DatosJson[i].RutaImagen3 + '">' +
                        '</a>' +
                        '<span class="product-agotado-label">Agotado</span>' +
                        '</div>' +
                        '<div class="product-content">' +
                        '<h3 class="title"><a>' + DatosJson[i].Prod_Nombre + '</a></h3>' +
                        '<div class="price">' +
                        '$' + precio.toFixed(2) +
                        '<span></span>' +
                        '</div>' +
                        '<ul class="rating">' +
                        '<li class="fa fa-star"></li>' +
                        '<li class="fa fa-star"></li>' +
                        '<li class="fa fa-star"></li>' +
                        '<li class="fa fa-star"></li>' +
                        '<li class="fa fa-star "></li>' +
                        '</ul>' +
                        '</div>' +
                        '</div>' +
                        '</div>');
                }

            }
        }
    });
}

function ProdFamilias() {
    $.ajax({
        url: '/assets/tools/Productos/ProdFamilias.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            var DatosJson = JSON.parse(JSON.stringify(response));
            $("#Filtro_Familia").text("");
            for (i = 0; i < DatosJson.length; i++) {
                $("#Filtro_Familia").append('<li class="breadcrumb-item active" onclick="FiltroFamilia(' + DatosJson[i].Familia_ID + ')">' + DatosJson[i].Familia +
                    '</li>')
            }
        }


    });

}

function FiltroFamilia(Familia_ID) {
    $("#Productos").text("");
    var parametros = {
        "Familia_ID": Familia_ID
    }
    $.ajax({
        data: parametros,
        url: '/assets/tools/Productos/ListaFiltroIndex.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            $("#Productos").text("");
            var DatosJson = JSON.parse(JSON.stringify(response));
            for (i = 0; i < DatosJson.length; i++) {
                //console.log(DatosJson[i].ImagenUsuario);
                $("#Productos").append('<div class="col-md-3 col-sm-6">' +
                    '<div class="product-grid3">' +
                    '<div class="product-image3">' +
                    '<a href="/Productos/ElegirTamano/?Prd_ID=' + DatosJson[i].Producto_ID + '">' +
                    '<img class="pic-1" src="' + DatosJson[i].RutaImagen2 + '">' +
                    '<img class="pic-2" src="' + DatosJson[i].RutaImagen3 + '">' +
                    '</a>' +
                    '<ul class="social">' +
                    '<li><a href="/Productos/ElegirTamano/?Prd_ID=' + DatosJson[i].Producto_ID + '"><i class="fa fa-shopping-bag"></i></a></li>' +
                    '</ul>' +
                    '<span class="product-new-label">Nuevo</span>' +
                    '</div>' +
                    '<div class="product-content">' +
                    '<h3 class="title"><a href="/Productos/ElegirTamano/?Prd_ID=' + DatosJson[i].Producto_ID + '"></a></h3>' +
                    '<div class="price">' +
                    '' + DatosJson[i].Prod_Nombre +
                    '<span></span>' +
                    '</div>' +
                    '<ul class="rating">' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '</ul>' +
                    '</div>' +
                    '</div>' +
                    '</div>');
            }
        }


    });

}
