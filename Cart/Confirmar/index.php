<!DOCTYPE html5>
<html lang="en">

<head>
    <title>DiiFrame - Confirmar</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
    <link href="/assets/css/sb-admin.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/Sesion/sesion_Usuario.php'; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>



    <div class="container mb-4 my-5">
        <div class="card row">
            <div class="col-md-12">
                <h3 class="mb-3 my-3 text-center text-danger">Pedido No. <?php echo $_GET['Nota_ID'];?></h3>
                <input id="Nota_ID" class="d-none" value="<?php echo $_GET['Nota_ID'];?>">
                <div class="table-responsive">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Imagen </th>
                                <th scope="col">Producto</th>
                                <th scope="col">Tamaño</th>
                                <th scope="col" class="text-center">Cantidad</th>
                                <th scope="col" class="text-right">Precio</th>
                                <th> Opcion </th>
                            </tr>
                        </thead>
                        <tbody id="tbl_confirmar">


                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row justify-content-lg-center">
                    <div class="col-lg-12  text-right">
                        <div id="container"></div>


                    </div>
                    <div class="col-lg-8 my-3">
                        <center><button type="button" class="btn btn-warning btn-small text-white" data-toggle="modal" data-target="#logoutModal">
                                Cerrar Sesion
                            </button></center>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">CERRAR SESION?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona "Cerrar sesion" si quieres cerrar la sesion.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="/assets/tools/login/logout.php">Cerrar sesion</a>
                </div>
            </div>
        </div>
    </div>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/scripts.html'; ?>
    <script type="text/javascript" src="/assets/js/confirmar.js"></script>
    <script async
  src="https://pay.google.com/gp/p/js/pay.js"
  onload="onGooglePayLoaded()"></script>
    
</body>

</html>
