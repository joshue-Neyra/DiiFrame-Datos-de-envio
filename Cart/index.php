<!DOCTYPE html5>
<html lang="en">

<head>
    <title>DiiFrame - Carrito</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
</head>

<body id="page-top">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/Sesion/sesion_Usuario.php'; ?>
    <!-- Navigation -->
    <!-- Navigation -->
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>



    <div class="container mb-4 my-5">
        <div class="card row">
            <div class="col-md-12">
                <h3 class="mb-3 my-3 text-center text-danger">Tu carrito de compra</h3>
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
                        <tbody id="tbl_carrito">


                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row justify-content-lg-center">
                    <div class="col-lg-6 ">
                        <a href="/"><button class="btn btn-block btn-primary">Continuar comprando</button></a>
                    </div>
                    <div class="col-lg-6  text-right">
                        <button class="btn btn-block btn-success" onclick="iVoy();">Realizar Pedido</button>
                    </div>
                    <div class="col-lg-8 my-3">
                        <center><a class="btn btn-warning btn-small text-white" href="#" data-toggle="modal" data-target="#logoutModal">Cerrar Sesion </a></center>
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
    <script type="text/javascript" src="/assets/js/cart.js"></script>
    <script type="text/javascript" src="/assets/js/prueba.js"></script>

</body>

</html>
