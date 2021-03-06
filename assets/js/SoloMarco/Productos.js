$(document).ready(function () {
    ListaProductos();
    ProdFamilias();
});

function ListaProductos() {
    var parametros = "";

    $.ajax({
        data: parametros,
        url: '/assets/tools/Productos/Lista2.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            //console.log(response);
            var DatosJson = JSON.parse(JSON.stringify(response));
            console.log(DatosJson.length);

            for (i = 0; i < DatosJson.length; i++) {
                $("#Productos").append('<div class="col-md-3 col-sm-6">' +
                    '<div class="product-grid3">' +
                    '<div class="product-image3">' +
                    '<a href="/Productos/ElegirTamano/?Prd_ID='+DatosJson[i].Producto_ID +'">' +
                    '<img class="pic-1" src="' + DatosJson[i].RutaImagen2 +'">' +
                    '<img class="pic-2" src="' + DatosJson[i].RutaImagen3 +'">' +
                    '</a>' +
                    '<ul class="social align-self-center">' +
                    '<li><a href="/Productos/ElegirTamano/?Prd_ID='+DatosJson[i].Producto_ID +'"><i class="fa fa-shopping-bag"></i></a></li>' +
                    '</ul>' +
                    '<span class="product-new-label">Nuevo</span>' +
                    '</div>' +
                    '<div class="product-content">' +
                    '<h3 class="title"><a href="/Productos/ElegirTamano/?Prd_ID='+DatosJson[i].Producto_ID +'"></a></h3>' +
                    '<div class="price">' +
                    '' + DatosJson[i].Prod_Nombre +
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
                    '<a href="/Productos/ElegirTamano/?Prd_ID='+DatosJson[i].Producto_ID +'">' +
                    '<img class="pic-1" src="' + DatosJson[i].RutaImagen2 +'">' +
                    '<img class="pic-2" src="' + DatosJson[i].RutaImagen3 +'">' +
                    '</a>' +
                    '<ul class="social">' +
                    '<li><a href="/Productos/ElegirTamano/?Prd_ID='+DatosJson[i].Producto_ID +'"><i class="fa fa-shopping-bag"></i></a></li>' +
                    '</ul>' +
                    '<span class="product-new-label">Nuevo</span>' +
                    '</div>' +
                    '<div class="product-content">' +
                    '<h3 class="title"><a href="/Productos/ElegirTamano/?Prd_ID='+DatosJson[i].Producto_ID +'"></a></h3>' +
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
