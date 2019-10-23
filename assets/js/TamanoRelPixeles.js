$(document).ready(function () {
    size();
});

function size() {
    var size = document.getElementById("mp").value;
    if(size==5){
        size = 4;
    }
    else if(size==0){
        size = 1;
    }
    else if(size==7){
        size = 6;
    }
    else if(size==9){
        size = 8;
    }
    else if(size>12 && size<16){
        size = 12;
    }
    else if(size>16 && size<18){
        size = 16;
    }
    else if(size>18 && size<21){
        size = 18;
    }
    else if(size>21){
        size = 21;
    }
    else {
        size = size;
    }
    var parametros = {
        "mp": size,
    }

    $.ajax({
        data: parametros,
        url: '/assets/tools/tamano/RelacionPixeles.php',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            console.log(response);
            var DatosJson = JSON.parse(JSON.stringify(response));
            //console.log(DatosJson.length);
            for (i = 0; i < DatosJson.length; i++) {
                t1(DatosJson[i].t1);
                t2(DatosJson[i].t2);
                t3(DatosJson[i].t3);
                t4(DatosJson[i].t4);
                t5(DatosJson[i].t5);
                t6(DatosJson[i].t6);
                t7(DatosJson[i].t7);
                t8(DatosJson[i].t8);
                t9(DatosJson[i].t9);
                t10(DatosJson[i].t10);
            }
        }
    });
}

function t1(x) { //funcion para tamaño 2*3 centimetros
    if (x > 0) {
        var contenido = '';
        for (var c = 0; c < x; c++) {
            contenido = contenido + '<i class="fas fa-star"></i>';
        }
        $("#botones").append('<tr>' +
            '<th scope="row">2x3 cm</th>' +
            '<td>' + contenido + '</td>' +
            '<td><a href="/build/digitalphoto/ElegirMarco/index.php?size=' + x + '"><button class="btn btn-primary m-1">' +
            'Elegir </button></a></td>' +
            '</tr>');
    }
}

function t2(x) { //funcion para tamaño 3x5 centimetros
    if (x > 0) {
        var contenido = '';
        for (var c = 0; c < x; c++) {
            contenido = contenido + '<i class="fas fa-star"></i>';
        }
        $("#botones").append('<tr>' +
            '<th scope="row">3x5 cm</th>' +
            '<td>' + contenido + '</td>' +
            '<td><a href="/build/digitalphoto/ElegirMarco/index.php?size=' + x + '"><button class="btn btn-primary m-1">' +
            'Elegir </button></a></td>' +
            '</tr>');
    }
}

function t3(x) { //funcion para tamaño 4x6 centimetros
    if (x > 0) {
        var contenido = '';
        for (var c = 0; c < x; c++) {
            contenido = contenido + '<i class="fas fa-star"></i>';
        }
        $("#botones").append('<tr>' +
            '<th scope="row">4x6 cm</th>' +
            '<td>' + contenido + '</td>' +
            '<td><a href="/build/digitalphoto/ElegirMarco/index.php?size=' + x + '"><button class="btn btn-primary m-1">' +
            'Elegir </button></a></td>' +
            '</tr>');
    }
}

function t4(x) { //funcion para tamaño 3x5 centimetros
    if (x > 0) {
        var contenido = '';
        for (var c = 0; c < x; c++) {
            contenido = contenido + '<i class="fas fa-star"></i>';
        }
        $("#botones").append('<tr>' +
            '<th scope="row">5x7 cm</th>' +
            '<td>' + contenido + '</td>' +
            '<td><a href="/build/digitalphoto/ElegirMarco/index.php?size=' + x + '"><button class="btn btn-primary m-1">' +
            'Elegir </button></a></td>' +
            '</tr>');
    }
}

function t5(x) { //funcion para tamaño 3x5 centimetros
    if (x > 0) {
        var contenido = '';
        for (var c = 0; c < x; c++) {
            contenido = contenido + '<i class="fas fa-star"></i>';
        }
        $("#botones").append('<tr>' +
            '<th scope="row">6x8 cm</th>' +
            '<td>' + contenido + '</td>' +
            '<td><a href="/build/digitalphoto/ElegirMarco/index.php?size=' + x + '"><button class="btn btn-primary m-1">' +
            'Elegir </button></a></td>' +
            '</tr>');
    }
}

function t6(x) { //funcion para tamaño 3x5 centimetros
    if (x > 0) {
        var contenido = '';
        for (var c = 0; c < x; c++) {
            contenido = contenido + '<i class="fas fa-star"></i>';
        }
        $("#botones").append('<tr>' +
            '<th scope="row">8x10 cm</th>' +
            '<td>' + contenido + '</td>' +
            '<td><a href="/build/digitalphoto/ElegirMarco/index.php?size=' + x + '"><button class="btn btn-primary m-1">' +
            'Elegir </button></a></td>' +
            '</tr>');
    }
}

function t7(x) { //funcion para tamaño 3x5 centimetros
    if (x > 0) {
        var contenido = '';
        for (var c = 0; c < x; c++) {
            contenido = contenido + '<i class="fas fa-star"></i>';
        }
        $("#botones").append('<tr>' +
            '<th scope="row">11x14 cm</th>' +
            '<td>' + contenido + '</td>' +
            '<td><a href="/build/digitalphoto/ElegirMarco/index.php?size=' + x + '"><button class="btn btn-primary m-1">' +
            'Elegir </button></a></td>' +
            '</tr>');
    }
}

function t8(x) { //funcion para tamaño 3x5 centimetros
    if (x > 0) {
        var contenido = '';
        for (var c = 0; c < x; c++) {
            contenido = contenido + '<i class="fas fa-star"></i>';
        }
        $("#botones").append('<tr>' +
            '<th scope="row">13x19 cm</th>' +
            '<td>' + contenido + '</td>' +
            '<td><a href="/build/digitalphoto/ElegirMarco/index.php?size=' + x + '"><button class="btn btn-primary m-1">' +
            'Elegir </button></a></td>' +
            '</tr>');
    }
}

function t9(x) { //funcion para tamaño 3x5 centimetros
    if (x > 0) {
        var contenido = '';
        for (var c = 0; c < x; c++) {
            contenido = contenido + '<i class="fas fa-star"></i>';
        }
        $("#botones").append('<tr>' +
            '<th scope="row">16x20 cm</th>' +
            '<td>' + contenido + '</td>' +
            '<td><a href="/build/digitalphoto/ElegirMarco/index.php?size=' + x + '"><button class="btn btn-primary m-1">' +
            'Elegir </button></a></td>' +
            '</tr>');
    }
}

function t10(x) { //funcion para tamaño 3x5 centimetros
    if (x > 0) {
        var contenido = '';
        for (var c = 0; c < x; c++) {
            contenido = contenido + '<i class="fas fa-star"></i>';
        }
        $("#botones").append('<tr>' +
            '<th scope="row">24x36 cm</th>' +
            '<td>' + contenido + '</td>' +
            '<td><a href="/build/digitalphoto/ElegirMarco/index.php?size=' + x + '"><button class="btn btn-primary m-1">' +
            'Elegir </button></a></td>' +
            '</tr>');
    }
}
