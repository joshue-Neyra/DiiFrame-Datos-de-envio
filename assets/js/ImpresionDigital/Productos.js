var myVar;
$(document).ready(function () {
    //ListaProductos();
    Marialuisa(1);
    TamanosMarialuisa();
    $(".loader").hide();

});


function ListaProductos(bg,Familia_Id) {
    var parametros = {
        "Tamano": document.getElementById("Tamano_ID").value,
         "Familia_ID": Familia_Id
    }


    /// #####################    Insercion de los marcos por partes    #####################

    // peticion ajax para la insercion de los marcos y de la foto del usuario
    $.ajax({
        data: parametros,
        url: '/assets/tools/Productos/ListaProductos.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            $("#Productos").text("");
            var DatosJson = JSON.parse(JSON.stringify(response));
            var orientacion_foto = "";
            var orientacion_marco = "";
            var rotar = "";

            ///  ####################### primeros 3 marcos #######################  (normal)
            for (i = 0; i < 3 ; i++) {   //foor loop para insertar los marcos    MODIFICAR EL FOR LOOP i aladir clases en la insercion!!!!!
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
                var imagenusuario = document.getElementById("Imagen_Usuario").value;   //imagen dentro del cuadro
                $("#Productos").append(
                    
                    '<div class="col-md-4 col-sm-6">' +   // grid para mostrar 3 cuadros por columna
                    '<div class="product-grid3">' +
                    '<div class="product-image3">' +
                    '<a href="#" onclick="Redireccion(' + DatosJson[i].Producto_ID + ',' + DatosJson[i].Tamano_ID + ');">' +
                    '<div class="pic-1" id="ImagenDiv_' + DatosJson[i].Producto_ID + '"> ' +
                    '<img src="' + imagenusuario + '" class="foto ' + orientacion_foto + '" />' +   //insercion de la imagen
                    '<img src="' + DatosJson[i].RutaImagen1 + '" class="' + orientacion_marco + ' cartulina" style="background-color:#' + bg + ';' + rotar + '"/>' +  //insercion del marco
                    '</div>' +
                    '<img class="mypic2 pic-2" src="' + DatosJson[i].RutaImagen3 + '">' +  //imagen de la esquina del cuadro cuando se hace hover
                    '</a>' +
                    '<ul class="social">' +
                    //'<li><a href="#"><i class="fa fa-shopping-bag"></i></a></li>' +
                    //'<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>' +
                    '</ul>' +
                    '<span class="product-new-label">New</span>' +
                    '</div>' +

                    '<div class="product-content">' +
                    '<h3 class="title"></h3 > ' +
                    '<div class="price">' +
                    '' + DatosJson[i].Prod_Nombre +    //nombre del modelo del marco
                    '</div>' +
                    '<ul class="rating">' +     //estrellas del producto
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '</ul>' +
                    '</div>' +
                    '</div>');
            }

            ///  ####################### marco 4 y 5 #######################
            for (i = 3; i < 5 ; i++) {   //foor loop para insertar los marcos    MODIFICAR EL FOR LOOP i aladir clases en la insercion!!!!!
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
                var imagenusuario = document.getElementById("Imagen_Usuario").value;   //imagen dentro del cuadro
                $("#Productos").append(
                    
                    '<div class="col-md-4 col-sm-6">' +   // grid para mostrar 3 cuadros por columna
                    '<div class="product-grid3">' +
                    '<div class="product-image3">' +
                    '<a href="#" onclick="Redireccion(' + DatosJson[i].Producto_ID + ',' + DatosJson[i].Tamano_ID + ');">' +
                    '<div class="pic-1" id="ImagenDiv_' + DatosJson[i].Producto_ID + '"> ' +  //asignacion del id
                    '<img src="' + imagenusuario + '" class="foto ' + orientacion_foto + ' marco4y5 square4y5" id=""/>' +   //insercion de la imagen y asignacion de nueva clase
                    '<img src="' + DatosJson[i].RutaImagen1 + '" class="' + orientacion_marco + ' cartulina" style="background-color:#' + bg + ';' + rotar + '"/>' +  //insercion del marco
                    '</div>' +
                    '<img class="mypic2 pic-2" src="' + DatosJson[i].RutaImagen3 + '">' +  //imagen de la esquina del cuadro cuando se hace hover
                    '</a>' +
                    '<ul class="social">' +
                    //'<li><a href="#"><i class="fa fa-shopping-bag"></i></a></li>' +
                    //'<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>' +
                    '</ul>' +
                    '<span class="product-new-label">New</span>' +
                    '</div>' +

                    '<div class="product-content">' +
                    '<h3 class="title"></h3 > ' +
                    '<div class="price">' +
                    '' + DatosJson[i].Prod_Nombre +    //nombre del modelo del marco
                    '</div>' +
                    '<ul class="rating">' +     //estrellas del producto
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '</ul>' +
                    '</div>' +
                    '</div>');
            }


            // impresion de modelos 6 y 7 (normal)
            for (i = 5; i < 7 ; i++) {   //foor loop para insertar los marcos    MODIFICAR EL FOR LOOP i aladir clases en la insercion!!!!!
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
                var imagenusuario = document.getElementById("Imagen_Usuario").value;   //imagen dentro del cuadro
                $("#Productos").append(
                    
                    '<div class="col-md-4 col-sm-6">' +   // grid para mostrar 3 cuadros por columna
                    '<div class="product-grid3">' +
                    '<div class="product-image3">' +
                    '<a href="#" onclick="Redireccion(' + DatosJson[i].Producto_ID + ',' + DatosJson[i].Tamano_ID + ');">' +
                    '<div class="pic-1" id="ImagenDiv_' + DatosJson[i].Producto_ID + '"> ' +
                    '<img src="' + imagenusuario + '" class="foto ' + orientacion_foto + '" />' +   //insercion de la imagen
                    '<img src="' + DatosJson[i].RutaImagen1 + '" class="' + orientacion_marco + ' cartulina" style="background-color:#' + bg + ';' + rotar + '"/>' +  //insercion del marco
                    '</div>' +
                    '<img class="mypic2 pic-2" src="' + DatosJson[i].RutaImagen3 + '">' +  //imagen de la esquina del cuadro cuando se hace hover
                    '</a>' +
                    '<ul class="social">' +
                    //'<li><a href="#"><i class="fa fa-shopping-bag"></i></a></li>' +
                    //'<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>' +
                    '</ul>' +
                    '<span class="product-new-label">New</span>' +
                    '</div>' +

                    '<div class="product-content">' +
                    '<h3 class="title"></h3 > ' +
                    '<div class="price">' +
                    '' + DatosJson[i].Prod_Nombre +    //nombre del modelo del marco
                    '</div>' +
                    '<ul class="rating">' +     //estrellas del producto
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '</ul>' +
                    '</div>' +
                    '</div>');
            }

            ///  ####################### marcos 8 y 9  #######################
            for (i = 7; i < 9 ; i++) {   //foor loop para insertar los marcos    MODIFICAR EL FOR LOOP i aladir clases en la insercion!!!!!
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
                var imagenusuario = document.getElementById("Imagen_Usuario").value;   //imagen dentro del cuadro
                $("#Productos").append(
                    
                    '<div class="col-md-4 col-sm-6">' +   // grid para mostrar 3 cuadros por columna
                    '<div class="product-grid3">' +
                    '<div class="product-image3">' +
                    '<a href="#" onclick="Redireccion(' + DatosJson[i].Producto_ID + ',' + DatosJson[i].Tamano_ID + ');">' +
                    '<div class="pic-1" id="ImagenDiv_' + DatosJson[i].Producto_ID + '"> ' +  //asignacion del id
                    '<img src="' + imagenusuario + '" class="foto ' + orientacion_foto + ' marcos8y9 portrait8y9 square8y9" id=""/>' +   //insercion de la imagen y asignacion de nuevo id
                    '<img src="' + DatosJson[i].RutaImagen1 + '" class="' + orientacion_marco + ' cartulina" style="background-color:#' + bg + ';' + rotar + '"/>' +  //insercion del marco
                    '</div>' +
                    '<img class="mypic2 pic-2" src="' + DatosJson[i].RutaImagen3 + '">' +  //imagen de la esquina del cuadro cuando se hace hover
                    '</a>' +
                    '<ul class="social">' +
                    //'<li><a href="#"><i class="fa fa-shopping-bag"></i></a></li>' +
                    //'<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>' +
                    '</ul>' +
                    '<span class="product-new-label">New</span>' +
                    '</div>' +

                    '<div class="product-content">' +
                    '<h3 class="title"></h3 > ' +
                    '<div class="price">' +
                    '' + DatosJson[i].Prod_Nombre +    //nombre del modelo del marco
                    '</div>' +
                    '<ul class="rating">' +     //estrellas del producto
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '</ul>' +
                    '</div>' +
                    '</div>');
            }

            ///  ####################### marcos 10 - 15  #######################
            for (i = 9; i < 15 ; i++) {   //foor loop para insertar los marcos    MODIFICAR EL FOR LOOP i aladir clases en la insercion!!!!!
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
                var imagenusuario = document.getElementById("Imagen_Usuario").value;   //imagen dentro del cuadro
                $("#Productos").append(
                    
                    '<div class="col-md-4 col-sm-6">' +   // grid para mostrar 3 cuadros por columna
                    '<div class="product-grid3">' +
                    '<div class="product-image3">' +
                    '<a href="#" onclick="Redireccion(' + DatosJson[i].Producto_ID + ',' + DatosJson[i].Tamano_ID + ');">' +
                    '<div class="pic-1" id="ImagenDiv_' + DatosJson[i].Producto_ID + '"> ' +  //asignacion del id
                    '<img src="' + imagenusuario + '" class="foto ' + orientacion_foto + ' marcos10a13 portrait10a15 square10a15" id=""/>' +   //insercion de la imagen y asignacion de nuevo id
                    '<img src="' + DatosJson[i].RutaImagen1 + '" class="' + orientacion_marco + ' cartulina" style="background-color:#' + bg + ';' + rotar + '"/>' +  //insercion del marco
                    '</div>' +
                    '<img class="mypic2 pic-2" src="' + DatosJson[i].RutaImagen3 + '">' +  //imagen de la esquina del cuadro cuando se hace hover
                    '</a>' +
                    '<ul class="social">' +
                    //'<li><a href="#"><i class="fa fa-shopping-bag"></i></a></li>' +
                    //'<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>' +
                    '</ul>' +
                    '<span class="product-new-label">New</span>' +
                    '</div>' +

                    '<div class="product-content">' +
                    '<h3 class="title"></h3 > ' +
                    '<div class="price">' +
                    '' + DatosJson[i].Prod_Nombre +    //nombre del modelo del marco
                    '</div>' +
                    '<ul class="rating">' +     //estrellas del producto
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '<li class="fa fa-star"></li>' +
                    '</ul>' +
                    '</div>' +
                    '</div>');
            }

            ///  ####################### resto de marcos  #######################
            for (i = 15; i < DatosJson.length; i++) {   //foor loop para insertar los marcos    MODIFICAR EL FOR LOOP i aladir clases en la insercion!!!!!
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
                var imagenusuario = document.getElementById("Imagen_Usuario").value;   //imagen dentro del cuadro
                $("#Productos").append(
                    
                    '<div class="col-md-4 col-sm-6">' +   // grid para mostrar 3 cuadros por columna
                    '<div class="product-grid3">' +
                    '<div class="product-image3">' +
                    '<a href="#" onclick="Redireccion(' + DatosJson[i].Producto_ID + ',' + DatosJson[i].Tamano_ID + ');">' +
                    '<div class="pic-1" id="ImagenDiv_' + DatosJson[i].Producto_ID + '"> ' +  //asignacion del id
                    '<img src="' + imagenusuario + '" class="foto ' + orientacion_foto + ' marcos16a22 portrait_resto square_resto" id=""/>' +   //insercion de la imagen y asignacion de nuevo id
                    '<img src="' + DatosJson[i].RutaImagen1 + '" class="' + orientacion_marco + ' cartulina" style="background-color:#' + bg + ';' + rotar + '"/>' +  //insercion del marco
                    '</div>' +
                    '<img class="mypic2 pic-2" src="' + DatosJson[i].RutaImagen3 + '">' +  //imagen de la esquina del cuadro cuando se hace hover
                    '</a>' +
                    '<ul class="social">' +
                    //'<li><a href="#"><i class="fa fa-shopping-bag"></i></a></li>' +
                    //'<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>' +
                    '</ul>' +
                    '<span class="product-new-label">New</span>' +
                    '</div>' +

                    '<div class="product-content">' +
                    '<h3 class="title"></h3 > ' +
                    '<div class="price">' +
                    '' + DatosJson[i].Prod_Nombre +    //nombre del modelo del marco
                    '</div>' +
                    '<ul class="rating">' +     //estrellas del producto
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


function Marialuisa(Familia_Id) {
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
            ListaProductos(bg,Familia_Id);
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


/// ############# opciones de marialuisa
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


// #################### asignacion de clases de acuerdo a el tipo de recuadro ####################
$("#Tamano_Marialuisa").change(function () {
    $("select option:selected").each(function () {
        var selectorId = $(this).attr('id');
        var orientacion = document.getElementById("Imagen_Orientacion").value;
        if (orientacion == 1) {                     ///################ MARCO PORTRAIT  ################
            if (selectorId == 'Sin Marialuisa') {
                //alert(selectorId);
                $(".foto").removeClass("foto_portrait_3cm foto_portrait_5cm foto_portrait_10cm");
                $(".foto").addClass("foto_portrait_SM");

                // eliminar clases anteriores de marcos
                $('.marcos8y9').removeClass('imagen_marco_8y9');
                $('.marcos10a13').removeClass('imagen_marco10a13');
                $('.marcos16a22').removeClass('imagen_marco16a22');

                // seleccion por clase:
                $(".portrait8y9").addClass('portrait_marco_8y9');  //ajuste imagen sin marialuisa 8 y 9
                $(".portrait10a15").addClass('portrait_marco10a15');  //ajuste imagen sin marialuisa 10 a 15
                $(".portrait_resto").addClass('portrait_marco_resto'); //ajuste del resto de las imagenes sin marialuisa

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

                // remover clase sin marialuisa por clases:
                $(".portrait8y9").removeClass('portrait_marco_8y9');
                $(".portrait10a15").removeClass('portrait_marco10a15');
                $(".portrait_resto").removeClass('portrait_marco_resto');

            } else if (selectorId == '5 cm') {
                //alert(selectorId);
                $(".foto").removeClass("foto_portrait_3cm foto_portrait_5cm foto_portrait_10cm foto_portrait_SM");
                $(".foto").addClass("foto_portrait_5cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();

                // remover clase sin marialuisa por clases:
                $(".portrait8y9").removeClass('portrait_marco_8y9');
                $(".portrait10a15").removeClass('portrait_marco10a15');
                $(".portrait_resto").removeClass('portrait_marco_resto');

            } else if (selectorId == '3.5 cm') {
                //alert(selectorId);
                $(".foto").removeClass("foto_portrait_3cm foto_portrait_5cm foto_portrait_10cm foto_portrait_SM");
                $(".foto").addClass("foto_portrait_3cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();

                // remover clase sin marialuisa por clases:
                $(".portrait8y9").removeClass('portrait_marco_8y9');
                $(".portrait10a15").removeClass('portrait_marco10a15');
                $(".portrait_resto").removeClass('portrait_marco_resto');

            } else {
                //alert(selectorId);
                $(".foto").removeClass("foto_portrait_3cm foto_portrait_5cm foto_portrait_10cm foto_portrait_SM");
                $(".foto").addClass("foto_portrait_3cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();

                // remover clase sin marialuisa por clases:
                $(".portrait8y9").removeClass('portrait_marco_8y9');
                $(".portrait10a15").removeClass('portrait_marco10a15');
                $(".portrait_resto").removeClass('portrait_marco_resto');
            }

        } 
        else if (orientacion == 2) {         ///################ MARCO LANDSCAPE  ################
            if (selectorId == 'Sin Marialuisa') {
                //alert(selectorId);
                $(".foto").removeClass("foto_landscape_3cm foto_landscape_5cm foto_landscape_10cm");
                $(".foto").addClass("foto_landscape_SM");
                // seleccion por clase:
                $('.marco4y5').addClass('imagen_marco_4y5');  //ajuste imagen sin maria luisa 4 y 5
                $('.marcos8y9').addClass('imagen_marco_8y9'); //ajuste de imagen sin marialuisa 8 y 9
                $('.marcos10a13').addClass('imagen_marco10a13');  //ajuste de la imagen sin maria luisa 10 a 15
                $('.marcos16a22').addClass('imagen_marco16a22');  //ajuste de la imagen sin maria luisa resto de marcos
                
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
                
                // remover clase sin marialuisa por clases:
                $('.marcos8y9').removeClass('imagen_marco_8y9');
                $('.marco4y5').removeClass('imagen_marco_4y5');
                $('.marcos10a13').removeClass('imagen_marco10a13');
                $('.marcos16a22').removeClass('imagen_marco16a22');
               

            } else if (selectorId == '5 cm') {
                //alert(selectorId);
                $(".foto").removeClass("foto_landscape_3cm foto_landscape_5cm foto_landscape_10cm foto_landscape_SM");
                $(".foto").addClass("foto_landscape_5cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();

                // remover clase sin marialuisa por clases:
                $('.marcos8y9').removeClass('imagen_marco_8y9');
                $('.marco4y5').removeClass('imagen_marco_4y5');
                $('.marcos10a13').removeClass('imagen_marco10a13');
                $('.marcos16a22').removeClass('imagen_marco16a22');
                

            } else if (selectorId == '3.5 cm') {
                //alert(selectorId);
                $(".foto").removeClass("foto_landscape_3cm foto_landscape_5cm foto_landscape_10cm foto_landscape_SM");
                $(".foto").addClass("foto_landscape_3cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();

                // remover clase sin marialuisa por clases:
                $('.marcos8y9').removeClass('imagen_marco_8y9');
                $('.marco4y5').removeClass('imagen_marco_4y5');
                $('.marcos10a13').removeClass('imagen_marco10a13');
                $('.marcos16a22').removeClass('imagen_marco16a22');
                

            } else {
                //alert(selectorId);
                $(".foto").removeClass("foto_landscape_3cm foto_landscape_5cm foto_landscape_10cm foto_landscape_SM");
                $(".foto").addClass("foto_landscape_3cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();

                // remover clase sin marialuisa por clases:
                $('.marcos8y9').removeClass('imagen_marco_8y9');
                $('.marco4y5').removeClass('imagen_marco_4y5');
                $('.marcos10a13').removeClass('imagen_marco10a13');
                $('.marcos16a22').removeClass('imagen_marco16a22');
                
            }
        }
        else {                                 ///################ MARCO SQUARE  ################
            if (selectorId == 'Sin Marialuisa') {
                //alert(selectorId);
                $(".foto").removeClass("foto_square_3cm foto_square_5cm foto_square_10cm");
                $(".foto").addClass("foto_square_SM");

                // eliminar clases anteriores de marcos:
                $('.marco4y5').removeClass('imagen_marco_4y5');
                $('.marcos8y9').removeClass('imagen_marco_8y9');
                $(".portrait8y9").removeClass('portrait_marco_8y9');
                $('.marcos10a13').removeClass('imagen_marco10a13');
                $(".portrait10a15").removeClass('portrait_marco10a15');
                $('.marcos16a22').removeClass('imagen_marco16a22');
                $(".portrait_resto").removeClass('portrait_marco_resto');

                // seleccion por clase:
                $(".square4y5").addClass("marco_square4y5");  //ajuste imagen sin marialuisa 4 y 5
                $(".square8y9").addClass('marco_square8y9');  //ajuste imagen sin marialuisa 8 y 9
                $(".square10a15").addClass('marco_square10a15');  //ajuste imagen sin marialuisa 10 a 15
                $(".square_resto").addClass('marco_square_resto'); // ajuste resto de imagenes sin marialuisa

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

                // remover clases sin marialuisa por clases:
                $(".square4y5").removeClass("marco_square4y5");
                $(".square8y9").removeClass('marco_square8y9');
                $(".square10a15").removeClass('marco_square10a15');
                $(".square_resto").removeClass('marco_square_resto');  

            } else if (selectorId == '5 cm') {
                //alert(selectorId);
                $(".foto").removeClass("foto_square_3cm foto_square_5cm foto_square_10cm foto_square_SM");
                $(".foto").addClass("foto_square_5cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();

                // remover clases sin marialuisa por clases:
                $(".square4y5").removeClass("marco_square4y5");
                $(".square8y9").removeClass('marco_square8y9');
                $(".square10a15").removeClass('marco_square10a15');  
                $(".square_resto").removeClass('marco_square_resto'); 

            } else if (selectorId == '3.5 cm') {
                //alert(selectorId);
                $(".foto").removeClass("foto_square_3cm foto_square_5cm foto_square_10cm foto_square_SM");
                $(".foto").addClass("foto_square_3cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();

                // remover clases sin marialuisa por clases:
                $(".square4y5").removeClass("marco_square4y5");
                $(".square8y9").removeClass('marco_square8y9');
                $(".square10a15").removeClass('marco_square10a15');  
                $(".square_resto").removeClass('marco_square_resto'); 

            } else {
                //alert(selectorId);
                $(".foto").removeClass("foto_square_3cm foto_square_5cm foto_square_10cm foto_square_SM");
                $(".foto").addClass("foto_square_3cm");
                //Marialuisa();
                $(".ml").show();
                $("#form_marialuisa2").show();
                $('.ml').first().click();

                // remover clases sin marialuisa por clases:
                $(".square4y5").removeClass("marco_square4y5");
                $(".square8y9").removeClass('marco_square8y9');
                $(".square10a15").removeClass('marco_square10a15');  
                $(".square_resto").removeClass('marco_square_resto'); 
            }
        }

    });

}).trigger("change");
