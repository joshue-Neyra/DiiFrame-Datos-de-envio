<!DOCTYPE html>
<html lang="en">

<head>
    <title>DiiFrame - Inicio</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>


    <link rel="stylesheet" type="text/css" href="/assets/crop/cropper.css">
    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('/assets/img/loading.gif') 50% 50% no-repeat rgb(249, 249, 249);
            opacity: .8;

    </style>
</head>

<body id="page-top">

    <!-- Navigation -->
    <!-- Navigation -->
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/instagram/instagram_basic_display_api.php'; ?>
    <?php
	$accessToken = 'ACCESS-TOKEN';

	$params = array(
		'get_code' => isset( $_GET['code'] ) ? $_GET['code'] : ''
	);
	$ig = new instagram_basic_display_api( $params );
    ?>
    <div class="loader"></div>
    <section class="features" id="features">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Elige una foto</h2>
            </div>
            <div class="row text-center justify-content-md-center">
                <a>
                    <div class="col-lg-6 col-sm-6 mb-4">
                        <div class="card h-100">
                            <a id="preview"><img class="img-fluid" width="250px" id="target" src="/assets/img/upload.jpg" alt="build"></a>
                            <div class="card-body container">
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="imagen" value="Buscar" accept="image/*">
                                    <label class="custom-file-label" for="imagen">Buscar desde Ordenador</label>
                                </div>

                                <a href="<?php echo $ig->authorizationUrl; ?>" id="btn_instagram" class="btn btn-warning">Cargar imagen desde Instagram</a><br>
                                <a class="btn btn-primary my-3">
                                    <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
                                        Cargar imagen desde Facebook</fb:login-button>
                                </a>
                            </div>
                            <div class="card-footer container">
                                <button id="btn_submit" data-setclass="jcrop-light" onclick="crop();" class="btn btn-warning d-none">Elegir</button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
    <script src="/assets/crop/jquery-3.3.1.min.js"></script>
    <script src="/assets/crop/cropper.js"></script>
    <script type="text/javascript" src="/assets/js/ImpresionDigital/crop_digital.js"></script>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: '983887345394123',
                cookie: true,
                xfbml: true,
                version: 'v8.0'
            });

            FB.AppEvents.logPageView();

        };

        (function(d, s, id) {
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
            FB.getLoginStatus(function(response) {
                statusChangeCallback(response);
            });
        }

        function statusChangeCallback(response) {
            console.log('statusChangeCallback');
            console.log(response);
            // The response object is returned with a status field that lets the
            // app know the current login status of the person.
            // Full docs on the response object can be found in the documentation
            // for FB.getLoginStatus().
            if (response.status === 'connected') {
                // Logged into your app and Facebook.
                console.log('Welcome!  Fetching your information.... ');
                FB.api('/me', function(response) {
                    console.log('Successful login for: ' + response.name);
                    alert('Thanks for logging in, ' + response.name + '!') ;
                       
                });
            } else {
                // The person is not logged into your app or we are unable to tell.
                alert('Please log into this app.');
            }
        }

    </script>
    <style>
        .cropper-crop {
            display: none;
        }

        .cropper-bg {
            background: none;
        }

    </style>
</body>

</html>
