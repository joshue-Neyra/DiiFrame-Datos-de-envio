var myVar;
$(document).ready(function () {
    //ListaProductos();
    Marialuisa();
    TamanosMarialuisa();
    $(".loader").hide();

});


function ListaProductos(bg) {
    var parametros = {
        "Tamano": document.getElementById("Tamano_ID").value
    }

    $.ajax({
        data: parametros,
        url: '/assets/tools/Productos/ListaProductos.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            //$("#Productos").text("");
            var DatosJson = JSON.parse(JSON.stringify(response));
            var orientacion_foto = "";
            var orientacion_marco = "";
            var rotar = "";
            for (i = 0; i < DatosJson.length; i++) {
                //console.log(DatosJson[i].ImagenUsuario);
                if (DatosJson[i].Orientacion == 1) {
                    orientacion_foto = "foto_portrait_3cm";
                    orientacion_marco = "marco_portrait";
                    rotar = "";
                } else if (DatosJson[i].Orientacion == 2) {
                    orientacion_foto = "foto_landscape_3cm";
                    orientacion_marco = "marco_landscape";
                    rotar = "transform: rotate(90deg);"
                } else {
                    orientacion_foto = "foto_square_3cm";
                    orientacion_marco = "marco_square";
                    rotar = ""
                }
                var imagenusuario = document.getElementById("Imagen_Usuario").value;
                $("#Productos").append('<div class="col-md-4 col-sm-6">' +
                    '<div class="product-grid3">' +
                    '<div class="product-image3">' +
                    '<a href="#" onclick="Redireccion(' + DatosJson[i].Producto_ID + ',' + DatosJson[i].Tamano_ID + ');">' +
                    '<div class="pic-1" id="ImagenDiv_' + DatosJson[i].Producto_ID + '"> ' +
                    '<img src="' + imagenusuario + '" class="foto ' + orientacion_foto + '" />' +
                    '<img src="' + DatosJson[i].RutaImagen1 + '" class="' + orientacion_marco + ' cartulina" style="background-color:#' + bg + ';' + rotar + '"/>' +
                    '</div>' +
                    '<img class="mypic2 pic-2" src="' + DatosJson[i].RutaImagen3 + '">' +
                    '</a>' +
                    '<ul class="social">' +
                    '<li><a href="#"><i class="fa fa-shopping-bag"></i></a></li>' +
                    '<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>' +
                    '</ul>' +
                    '<span class="product-new-label">New</span>' +
                    '</div>' +

                    '<div class="product-content">' +
                    '<h3 class="title"></h3 > ' +
                    '<div class="price">' +
                    '' + DatosJson[i].Prod_Nombre +
                    '</div>' +
                    '<ul class="rating">' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '</ul>' +
                    '</div>' +
                    '</div>');
            }
            $('.ml').first().click();
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
            $("#form_vidrios").text("");
            $("#form_entrevidrios").text("");
            var sw = 1;
            var sw2 = 0;

            $("#Color").val(DatosJson[0].Producto_ID);
            for (i = 0; i < DatosJson.length; i++) {
                if (DatosJson[i].PrdMeta_ID != 'Vidrio') {
                    if (sw == 1) {
                        $("#form_marialuisa").append('<div id=' + DatosJson[i].Producto_ID + ' class="swatch ml selected" style="background-color:#' + DatosJson[i].Prod_Descripcion + ';"></div>');
                        var bg = DatosJson[i].Prod_Descripcion;
                        sw = 0;
                    } else {
                        $("#form_marialuisa").append('<div id=' + DatosJson[i].Producto_ID + ' class="swatch ml  border border-primary" style="background-color:#' + DatosJson[i].Prod_Descripcion + ';"></div>');
                    }
                } else {
                    if (sw2 == 1) {
                        $("#form_vidrios").append('<div class="custom-control custom-switch m-3">' +
                            '<input type="checkbox" class="custom-control-input" id=' + DatosJson[i].Producto_ID + '>' +
                            '<label class="custom-control-label" for=' + DatosJson[i].Producto_ID + '>' + DatosJson[i].Prod_Descripcion + '</label>' +
                            '</div>');

                    } else {
                        $("#form_vidrios").append('<div class="custom-control custom-switch m-3">' +
                            '<input type="checkbox" class="custom-control-input" checked id=' + DatosJson[i].Producto_ID + '>' +
                            '<label class="custom-control-label" for=' + DatosJson[i].Producto_ID + '>' + DatosJson[i].Prod_Descripcion + '</label>' +
                            '</div>');
                        sw2 = 1;
                        $("#input_vidrio_f").val(DatosJson[i].Producto_ID);
                    }
                }


            }
            $("#form_entrevidrios").append('<div id="Vidrio" class="swatch border border-primary text-center" style="background-color:#fff;"><img class="img-fluid" src="/assets/img/vidrio.png"></div>');

            $('.custom-control-input').click(function onClick(event) {
                //alert("algo");
                $('.custom-control-input').prop("checked", false);
                $(this).prop("checked", true);
                var selectorvidrioId = $(this).attr('id');
                $("#input_vidrio_f").val(selectorvidrioId);
            });
            $('#Vidrio').click(function onClick(event) {
                //alert("algo");
                $('#input_vidrio_t').val('true');
                $("#Color").val(0);
                $(".ml").removeClass('selected').addClass('border border-primary');
                $(this).removeClass('border border-primary').addClass('selected');
                $('.cartulina')
                    .css({
                        backgroundColor: ''
                    });
            });
            $('.ml').click(function onClick(event) {
                $(this).removeClass('border border-primary').siblings().addClass('border border-primary');
                $(this).addClass('selected')
                    .siblings().removeClass('selected');
                $('#Vidrio').addClass('border border-primary').removeClass('selected');
                var colorName = $(this).data('color');
                var color = $(this).attr('style').split(';').filter(item => item.startsWith('background-color'))[0].split(":")[1].replace(/\s/g, '');
                var selectorId = $(this).attr('id');


                if (selectorId != 'Vidrio') {
                    $("#Color").val(selectorId);
                    $('#input_vidrio_t').val('false');
                    $('.cartulina')
                        .css({
                            backgroundColor: color
                        });
                }
            });
            ListaProductos(bg);
        }
    });

}

