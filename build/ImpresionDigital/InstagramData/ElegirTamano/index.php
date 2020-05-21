<!DOCTYPE html>
<html lang="en">

<head>
    <title>DiiFrame - Inicio</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
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
    </style>
</head>

<body id="page-top">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; ?>
    <?php session_start(); ?>
    <!-- Navigation -->
    <!-- Navigation -->
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>
    <div class="loader"></div>
    <img id="media_id"  class="" src="/assets/tools/imageupload/<?php echo $_SESSION['Nombre']; ?>" alt="build">

    <section class="features" id="features">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Elige el tamaño de impresión</h2>
                <h3 class="text-warning">Tamaño de imagen = MP</h3>
                <input id="mp" class="d-none" value="">
            </div>
            <div class="row text-center justify-content-md-center">
                <div class="col-lg-6 col-sm-6 mb-4">
                    <div class="table-responsive">
                        <table class="table table-light  table-striped">
                            <caption>La calidad de impresión es proporcional al número de estrellas</caption>
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">Tamaño</th>
                                    <th scope="col">Calidad</th>
                                    <th scope="col">Elegir</th>
                                </tr>
                            </thead>
                            <tbody id="botones" >
                              
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-6 col-sm-6 mb-4">
                    <div class="card">
                        <a ><img  class="img-fluid" src="/assets/tools/imageupload/<?php echo $_SESSION['Nombre']; ?>" alt="build"></a>
                        <div class="card-footer container">
                                <p></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
    <script type="text/javascript" src="/assets/js/Instagram/instagrammediaid.js"></script>

</body>

</html>
