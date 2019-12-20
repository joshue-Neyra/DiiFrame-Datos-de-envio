<!DOCTYPE html>
<html lang="en">

<head>
    <title>DiiFrame - Elegir Marco</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
    <link href="/assets/css/cajasmarcos.min.css" rel="stylesheet">
    <link href="/assets/device-mockups/device-mockups.min.css" rel="stylesheet">
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
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; ?>
    <!-- Navigation -->
    <!-- Navigation -->
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>




    <section class="features bg-light mb-5" id="features">
        <div class="container pb-5">
            <div class="card">
                <div class="card-header text-center bg-primary">
                    <h3>Elige tu marialuisa</h3>
                </div>
                <div class="card-body row">
                    <div class=" col-md-6">
                        <div class="form-group row">
                            <label for="Tamano_Marialuisa" class="col-sm-2 col-form-label">Tamaño:</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="Tamano_Marialuisa">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="swatch-selector col-md-6" id="color-1">
                        <div class="form-group row">
                            <label  class="col-sm-2 col-form-label">Color:</label>
                            <div class="col-sm-8">
                                <div class="row justify-content-md-center" id="form_marialuisa">
                                </div>
                            </div>
                        </div>

                    </div>
                    <input id="Tamano_ID" class="d-none" value=" <?php echo $size=$_GET['Tamano_ID'];?>">
                    <input id="Color" class="d-none" value="">
                </div>
            </div>


        </div>
        <div class="loader"></div>
        <div class="container">
            <div class="row justify-content-md-center" id="Productos">
            </div>
        </div>
    </section>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
    <script type="text/javascript" src="/assets/js/Productos.js"></script>

</body>

</html>