function Redireccion(Producto, Tamano) {
    var Tm = document.getElementById('Tamano_Marialuisa').value;
    var color = document.getElementById('Color').value;
    var vidrio_t = document.getElementById('input_vidrio_t').value;
    var vidrio_f = document.getElementById('input_vidrio_f').value;
    location.href = '/build/ImpresionDigital/VistaPrevia/?prod=' + Producto + '&tamano=' + Tamano + '&TM=' + Tm + '&VT=' + vidrio_t + '&VF=' + vidrio_f + '&Color=' + color + '&Meta=Impresion';
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
        var orientacion = document.getElementById("Imagen_Orientacion").value;
        if (orientacion == 1) {
            if (selectorId == 'Sin Marialuisa') {
                //alert(selectorId);
                $(".foto").removeClass("foto_portrait_3cm foto_portrait_5cm foto_portrait_10cm");
                $(".foto").addClass("foto_portrait_SM");
                $(".ml").hide();
                $("#form_marialuisa2").hide();
                $('#Vidrio').click();
            } else if (selectorId == '10 cm') {
                //alert(selectorId);
                $(".foto").removeClass("foto_portrait_3cm foto_portrait_5cm foto_portrait_10cm foto_portrait_SM");
                $(".foto").addClass("foto_portrait_10cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();

            } else if (selectorId == '5 cm') {
                //alert(selectorId);
                $(".foto").removeClass("foto_portrait_3cm foto_portrait_5cm foto_portrait_10cm foto_portrait_SM");
                $(".foto").addClass("foto_portrait_5cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();

            } else if (selectorId == '3.5 cm') {
                //alert(selectorId);
                $(".foto").removeClass("foto_portrait_3cm foto_portrait_5cm foto_portrait_10cm foto_portrait_SM");
                $(".foto").addClass("foto_portrait_3cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();

            } else {
                //alert(selectorId);
                $(".foto").removeClass("foto_portrait_3cm foto_portrait_5cm foto_portrait_10cm foto_portrait_SM");
                $(".foto").addClass("foto_portrait_3cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();
            }

        } 
        else if (orientacion == 2) {
            if (selectorId == 'Sin Marialuisa') {
                //alert(selectorId);
                $(".foto").removeClass("foto_landscape_3cm foto_landscape_5cm foto_landscape_10cm");
                $(".foto").addClass("foto_landscape_SM");
                $(".ml").hide();
                $("#form_marialuisa2").hide();
                $('#Vidrio').click();
            } else if (selectorId == '10 cm') {
                //alert(selectorId);
                $(".foto").removeClass("foto_landscape_3cm foto_landscape_5cm foto_landscape_10cm foto_landscape_SM");
                $(".foto").addClass("foto_landscape_10cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();

            } else if (selectorId == '5 cm') {
                //alert(selectorId);
                $(".foto").removeClass("foto_landscape_3cm foto_landscape_5cm foto_landscape_10cm foto_landscape_SM");
                $(".foto").addClass("foto_landscape_5cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();

            } else if (selectorId == '3.5 cm') {
                //alert(selectorId);
                $(".foto").removeClass("foto_landscape_3cm foto_landscape_5cm foto_landscape_10cm foto_landscape_SM");
                $(".foto").addClass("foto_landscape_3cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();

            } else {
                //alert(selectorId);
                $(".foto").removeClass("foto_landscape_3cm foto_landscape_5cm foto_landscape_10cm foto_landscape_SM");
                $(".foto").addClass("foto_landscape_3cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();
            }
        }
        else {
            if (selectorId == 'Sin Marialuisa') {
                //alert(selectorId);
                $(".foto").removeClass("foto_square_3cm foto_square_5cm foto_square_10cm");
                $(".foto").addClass("foto_square_SM");
                $(".ml").hide();
                $("#form_marialuisa2").hide();
                $('#Vidrio').click();
            } else if (selectorId == '10 cm') {
                //alert(selectorId);
                $(".foto").removeClass("foto_square_3cm foto_square_5cm foto_square_10cm foto_square_SM");
                $(".foto").addClass("foto_square_10cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();

            } else if (selectorId == '5 cm') {
                //alert(selectorId);
                $(".foto").removeClass("foto_square_3cm foto_square_5cm foto_square_10cm foto_square_SM");
                $(".foto").addClass("foto_square_5cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();

            } else if (selectorId == '3.5 cm') {
                //alert(selectorId);
                $(".foto").removeClass("foto_square_3cm foto_square_5cm foto_square_10cm foto_square_SM");
                $(".foto").addClass("foto_square_3cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();

            } else {
                //alert(selectorId);
                $(".foto").removeClass("foto_square_3cm foto_square_5cm foto_square_10cm foto_square_SM");
                $(".foto").addClass("foto_square_3cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();
            }
        }

    });

}).trigger("change");
