$(document).ready(function () {
    size();
});

function size() {
    var size = document.getElementById("mp").value;
    if (size == 5) {
        size = 4;
    } else if (size == 0) {
        size = 1;
    } else if (size == 7) {
        size = 6;
    } else if (size == 9) {
        size = 8;
    } else if (size > 12 && size < 16) {
        size = 12;
    } else if (size > 16 && size < 18) {
        size = 16;
    } else if (size > 18 && size < 21) {
        size = 18;
    } else if (size > 21) {
        size = 21;
    } else {
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
                var contenido = '';
                for (var c = 0; c < DatosJson[i].Calidad; c++) {
                    contenido = contenido + '<i class="fas fa-star text-warning"></i>';
                }
                $("#botones").append('<tr>' +
                    '<th scope="row">'+DatosJson[i].Tamano+'</th>' +
                    '<td>' + contenido + '</td>' +
                    '<td><a href="/build/digitalphoto/ElegirMarco/index.php?Tamano_ID=' + DatosJson[i].Tamano_ID + '"><button class="btn btn-primary m-1">' +
                    'Elegir </button></a></td>' +
                    '</tr>');

            }
        }
    });
}

