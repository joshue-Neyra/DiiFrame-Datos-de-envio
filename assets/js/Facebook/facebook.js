$(document).ready(function () {
    $('#facebook_section').hide();
});
window.fbAsyncInit = function () {
    FB.init({
        appId: '2539441222982988',
        cookie: true,
        xfbml: true,
        version: 'v9.0'
    });

    FB.AppEvents.logEvent();

};

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function checkLoginState() {
    FB.getLoginStatus(function (response) {
        statusChangeCallback(response);
    });
}

function statusChangeCallback(response) {
    if (response.status === 'connected') {
        var accessToken = response.authResponse.accessToken;
        console.log(accessToken)
        FB.api('/me', function (response) {
            $('#facebook_section').show();
            $('#features').hide();

            photos(response.id);
        });
    } else {
        // The person is not logged into your app or we are unable to tell.
        alert('Please log into this app.');
    }
}


function photos(userId) {
    $(".loader").show();
    FB.api(
        "/" + userId + "/photos/",
        function (response) {
            var fbdata = response.data;

            if (fbdata.length == 0) {

                profilephoto(userId);
            } else {
                
                var images = response.data[0].images[0];
                for (i = 0; i < fbdata.length; i++) {
                    var url = "'" + fbdata[i].images[0].source.toString() + "'";
                    var name = "'" + fbdata[i].id.toString() + ".jpg'";
                    $("#Facebook_feed").append(' <div class="col-lg-3 gallery-item hvr-float-shadow"' +
                        ' onclick="sesion(' + url + ',' + name + ')">' +
                        '<a class="d-block mb-4 h-100 ">' +
                        '<img class="img-fluid" src="' + fbdata[i].images[0].source + '" alt="Diiframe">' +
                        '</a>' +
                        '</div>');
                }
            }

            $(".loader").hide();
            //photo_url(response.data[0].id);
        }
    );

}

function profilephoto(userId) {
    $(".loader").show();
    alert(userId);
    FB.api(
        '/' + userId + '/picture?redirect=false&type=large&width=720&height=720',
        'GET',
        function (response) {
            console.log(response);
            var fbdata = response.data;

            if (fbdata.length == 0) {
                $("#Facebook_feed").append('<p>No hay imagenes o fotos en el perfil de facebook para mostrar</p>');
            } else {
                var url = "'" + fbdata.url.toString() + "'";
                var name = "'" + userId.toString() + "id.jpg'";
                $("#Facebook_feed").append('<div class="col-lg-3 gallery-item hvr-float-shadow"' +
                    ' onclick="sesion(' + url + ',' + name + ')">' +
                    '<a class="d-block mb-4 h-100 ">' +
                    '<img class="img-fluid" src=' + url + ' alt="Diiframe">' +
                    '</a>' +
                    '</div><br>');
                $("#Facebook_feed").append('<p class="col-lg-12">No hay mas imagenes o fotos en el perfil de facebook para mostrar</p>');
            }

            $(".loader").hide();
            //photo_url(response.data[0].id);
        }
    );

}

function sesion(url, name) {
    $(".loader").show();
    var parametros = {
        url: url,
        name: name
    }
    //alert(parametros.name);
    $.ajax({
        "url": '/assets/tools/imageupload/InstagramUpload.php',
        "method": "post",
        "data": parametros,
        "success": function (response) {
            if (response == "ok") {
                location.href = "/build/ImpresionDigital/InstagramData/ElegirTamano";
            } else {
                console.log(response);
            }

        }
    });

}

