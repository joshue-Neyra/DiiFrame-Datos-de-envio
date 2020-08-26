<!DOCTYPE html>
<html lang="en">

<head>
    <title>DiiFrame - Inicio</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
    <link href="/assets/css/hover.min.css" rel="stylesheet">
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
        }

        .cropper-crop {
            display: none;
        }

        .cropper-bg {
            background: none;
        }

        #Facebook_feed {
            padding: 10px 0 0 10px;
            background-color: white;
            text-align: center;
            margin: 0 auto;
        }

        .gallery-item {
            width: 200px;
            height: 200px;
            float: left;
            margin: 10px;
            overflow: hidden;
            cursor: pointer;
            border: 10px solid #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.5);
        }


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
                                <fb:login-button class="fb-login-button my-3 btn" data-size="large" data-button-type="login_with" data-layout="rounded" data-auto-logout-link="false" data-use-continue-as="true" data-width="" scope="public_profile,email" onlogin="checkLoginState();">
                                </fb:login-button>
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
    <section class="features" id="facebook_section">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Elige una foto</h2>
                <hr>
            </div>
            
            <div class="row text-center justify-content-md-center" id="Facebook_feed">
            </div>
        </div>
    </section>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
    <script src="/assets/crop/jquery-3.3.1.min.js"></script>
    <script src="/assets/crop/cropper.js"></script>
    <script type="text/javascript" src="/assets/js/ImpresionDigital/crop_digital.js"></script>
    <script type="text/javascript" src="/assets/js/Facebook/facebook.js"></script>
</body>

</html>
