<!DOCTYPE html5>
<html lang="en">

<head>
    <title>DiiFrame - Confirmar</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
    
    <link href="/assets/css/proceso.min.css" rel="stylesheet">
    <link href="/assets/css/sb-admin.min.css" rel="stylesheet">
    <style>
        .card {
            box-shadow: 0 2px 1rem rgba(0, 0, 0, 0.15);
        }

        .table td,
        .table th {
            padding: 1.5rem;
            vertical-align: top;
        }

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
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/Sesion/sesion_Usuario.php'; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>
    <div class="loader"></div>
    <div class="container my-5">
        <div class="row bs-wizard" style="border-bottom:0;">

            <div class="col-md-3 bs-wizard-step complete" id="step1">
                <div class="text-center bs-wizard-stepnum">Carrito</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="/Cart/" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Revisa tu carrito.</div>
            </div>

            <div class="col-md-3 bs-wizard-step complete" id="step2">
                <!-- complete -->
                <div class="text-center bs-wizard-stepnum">Entrega</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="/Cart/" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Ingresa los datos de entrega</div>
            </div>

            <div class="col-md-3 bs-wizard-step active" id="step3">
                <!-- complete -->
                <div class="text-center bs-wizard-stepnum">Confirmación</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="#" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Confirma todos los datos antes de realizar el pago</div>
            </div>

            <div class="col-md-3 bs-wizard-step disabled" id="step4">
                <!-- active -->
                <div class="text-center bs-wizard-stepnum">Pago</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="#" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Tus pagos se realizan de forma segura con encriptación de 256 bits</div>
            </div>
        </div>
    </div>
    <section id="form_productos">
        <div class="container">
            <h3 class="mb-3 my-3 text-center text-danger">Cotización No. <?php echo $_GET['Nota_ID'];?></h3>
            <input id="Nota_ID" class="d-none" value="<?php echo $_GET['Nota_ID'];?>">
            <div class="row">
                <div class="col-md-8  card bg-light">
                    <div class="table-responsive my-3">
                        <table class="table ">
                            <thead class="thead-light">
                                <tr class="table-borderless">
                                    <th scope="col">Imagen </th>
                                    <th scope="col">Producto</th>
                                    <th scope="col" class="text-center">Cantidad</th>
                                    <th scope="col" class="text-right">Precio</th>
                                    <th> Opcion </th>
                                </tr>
                            </thead>
                            <tbody id="tbl_confirmar"></tbody>
                        </table>
                        <table id="table_correo" class="table d-none">
                            <thead class="thead-light">
                                <tr class="table-borderless">
                                    <th scope="col">Imagen </th>
                                    <th scope="col">Producto</th>
                                    <th scope="col" class="text-center">Cantidad</th>
                                    <th scope="col" class="text-right">Precio</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_correo"></tbody>
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
                    <div class="card mb-3">
                        <div class="card-header">
                            <h4 class="mb-0">
                                Resumen de pedido</h4>
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
                                    <tr id="tr_descuento">
                                        <th class="py-4">Descuento</th>
                                        <td class="py-4 text-right text-muted" id="descuento">- $</td>
                                    </tr>
                                    <tr>
                                        <th class="pt-4">Total</th>
                                        <td class="pt-4 text-right h5 font-weight-normal" id="total">$</td>
                                    </tr>
                                </tbody>

                            </table>
                            <form id="Pay">
                                <input type="text" class="d-none" required id="inp_subtotal">
                                <input type="text" class="d-none" required id="inp_descuento" value="0">
                                <input type="text" class="d-none" required id="inp_envio">
                                <input type="text" class="d-none" required id="inp_monto">
                                <input type="text" class="d-none" required id="inp_ivanota">
                                <input type="text" class="d-none" required id="inp_total">

                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" required class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Acepto los<a href="/Terminos/"> términos y condiciones</a></label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" required class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">He leído y estoy de acurerdo con la<a href="/PrivacyPolicy/"> Politica de privacidad</a></label>
                                </div>

                                <center><button type="submit" class="btn btn-lg text-light btn-warning">Continuar</button></center>
                            </form>


                        </div>
                    </div>
                    <div class="card mb-5">
                        <div class="card-header">
                            <h4 class="mb-0">
                                Codigos Promocionales</h4>
                        </div>
                        <div class="card-body py-4">

                            <form id="form_voucher">
                                <div class="form-row align-items-center">
                                    <div class="col-sm-12 my-1">
                                        <div class="input-group">
                                            <input type="text" required class="form-control" id="codigo_voucher" placeholder="Codigo Promoción">
                                            <button id="btn_voucher" type="submit" class="btn btn-primary text-sm">Canjear</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container mb-4 my-5" id="form_pago">
        <div class="card">
            <div class="card-header bg-warning">
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
                                                    <input required id="card_number" maxlength="16" class="form-control" type="text" data-openpay-card="card_number" placeholder="Número de tarjeta">
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
                                                    <input required class="form-control mb-2" type="password" maxlength="4" placeholder="3 o 4 dígitos" data-openpay-card="cvv2" id="cvv2">
                                                </div>
                                                <div class="col-auto">
                                                    <img class="img-fluid" src="/assets/img/openpay/cvv.png">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="inp_factura" name="inp_factura">
                                        <label class="custom-control-label" for="inp_factura">Requiero Factura</label>
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
                                    <button class="btn btn-lg text-light btn-secondary" type="submit" id="pay-button">Pagar</button>
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

    <div class="modal fade" id="ModalFacturacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmar datos de facturación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_facturacion">
                        <div class="form-group">
                            <label for="inp_razon_social">Razón social</label>
                            <input type="text" class="form-control" id="inp_razon_social" required>
                        </div>
                        <div class="form-group">
                            <label for="inp_rfc">R.F.C.</label>
                            <input type="text" class="form-control" id="inp_rfc" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="cancelar_facturacion" class="btn btn-secondary">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://openpay.s3.amazonaws.com/openpay.v1.min.js"></script>
    <script type='text/javascript' src="https://openpay.s3.amazonaws.com/openpay-data.v1.min.js"></script>
    <script type="text/javascript" src="/assets/js/Confirmar/confirmar.js"></script>

</body>

</html>
