<!DOCTYPE html5>
<html lang="en">

<head>
    <title>DiiFrame - Pedido</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
    <link href="/assets/css/pedido.css" rel="stylesheet">
    <link href="/assets/device-mockups/device-mockups.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Navigation -->
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>
    <input id="Tamano_ID" class="d-none" value=" <?php echo $_GET['tamano'];?>">
    <input id="Producto_ID" class="d-none" value=" <?php echo $_GET['prod'];?>">
    
    <input id="Tamano_M" class="d-none" value=" <?php echo $_GET['TM'];?>">
    <input id="Color" class="d-none" value="#<?php echo $_GET['Color'];?>">
    <div class="container">
        <div class="card-group mb-5 my-5">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">

                    <div class="row justify-content-md-center">
                        <div class="col col-lg-10" id="carrusel_zoom2"> </div>
                        <div class="col col-lg-10 row justify-content-md-center" id="carrusel_zoom"> </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body" id="Descripcion">


                </div>
            </div>
        </div>
    </div>
    <div id="lightbox1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">×</button>
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container" id="modal1">

                        <img class="img-fluid" src="" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="lightbox2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <button type="button" class="close hidden" data-dismiss="modal" aria-hidden="true">×</button>
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container" id="modal2">

                        <img class="img-fluid" src="" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/scripts.html'; ?>


</body>
<script type="text/javascript" src="/assets/js/Pedido.js"></script>
<script src='https://code.jquery.com/jquery-2.1.1.js'></script>
<script src='https://unpkg.com/xzoom/dist/xzoom.min.js'></script>
<script src='https://hammerjs.github.io/dist/hammer.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js'></script>
<script type="text/javascript" src="/assets/js/Zoom.js"></script>


</html>
