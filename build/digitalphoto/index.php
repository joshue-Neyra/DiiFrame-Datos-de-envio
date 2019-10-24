<!DOCTYPE html>
<html lang="en">

<head>
    <title>DiiFrame - Inicio</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>


    <link rel="stylesheet" type="text/css" href="/assets/crop/cropper.css">
</head>

<body id="page-top">

    <!-- Navigation -->
    <!-- Navigation -->
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>

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

                                <button id="btn_instagram" class="btn btn-warning">Cargar imagen desde instagram</button>
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
    <script type="text/javascript" src="/assets/js/crop_digital.js"></script>
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
