<!DOCTYPE html5>
<html lang="en">

<head>
    <title>DiiFrame - Productos</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
    <link href="/assets/css/cajasproductos.min.css" rel="stylesheet">
    <link href="/assets/device-mockups/device-mockups.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; ?>
    <!-- Navigation -->
    <!-- Navigation -->
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>



    <section class="features bg-light" id="features">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Productos</h2>
            </div>
        </div>
        <div class="container">
            <h3 class="text-center mb-3">¿Qué buscamos?</h3>
            <ol class="breadcrumb justify-content-center" id="Filtro_Familia"></ol>
            <div class="row justify-content-md-center" id="Productos">
            </div>
        </div>
    </section>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
    <script type="text/javascript" src="/assets/js/SoloMarco/Productos.js"></script>

</body>

</html>
