<!DOCTYPE html5>
<html lang="en">

<head>
    <title>DiiFrame - Carrito</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
    <link href="/assets/css/sb-admin.min.css" rel="stylesheet">
    <link href="/assets/css/proceso.min.css" rel="stylesheet">

    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            width: 100%;
            height: 350px;
        }

    </style>
</head>

<body id="page-top">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/Sesion/sesion_Usuario.php'; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>

    <div class="container my-5">
        <div class="row bs-wizard" style="border-bottom:0;">

            <div class="col-md-3 bs-wizard-step active" id="step1">
                <div class="text-center bs-wizard-stepnum">Carrito</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="/Cart/" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Revisa tu carrito.</div>
            </div>

            <div class="col-md-3 bs-wizard-step disabled" id="step2">
                <!-- complete -->
                <div class="text-center bs-wizard-stepnum">Entrega</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="/Cart/" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Ingresa los datos de entrega</div>
            </div>

            <div class="col-md-3 bs-wizard-step disabled" id="step3">
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
    <div class="container mb-4 my-5" id="form-carrito">

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
                        <a class="btn btn-block btn-primary" href="/">Continuar comprando</a>
                    </div>
                    <div class="col-lg-6  text-right">
                        <button type="button" class="btn btn-block btn-success " disabled id="btn_show" onclick="ShowDireccion()">
                            Continuar con el Pedido
                        </button>

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
    <div class="container mb-4 my-5" id="form-pedidos">
        <div class="card row">
            <div class="col-md-12">
                <h3 class="mb-3 my-3 text-center text-danger">Tus pedidos</h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No. Nota </th>
                                <th scope="col">Producto</th>
                                <th scope="col">Estatus</th>
                                <th scope="col">Precio</th>
                                <th scope="col"> Detalle </th>
                            </tr>
                        </thead>
                        <tbody id="tbl_pedidos">


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-4 my-5" id="form-direccion">
        <div class="card mx-auto ">
            <div class="card-body">
                <h3 class="mb-3 my-3 text-center text-danger">Datos de envio</h3>
                <form id="target">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="tel" pattern="[0-9]{10}" id="inp_cli_cel" class="form-control" placeholder="Celular" required="required" autofocus="autofocus">
                                    <label for="inp_cli_cel">Celular</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input type="tel" pattern="[0-9]{8}" title="Ten digits code" id="inp_cli_tel" class="form-control" placeholder="Teléfono" required="required">
                                    <label for="inp_cli_tel">Teléfono</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="pac-input" class="form-control" placeholder="Dirección de Entrega" required="required">
                            <label for="pac-input">Dirección de Entrega</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="pac-input">Referencias</label>
                            <textarea rows="3" name="p_mensaje" class="form-control" id="inp_referencias" placeholder="Referencias" maxlength="250"required></textarea>
                            
                        </div>
                    </div>
                    <table id="address" class="d-none">
                        <tr>
                            <td class="label">Street address</td>
                            <td class="slimField"><input class="field" id="street_number" disabled="true" /></td>
                            <td class="wideField" colspan="2"><input class="field" id="route" disabled="true" /></td>
                        </tr>
                        <tr>
                            <td class="label">City</td>
                            <td class="wideField" colspan="3"><input class="field" id="locality" disabled="true" /></td>
                        </tr>
                        <tr>
                            <td class="label">State</td>
                            <td class="slimField"><input class="field" id="administrative_area_level_1" disabled="true" /></td>
                            <td class="label">Zip code</td>
                            <td class="wideField"><input class="field" id="postal_code" disabled="true" /></td>
                        </tr>
                        <tr>
                            <td class="label">Country</td>
                            <td class="wideField" colspan="3"><input class="field" id="country" disabled="true" />
                                <input id="lat" value="" disabled="true" />
                                <input id="long" value="" disabled="true" /></td>
                        </tr>
                    </table>
                    <div class="pac-card" id="pac-card">
                        <div>
                            <div id="type-selector" class="pac-controls d-none">
                                <input type="radio" name="type" id="changetype-address" checked="checked">
                            </div>
                        </div>
                    </div>
                    <div id="map"></div>
                    <div id="infowindow-content">
                        <img src="" width="16" height="16" id="place-icon">
                        <span id="place-name" class="title"></span><br>
                        <span id="place-address"></span>
                    </div>
                    <button type="submit" class="btn btn-block btn-success">
                        Continuar
                    </button>
                </form>


            </div>
        </div>
    </div>

    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
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
    <script type="text/javascript" src="/assets/js/DireccionCompletar.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZUUeX_yN1WG82W6v4ZyqF9UeygP0gSME&libraries=places&callback=initMap" async defer></script>


</body>

</html>
