<!DOCTYPE html5>
<html lang="en">

<head>
    <title>Impresion Digital - Vista Previa</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
    <link href="/assets/css/pedido.css" rel="stylesheet">
    <link href="/assets/device-mockups/device-mockups.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Navigation -->
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>
    <div class="d-none">
        <label>Tamaño Impresion</label>
        <input id="Tamano_ID" class="d-none" value=" <?php echo $_GET['tamano'];?>">
        <br>
        <label>Producto_ID</label>
        <input id="Producto_ID" class="d-none" value=" <?php echo $_GET['prod'];?>">
        <br>
        <label>Tamano_Marialuisa</label>
        <input id="Tamano_Marialuisa" class="d-none" value=" <?php echo $_GET['TM'];?>">
        <br>
        <label>Marialuisa_ID</label>
        <input id="Marialuisa_ID" class="d-none" value="<?php echo $_GET['Color'];?>">
        <br>
        <label>Vidrio_Trasero</label>
        <input id="Vidrio_T" class="d-none" value="<?php echo $_GET['VT'];?>">
        <br>
        <label>Vidrio_Frontal</label>
        <input id="Vidrio_F" class="d-none" value="<?php echo $_GET['VF'];?>">
        <input id="Meta" class="d-none" value="<?php echo $_GET['Meta'];?>">

        <br>
        <br>
        <label>Precio Marco</label>
        <input id="Precio_Marco" class="d-none">
        <br>
        <label>Precio Marialuisa</label>
        <input id="Precio_Marialuisa" class="d-none">
        <br>
        <label>Precio Vidrio_Frontal</label>
        <input id="Precio_Vidrio_Frontal" class="d-none">
        <br>
        <label>Subtotal</label>
        <input id="Subtotal" class="d-none">
        <br>
        <label>Nombre Marialuisa</label>
        <input id="Nombre_Marialuisa" type="text" class="d-none">
        <br>
        <label>Nombre Vidrio</label>
        <input id="Nombre_Vidrio" type="text" class="d-none">
        <br>
        <label>Nombre Tamaño Marialuisa</label>
        <input id="Nombre_Tamano_Marialuisa" type="text" class="d-none">
        <br>
    </div>
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
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container" id="modal1">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="lightbox2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container" id="modal2">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="lightbox3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container" id="modal3">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="lightbox4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container" id="modal4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/scripts.html'; ?>


</body>
<script type="text/javascript" src="/assets/js//ImpresionDigital/VistaPrevia.js"></script>


</html>
