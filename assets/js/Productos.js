var myVar;
$(document).ready(function () {
    ListaProductos();
    Marialuisa();
    TamanosMarialuisa();
    $(".loader").hide();

});


function ListaProductos() {
    var parametros = {
        "Tamano": document.getElementById("Tamano_ID").value
    }

    $.ajax({
        data: parametros,
        url: '/assets/tools/Productos/ListaProductos.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            $("#Productos").text("");
            var DatosJson = JSON.parse(JSON.stringify(response));
            var orientacion = "";
            for (i = 0; i < DatosJson.length; i++) {
                //console.log(DatosJson[i].ImagenUsuario);
                if (DatosJson[i].Orientacion == 1) {
                    orientacion = "portrait";
                } else {
                    orientacion = "landscape";
                }
                $("#Productos").append('<div class="col-md-3 col-sm-6">' +
                    '<div class="product-grid3 ">' +
                    '<div class="product-image3 ">' +
                    '<a href="#" onclick="Redireccion(' + DatosJson[i].Producto_ID + ',' + DatosJson[i].Tamano_ID + ');">' +
                    '<div class="pic-1 device-container" style="background-color:#' + ';' +
                    ' id="ImagenDiv_' + DatosJson[i].Producto_ID + '"> ' +
                    '<div class="device-mockup ipad_pro ' + orientacion + ' white ">' +
                    '<div class="device" style="background-image: url(' + DatosJson[i].RutaImagen1 + ');">' +
                    '<div class="screen ">' +
                    '<img src="' + DatosJson[i].ImagenUsuario + '" class="img-fluid foto" width="50%" alt="img">' +
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
                    '<h3 class="title"><a href="#">' + '</a></h3>' +
                    '<div class="price">' +
                    '' + DatosJson[i].Prod_Nombre +
                    '</div>' +
                    '<ul class="rating">' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star "></li>' +
                    '<li class="fa fa-star "></li>' +
                    '</ul>' +
                    '</div>' +
                    '</div>' +
                    '</div>');
            }
        }
    });
}

function Marialuisa() {
    $.ajax({
        url: '/assets/tools/Productos/MariaLuisa.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            var DatosJson = JSON.parse(JSON.stringify(response));
            $("#form_marialuisa").text("");
            var sw = 1;
            for (i = 0; i < DatosJson.length; i++) {
                if (DatosJson[i].Prod_Nombre == "Vidrio") {
                    $("#form_marialuisa").append('<div id="Vidrio" title="Vidrio" data-toggle="popover" data-trigger="hover" data-content="Entre Vidrios" class="swatch border border-primary text-center" style="background-color:#fff;"><img class="img-fluid" src="/assets/img/vidrio.png"></div>');
                    $('#Vidrio').popover({
                        container: 'body'
                    });
                    $('#Vidrio').click(function onClick(event) {
                        var input_vidrio = document.getElementById("input_vidrio").value;
                        if (input_vidrio == 'true') {
                            $('#Vidrio').removeClass('selected');
                            $('#Vidrio').addClass('border border-primary');
                            $('.screen').removeClass("brillo");
                            $("#input_vidrio").val('false');
                        } else {
                            $('#Vidrio').removeClass('border border-primary');
                            $('#Vidrio').addClass('selected');

                            $('.screen').addClass("brillo");
                            $("#input_vidrio").val('true');
                        }

                    });
                } else {
                    $("#form_marialuisa").append('<div id=' + DatosJson[i].Producto_ID + ' class="swatch ml border border-primary" style="background-color:#' + DatosJson[i].Prod_Nombre + ';"></div>');
                }

            }

            $('.ml').click(function onClick(event) {
                var selectorId = $(this).attr('id');
                var color = document.getElementById("Color").value;

                var x1 = color.toString();
                var x2 = selectorId.toString();
                if (x1 == x2) {
                    $("#Color").val('0');
                    $(this).removeClass('selected');
                    $(this).addClass('border border-primary');
                    ListaProductos();
                } else {
                    var colorName = $(this).data('color');
                    var color = $(this).attr('style').split(';').filter(item => item.startsWith('background-color'))[0].split(":")[1].replace(/\s/g, '');
                    $('.ml').removeClass('selected');
                    $('.ml').addClass('border border-primary');

                    $(this).removeClass('border border-primary').addClass('selected');
                    $('.pic-1')
                        .css({
                            backgroundColor: color
                        });
                    $("#Color").val(selectorId);
                }


            });


        }
    });

}

function Redireccion(Producto, Tamano) {
    var Tm = document.getElementById('Tamano_Marialuisa').value;
    var color = document.getElementById('Color').value;
    var Vidrio = document.getElementById('input_vidrio').value;
    location.href = '/VistaPrevia/?prod=' + Producto + '&tamano=' + Tamano + '&TM=' + Tm + '&Vidrio=' + Vidrio + '&Color=' + color + '&Meta=Impresion';
    //alert(Producto+", "+Tamano);
    //
}

function TamanosMarialuisa() {
    $.ajax({
        url: '/assets/tools/Productos/TamanosMarialuisa.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            var DatosJson = JSON.parse(JSON.stringify(response));
            $("#Tamano_Marialuisa").text("");
            for (i = 0; i < DatosJson.length; i++) {
                $("#Tamano_Marialuisa").append('<option id="' + DatosJson[i].Tamano + '" value="' + DatosJson[i].Tamano_ID + '">' + DatosJson[i].Tamano + ' </option>')
            }
        }
    });
}

$("#Tamano_Marialuisa").change(function () {
    $("select option:selected").each(function () {
        var selectorId = $(this).attr('id');
        if (selectorId == 'SinMarialuisa') {
            $(".device-mockup").removeClass("ipad_pro");
            $(".device-mockup").addClass("galaxy_s5");
            $(".foto").width("80%");
            $(".ml").hide();
            $("#Color").val('0');
        } else {
            $(".device-mockup").removeClass("galaxy_s5");
            $(".device-mockup").addClass("ipad_pro");
            $(".foto").width("50%");
            Marialuisa();
            $(".ml").show();

        }
    });

}).trigger("change");
