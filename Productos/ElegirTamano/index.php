<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$_SESSION['Orientacion']='1';
$_SESSION['Nombre']="/assets/img/solomarco.jpg";?>
<head>
    <title>DiiFrame - Inicio</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
</head>

<body id="page-top">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>


    <section class="features" id="features">
        <div class="container">
            <div class="section-heading text-center">
                <h2>Elige el tamaño de impresión</h2>
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
                    <input class="d-none" id="Producto_ID" value="<?php echo $_GET['Prd_ID']?>">
                    <div class="card" id="prod_imagen">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
    <script type="text/javascript" src="/assets/js/SoloMarco/TamanoProductos.js"></script>
</body>

</html>
