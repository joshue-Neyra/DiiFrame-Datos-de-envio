<!DOCTYPE html>
<html lang="en">

<head>
    <title>DiiFrame - Elegir Marco</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
    <link href="/assets/css/cajasmarcos.min.css" rel="stylesheet">
    <link href="/assets/device-mockups/device-mockups.min.css" rel="stylesheet">
    <style>
        #circle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 150px;
            height: 150px;
        }

        .loader {
            width: calc(100% - 0px);
            height: calc(100% - 0px);
            border: 8px solid #09f;
            border-top: 8px solid #F2C600;
            border-radius: 50%;
            animation: rotate 5s linear infinite;
        }

        @keyframes rotate {
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body id="page-top">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; ?>
    <!-- Navigation -->
    <!-- Navigation -->
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>




    <section class="features bg-light mb-5" id="features">
        <div class="container pb-5">
            <div class="section-heading text-center row justify-content-md-center">
                <div class="col-md-12">
                    <h2>Elige el Marco de tu preferencia</h2>
                    <input id="Tamano_ID" class="d-none" value=" <?php echo $size=$_GET['Tamano_ID'];?>">
                </div>
                <div class="swatch-selector col-md-8" id="color-1">
                    <div class="row justify-content-md-center" id="form_marialuisa">
                        <div class="swatch selected" style="background-color:rgb(249, 243, 233);"></div>
                        <div class="swatch" style="background-color:rgb(128, 128, 128);"></div>
                        <div class="swatch" style="background-color:rgb(61, 61, 70);"></div>
                    </div>
                </div>
            </div>

        </div>
        <div id="circle" >
            <div class="loader">
                <div class="loader">
                    <div class="loader">
                        <div class="loader">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-md-center" id="Productos">
            </div>
        </div>
    </section>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
    <script type="text/javascript" src="/assets/js/Productos.js"></script>

</body>

</html>
