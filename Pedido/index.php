<!DOCTYPE html5>
<html lang="en">

<head>
    <title>DiiFrame - Pedido</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
    <link href="/assets/css/pedido.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; ?>
    <!-- Navigation -->
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>
    <input id="Tamano_ID" class="d-none" value=" <?php echo $size=$_GET['tamano'];?>">
    <input id="Producto_ID" class="d-none" value=" <?php echo $size=$_GET['prod'];?>">
    <div class="container">
        <div class="card-group mb-5 my-5" >
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">

                    <div class="xzoom-container " id="carrusel_zoom">
                        <img class="xzoom img-fluid" id="xzoom-default" src="/assets/img/build2.jpg" xoriginal="/assets/img/build2.jpg" />
                        <div class="xzoom-thumbs">
                            <a href="/assets/img/build2.jpg"><img class="xzoom-gallery" width="80" src="/assets/img/build2.jpg" xpreview="/assets/img/build2.jpg" title="The description goes here"></a>
                        </div>
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
