$(document).ready(function () {
    ListaProductos();
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
                    '<a href="#">' +
                    '<img class="pic-1" src="' + DatosJson[i].RutaImagen2 +'">' +
                    '<img class="pic-2" src="' + DatosJson[i].RutaImagen3 +'">' +
                    '</a>' +
                    '<ul class="social">' +
                    '<li><a href="#"><i class="fa fa-shopping-bag"></i></a></li>' +
                    '<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>' +
                    '</ul>' +
                    '<span class="product-new-label">Nuevo</span>' +
                    '</div>' +
                    '<div class="product-content">' +
                    '<h3 class="title"><a href="#">Mens Blazer</a></h3>' +
                    '<div class="price">' +
                    '$' + DatosJson[i].Precio +
                    '<span>Desde</span>' +
                    '</div>' +
                    '<ul class="rating">' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star disable"></li>' +
                    '<li class="fa fa-star disable"></li>' +
                    '</ul>' +
                    '</div>' +
                    '</div>' +
                    '</div>');
            }
        }
    });
}
