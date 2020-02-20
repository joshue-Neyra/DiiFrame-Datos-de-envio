var myVar;
$(document).ready(function () {
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
            $("#Productos").text("");
            var DatosJson = JSON.parse(JSON.stringify(response));
            var orientacion = "";
            $("#Color").val(bg);
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
                    '<div class="pic-1 device-container" style="background-color:#' + bg + ';' +
                    ' id="ImagenDiv_' + DatosJson[i].Producto_ID + '"> ' +
                    '<div class="device-mockup ipad_pro ' + orientacion + ' white ">' +
                    '<div class="device" style="background-image: url(' + DatosJson[i].RutaImagen1 + ');">' +
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
            var bg = DatosJson[0].Prod_Nombre;
            for (i = 0; i < DatosJson.length; i++) {
                if (sw == 1) {
                    $("#form_marialuisa").append('<div id=' + DatosJson[i].Prod_Nombre + ' class="swatch selected" style="background-color:#' + DatosJson[i].Prod_Nombre + ';"></div>');
                } else {
                    $("#form_marialuisa").append('<div id=' + DatosJson[i].Prod_Nombre + ' class="swatch border border-primary text-danger text-center" style="background-color:#' + DatosJson[i].Prod_Nombre + ';"></div>');
                }
                sw = 0;
            }
            $("#form_marialuisa").append('<div id="None" title="Sin Marialuisa" data-toggle="popover" data-trigger="hover" data-content="Esta opcion elimina la Marialuisa" class="swatch border border-danger text-danger text-center" style="background-color:#fff;"><i class="align-self-center fas fa-times fa-3x"></i></div>');
            $('#None').popover({container: 'body'});   
            $("#switch1").change(function () {
                if (this.checked) {
                    $('.screen').addClass("brillo");
                } else {
                    $('.screen').removeClass("brillo");
                }
            });
            $('.swatch-selector .swatch').click(function onClick(event) {
                $(this).removeClass('border border-primary').siblings().addClass('border border-primary');
                $(this).addClass('selected')
                    .siblings().removeClass('selected');
                var colorName = $(this).data('color');
                var color = $(this).attr('style').split(';').filter(item => item.startsWith('background-color'))[0].split(":")[1].replace(/\s/g, '');
                var selectorId = $(this).attr('id');
                $('.pic-1')
                    .css({
                        backgroundColor: color
                    });
                $("#Color").val(selectorId);
                if(selectorId=='None'){
                    $(".device-mockup").removeClass("ipad_pro");
                    $(".device-mockup").addClass("galaxy_s5");
                    $(".img-fluid").width("80%");
                }
                else{
                      $(".device-mockup").removeClass("galaxy_s5");
                    $(".device-mockup").addClass("ipad_pro");
                    $(".img-fluid").width("50%");
                }
            });
            ListaProductos(bg);
        }
    });

}

function Redireccion(Producto, Tamano) {
    var Tm = document.getElementById('Tamano_Marialuisa').value;
    var color = document.getElementById('Color').value;
    var Vidrio = document.getElementById('switch1').checked;
    location.href = '/VistaPrevia/?prod=' + Producto + '&tamano=' + Tamano + '&TM=' + Tm + '&Vidrio=' + Vidrio + '&Color=' + color+'&Meta=Impresion';
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
                $("#Tamano_Marialuisa").append('<option value="' + DatosJson[i].Tamano_ID + '">' + DatosJson[i].Tamano + ' cm</option>')
            }
        }


    });

}




