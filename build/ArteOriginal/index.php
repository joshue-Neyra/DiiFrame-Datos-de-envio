<!DOCTYPE html5>
<html lang="en">

<head>
    <title>DiiFrame - Arte Original</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
    <link href="/assets/css/cajasmarcos.min.css" rel="stylesheet">
    <link href="/assets/device-mockups/device-mockups.min.css" rel="stylesheet">
</head>

<body id="page-top">
<?php
session_start();
$_SESSION['Orientacion']='1';
$_SESSION['Nombre']="/assets/img/solomarco.jpg";?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>



    <section class="features bg-light" id="features">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Arte Original</h2>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-md-center" id="Productos">
            </div>
        </div>
    </section>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/scripts.html'; ?>
    <script type="text/javascript" src="/assets/js/ArteOriginal/ArteOriginal.js"></script>

</body>

</html>
