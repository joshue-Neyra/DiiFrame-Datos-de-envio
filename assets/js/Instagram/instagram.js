$(document).ready(function () {
    InstagramGetMedia();
});


function InstagramGetMedia() {

    var at = document.getElementById("ig_access_token").value;
    //alert(at);
    $.ajax({
        "url": 'https://graph.instagram.com/me/media?fields=id,caption,media_url,media_type&access_token=' + at,
        "method": "GET",
        "dataType": "jsonp",
        "cache": false,
        "success": function (response) {
            console.log(response);
            var algo = response.data;
            
            console.log(algo[0].media_url);
            for (i = 0; i < algo.length; i++) {
                if (algo[i].media_type != "VIDEO") {
                    var url = "'" + algo[i].media_url.toString() + "'";
                    $("#Instagram_feed").append(' <div class="col-lg-3 gallery-item hvr-float-shadow"' +
                        ' onclick="sesion(' + url + ')">' +
                        '<a class="d-block mb-4 h-100 ">' +
                        '<img class="img-fluid" src="' + algo[i].media_url + '" alt="Diiframe">' +
                        '</a>' +
                        '</div>');
                }
            }
            $(".loader").hide();
        }
    });

}

function sesion(url) {
    var parametros = {
        url: url
    }
    //alert(parametros.url);
    $.ajax({
        "url": '/assets/tools/Sesion/sesioninstagram.php',
        "method": "post",
        "data": parametros,
        "success": function (response) {
            if (response == "ok") {
                location.href = "/build/ImpresionDigital/InstagramData/ElegirTamano/";
            } else {
                console.log(response);
            }

        }
    });

}
