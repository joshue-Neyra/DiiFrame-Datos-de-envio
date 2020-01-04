<!DOCTYPE html5>
<html lang="en">

<head>
    <title>DiiFrame - Confirmar</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://openpay.s3.amazonaws.com/openpay.v1.min.js"></script>
    <script type='text/javascript' src="https://openpay.s3.amazonaws.com/openpay-data.v1.min.js"></script>

    <link href="/assets/css/sb-admin.min.css" rel="stylesheet">
    <style>
        .card {
            box-shadow: 0 2px 1rem rgba(0, 0, 0, 0.15);
        }

        .table td,
        .table th {
            padding: 1.5rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

    </style>
</head>

<body id="page-top">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>
    <section id="form_productos">
        <div class="container">
            <h3 class="mb-3 my-3 text-center text-danger">Pedido No. <?php echo $_GET['Nota_ID'];?></h3>
            <input id="Nota_ID" class="d-none" value="<?php echo $_GET['Nota_ID'];?>">
            <div class="row">
                <div class="col-md-8 pr-xl-5">
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
                            <tbody id="tbl_confirmar"></tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-8 pr-xl-5 d-none">
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
                            <tbody id="tbl_confirmar"></tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5">
                        <div class="card-header">
                            <h6 class="mb-0">
                                Resumen de pedido</h6>
                        </div>
                        <div class="card-body py-4">
                            <p class="text-muted text-sm"><small>
                                    Los costos de envío y adicionales se calculan en función de los valores que haya ingresado.</small></p>
                            <table class="table card-text">
                                <tbody>
                                    <tr>
                                        <th class="py-4">Subtotal </th>
                                        <td class="py-4 text-right text-muted" id="subtotal">$</td>
                                    </tr>
                                    <tr>
                                        <th class="py-4">Envio</th>
                                        <td class="py-4 text-right text-muted" id="envio"> $</td>
                                    </tr>
                                    <tr>
                                        <th class="py-4">I.V.A</th>
                                        <td class="py-4 text-right text-muted" id="iva">$</td>
                                    </tr>
                                    <tr>
                                        <th class="pt-4">Total</th>
                                        <td class="pt-4 text-right h3 font-weight-normal" id="total">$</td>
                                    </tr>
                                </tbody>

                            </table>
                            <center><a class="btn btn-lg text-light btn-danger" id="btn_resumen">Continuar</a></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container mb-4 my-5" id="form_pago">
        <div class="card">
            <div class="card-header bg-danger">
                <h2 class="text-white text-center">Tarjeta de crédito o débito</h2>
            </div>
            <div class="card-body">

                <div class="container">
                    <form id="payment-form">
                        <input type="hidden" name="token_id" id="token_id">
                        <div class="pymnt-itm card active">
                            <div class="container">
                                <div class="row justify-content-md-center">
                                    <div class="col-md-6">
                                        <div class="p-3">
                                            <h4>Tarjetas de crédito</h4><br>
                                            <img class="img-fluid" src="/assets/img/openpay/cards1.png">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="p-3">
                                            <h4>Tarjetas de débito</h4><br>
                                            <img class="img-fluid" src="/assets/img/openpay/cards2.png">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <input required id="holder_name" class="form-control" type="text" placeholder="Nombre del titular" data-openpay-card="holder_name">
                                                    <label for="holder_name">Nombre del titular</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <input required id="card_number" class="form-control" type="text" data-openpay-card="card_number" placeholder="Número de tarjeta">
                                                    <label for="card_number">Número de tarjeta</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label class="my-1 mr-2">Fecha de expiración (mm/aa)</label>
                                            <div class="form-row align-items-center">
                                                <div class="col-auto">
                                                    <input required class="form-control mb-2" maxlength="2" type="text" placeholder="Mes" data-openpay-card="expiration_month" id="expiration_month">
                                                </div>
                                                <div class="col-auto">
                                                    <input required class="form-control mb-2" maxlength="2" type="text" placeholder="Año" data-openpay-card="expiration_year" id="expiration_year">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="my-1 mr-2">Código de seguridad (cvc)</label>
                                            <div class="form-row align-items-center">
                                                <div class="col-auto">
                                                    <input required class="form-control mb-2" type="password" maxlength="3" placeholder="3 dígitos" data-openpay-card="cvv2" id="cvv2">
                                                </div>
                                                <div class="col-auto">
                                                    <img class="img-fluid" src="/assets/img/openpay/cvv.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class="col-md-auto">
                                        <p class="text-muted">Transacciones realizadas vía:</p>
                                        <center><img src="/assets/img/openpay/openpay.png"><img src="/assets/img/openpay/radio_on.png"></center>
                                    </div>
                                </div>
                                <div class="row justify-content-md-center">
                                    <div class="col-md-auto"><img class="img-fluid" src="/assets/img/openpay/security.png"> Tus pagos se realizan de forma segura con encriptación de 256 bits.</div>
                                </div>
                                <div class="row justify-content-md-center m-5">
                                    <button class="btn btn-lg text-light btn-danger" type="submit" id="pay-button">Pagar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="bkng-tb-cntnt">
        </div>
    </div>

    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/scripts.html'; ?>
    <script type="text/javascript" src="/assets/js/confirmar.js"></script>

</body>

</html>
