<!DOCTYPE html>
<html lang="en">

<head>
    <title>DiiFrame - Inicio</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
</head>

<body id="page-top">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/Sesion/sesion_MP-Nombre.php'; ?>
    <!-- Navigation -->
    <!-- Navigation -->
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>


    <section class="features" id="features">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Elige el tamaño de impresión</h2>
                <h3 class="text-warning">Tamaño de imagen = <?php echo $Mp?> MP</h3>
                <input id="mp" class="d-none" value=" <?php echo $Mp;?>">
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
                        <a><img width="250px" class="img-fluid" src="/assets/tools/imageupload/<?php echo $nombre?>" alt="build"></a>
                        <div class="card-footer container">
                                <p><?php echo $nombre?></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
    <script type="text/javascript" src="/assets/js/TamanoRelPixeles.js"></script>

</body>

</html>
