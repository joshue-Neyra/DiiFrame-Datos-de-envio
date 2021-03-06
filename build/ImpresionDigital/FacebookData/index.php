<!DOCTYPE html>
<html lang="en">

<head>
    <title>DiiFrame - Facebook</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
    <link href="/assets/css/hover.min.css" rel="stylesheet">
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

    <div class="loader"></div>
    <section class="features" id="features">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Elige una foto</h2>
                <?php
                $ID=$_GET['ID'];
                if ( $ID != '' ) : ?>
                <hr />
                <input type="text" id="ig_access_token" class="d-none" value="<?php echo "$ID"; ?>">
                <?php else : ?>
                <?php header('Location: /build/ImpresionDigital/'); ?>
                <?php endif; ?>
            </div>
            <div class="row text-center justify-content-md-center" id="Instagram_feed">

            </div>
        </div>
    </section>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
    <script type="text/javascript" src="/assets/js/Facebook/facebook.js"></script>
</body>

</html>
