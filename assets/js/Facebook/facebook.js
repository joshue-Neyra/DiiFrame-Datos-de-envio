        $(document).ready(function () {
            $('#facebook_section').hide();
        });
        window.fbAsyncInit = function () {
            FB.init({
                appId: '983887345394123',
                cookie: true,
                xfbml: true,
                version: 'v8.0'
            });

            FB.AppEvents.logPageView();

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
                "/" + userId + "/photos?fields=images",
                function (response) {
                    var fbdata = response.data;
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
