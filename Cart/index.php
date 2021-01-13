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

        .border-left-warning {
            border-left: .25rem solid #f6c23e !important;
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
                <div class="bs-wizard-info text-center">Tus pagos se realizan de forma segura con encriptación de 256
                    bits</div>
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
                                <th class="text-center">Imagen </th>
                                <th class="text-center">Proyecto</th>
                                <th class="text-center">Cantidad</th>
                                <th class="text-center">Precio</th>
                                <th class="text-center"> Opcion </th>
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
                        <a class="btn btn-block btn-primary" href="/build/">Continuar comprando</a>
                    </div>
                    <div class="col-lg-6  text-right">
                        <button type="button" class="btn btn-block btn-success " disabled id="btn_show"
                            onclick="ShowDireccion()">
                            Continuar con el Pedido
                        </button>

                    </div>
                    <div class="col-lg-8 my-3">
                        <center><button type="button" class="btn btn-warning btn-small text-white" data-toggle="modal"
                                data-target="#logoutModal">
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
                                <th scope="col">Proceso</th>
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
        <div class="row justify-content-md-center" id="ClienteDirecciones">
        </div>
        <div class="card mx-auto" id="CrearDireccion">
            <div class="card-body">
                <h3 class="mb-2 my-3 text-center text-danger">Datos de envio</h3>

                <!-- form principal -->
                <form action="#" id="form_principal">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="calle">Calle</label>
                                <input type="text" placeholder="Calle" id="calle" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="num_ext">Número Ext</label>
                                <input type="text" placeholder="Número Ext" id="num_ext" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="num_int">Número Int</label>
                                <input type="text" placeholder="Número Int" id="num_int" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="colonia">Colonia</label>
                                <input type="text" placeholder="Colonia" id="colonia" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alcaldia">Alcaldía o Municipio</label>
                                <input type="text" placeholder="Alcaldía o Municipio" id="alcaldia" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input type="text" placeholder="Estado" id="estado" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pais">País</label>
                                <input type="text" placeholder="País" id="pais" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cp">Código Postal</label>
                                <input type="text" placeholder="Código Postal" id="cp" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="celular">Celular</label>
                            <input type="number" placeholder="Celular" id="celular" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="telefono">Teléfono</label>
                            <input type="number" placeholder="Teléfono" id="telefono" class="form-control">
                        </div>
                    </div>
                    <label for="inp_referencias">Referencias</label>
                    <textarea rows="3" name="p_mensaje" class="form-control" id="inp_referencias"
                        placeholder="Referencias" maxlength="250"></textarea>

                    <button type="submit" id="button_aceptar" class="btn btn-warning mt-4">Valida tu Dirección</button>
                    <button type="submit" id="resetBTN" class="btn btn-danger mt-4">Reiniciar</button>
                </form>
                  <!-- fin de form principal -->
                    <!-- input que toma google para el mapa y generar direccion -->
                <div class="mb-4" id="direccion_entrega">
                    <input type="text" id="pac-input" class="form-control">
                </div>
                    <!-- fin de input tomado por google -->
                    
                <!-- form generado por google -->
                <form id="target">
                    <div class="container mx-auto">

                        <table id="address" class="table disabled">
                            <tr>
                                <td class="label">Calle y número</td>
                                <td class="slimField"><input class="form-control" id="route" required="true"
                                        disabled="true" /></td>
                                <td class="wideField" colspan="2"><input class="form-control disabled" required="true"
                                        disabled="true" id="street_number" /></td>
                            </tr>
                            <tr>
                                <td class="label">Ciudad</td>
                                <td class="wideField" colspan="3"><input class="form-control" id="locality"
                                        disabled="true" /></td>
                            </tr>
                            <tr>


                            </tr>
                            <tr>
                                <td class="label">Estado</td>
                                <td class="slimField"><input class="form-control" id="administrative_area_level_1"
                                        disabled="true" /></td>
                            </tr>
                            <tr>
                                <td class="label">Colonia</td>
                                <td class="wideField"><input class="form-control" id="administrative_area_level_2"
                                        disabled="true" /></td>
                                <td class="label">Codigo Postal</td>
                                <td class="wideField"><input class="form-control" id="postal_code" disabled="true" />
                                </td>
                            </tr>
                            <tr>
                                <td class="label">País</td>
                                <td class="wideField" colspan="3"><input class="form-control" id="country"
                                        disabled="true" />
                                    <input class="d-none" id="lat" value="" disabled="true" />
                                    <input class="d-none" id="long" value="" disabled="true" /></td>
                            </tr>
                        </table>
                    </div>

                <!-- fin de form generado por google -->

                    <div class="pac-card d-none" id="pac-card">
                        <div>
                            <div id="type-selector" class="pac-controls d-none">
                                <input type="radio" name="type" id="changetype-address" checked="checked">
                            </div>
                        </div>
                    </div>
                    <div id="map"></div>
                    <div class="" id="infowindow-content">
                        <img src="" width="16" height="16" id="place-icon">
                        <span id="place-name" class="title"></span><br>
                        <span id="place-address"></span>
                    </div>
                    <div class="mx-auto my-4">
                        <button type="submit" class="btn  btn-success">
                            Guardar
                        </button>
                        <button id="reset" type="reset" class="btn  btn-danger">
                            Cancelar
                        </button></div>
                </form>


            </div>
        </div>
    </div>
    <div class="loader"></div>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
    <script type="text/javascript" src="/assets/js/Carrito/cart.js"></script>
    <script type="text/javascript" src="/assets/js/Carrito/pedido.js"></script>
    <!-- <script type="text/javascript" src="/assets/js/Principal/DireccionCompletar.js"></script> -->
    <script src="/assets/js/Principal/formPrincipal.js"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZUUeX_yN1WG82W6v4ZyqF9UeygP0gSME&libraries=places&callback=initMap"
        async defer></script>


</body>

</html>