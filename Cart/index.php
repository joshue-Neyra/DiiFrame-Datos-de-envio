<!DOCTYPE html5>
<html lang="en">

<head>
    <title>DiiFrame - Productos</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
      <link href="/assets/css/login.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; ?>
    <!-- Navigation -->
    <!-- Navigation -->
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>



<div class="container mb-4 my-5">
    <div class="card row">
        <div class="col-12">
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
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-primary">Continue Shopping</button>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-block btn-success ">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>


    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/scripts.html'; ?>
    <script type="text/javascript" src="/assets/js/cart.js"></script>

</body>

</html>
