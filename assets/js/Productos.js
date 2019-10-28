var myVar;
$(document).ready(function () {
    myFunction();
});
$(function () {
    'use strict';

    function showActiveColor($selector) {
        var selectorId = $selector.attr('id');
        var $selected = $selector.find('.swatch.selected');
        $('#active-' + selectorId).empty()
            .text($selected.data('color'))
            .css({
                backgroundColor: $selected.css('background-color')
            });
    }

    $('.swatch-selector .swatch').click(function onClick(event) {
        $(this).addClass('selected')
            .siblings().removeClass('selected');
        var colorName = $(this).data('color');
        var color = $(this).css('background-color');
        var selectorId = $(this).closest('.swatch-selector').attr('id');
        $('.pic-1')
            .css({
                backgroundColor: color
            });
    });

    // Initialization so that you don't have to hard-code the span's
    // background-color and text to match the initial selection
    $('.swatch-selector').each(function (index, el) {
        showActiveColor($(el));
    });
});

function myFunction() {
    myVar = setTimeout(ListaProductos, 3000);
}

function ListaProductos() {
    $("#Productos").hide();
    var parametros = {
        "Tamano": document.getElementById("Tamano_ID").value
    }

    $.ajax({
        data: parametros,
        url: '/assets/tools/Productos/ListaProductos.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            //console.log(response);
            var DatosJson = JSON.parse(JSON.stringify(response));
            var giro = "-webkit-transform: rotate(-90deg);-moz-transform: rotate(-90deg);-ms-transform: rotate(-90deg);";
            //console.log(DatosJson.length);
            for (i = 0; i < DatosJson.length; i++) {
                console.log(DatosJson[i].ImagenUsuario);
                $("#Productos").append('<div class="col-md-3 col-sm-6">' +
                    '<div class="product-grid3 ">' +
                    '<div class="product-image3 ">' +
                    '<a href="#">' +
                    '<div class="pic-1 device-container" style="background-color:rgb(249, 243, 233);"> ' +
                    '<div class="device-mockup ipad_pro landscape white ">' +
                    '<div class="device" style="background-image: url(' + DatosJson[i].RutaImagen2 + ');">' +
                    '<div class="screen ">' +
                    '<img src="' + DatosJson[i].ImagenUsuario + '" class="img-fluid" width="50%" alt="img">' +
                    '</div>' +
                    '<div class="button">' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<img src="' + DatosJson[i].RutaImagen3 + '" class="mypic2 pic-2" alt="img">' +
                    '</a>' +

                    '<ul class="social">' +
                    '<li><a href="#"><i class="fa fa-shopping-bag"></i></a></li>' +
                    '<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>' +
                    '</ul>' +
                    '<span class="product-new-label">Nuevo</span>' +
                    '</div>' +
                    '<div class="product-content">' +
                    '<h3 class="title"><a href="#">' + DatosJson[i].Prod_Nombre + '</a></h3>' +
                    '<div class="price">' +
                    '$' +DatosJson[i].Precio+
                    '<span>$75.00</span>' +
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
            $("#circle").hide();
            $("#Productos").show();
        }
    });
}
