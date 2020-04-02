<!DOCTYPE html5>
<html lang="en">

<head>
    <title>DiiFrame - Carrito</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
    <link href="/assets/css/sb-admin.min.css" rel="stylesheet">
    <link href="/assets/css/proceso.min.css" rel="stylesheet">

    <style>
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

        .card {
            box-shadow: 0 2px 1rem rgba(0, 0, 0, 0.15);
        }

    </style>
</head>

<body class="bg-light" id="page-top">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/Sesion/sesion_Usuario.php'; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>

    <div class="container mb-5 my-5">

        <div class="row">
            <div class="col-md-12">
                <div style="height: 2em"></div>
                <div class="card">
                    <div class="card-header">
                        <h5>Usuario</h5>
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" id="stat-1-tab" data-toggle="tab" href="#stat-1" role="tab" aria-controls="stat-1" aria-selected="true">Datos de usuario</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="task-1-tab" data-toggle="tab" href="#task-1" role="tab" aria-controls="task-1" aria-selected="false">Direcciones de entrega</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pedidos-1-tab" data-toggle="tab" href="#pedidos" role="tab" aria-controls="pedidos" aria-selected="false">Pedidos</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="stat-1" role="tabpanel" aria-labelledby="stat-1-tab">

                                <div class="card-body">
                                    <form id="form_cliente">
                                        <h6 class="heading-small text-muted mb-4">Información de usuario</h6>
                                        <div class="pl-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="inp_cli_nombre">Nombre</label>
                                                        <input type="text" id="inp_cli_nombre" class="form-control form-control-alternative" placeholder="Nombre" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="inp_cli_apeliidos">Apellidos</label>
                                                        <input type="text" id="inp_cli_apeliidos" class="form-control form-control-alternative" placeholder="Apellidos" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="inp_cli_email">Email</label>
                                                        <input type="email" id="inp_cli_email" class="form-control form-control-alternative" placeholder="Email" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="inp_cli_rfc">RFC</label>
                                                        <input type="text" id="inp_cli_rfc" class="form-control form-control-alternative" placeholder="RFC">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="inp_cli_razonsocial">Razón Social</label>
                                                        <input type="email" id="inp_cli_razonsocial" class="form-control form-control-alternative" placeholder="Razon Social">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                        <!-- Address -->
                                        <h6 class="heading-small text-muted mb-4">Información de facturación</h6>
                                        <div class="pl-lg-4">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="inp_cli_calle">Calle</label>
                                                        <input id="inp_cli_calle" class="form-control form-control-alternative" placeholder="Calle" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="inp_cli_num_ext">Num. Exterior</label>
                                                        <input id="inp_cli_num_ext" class="form-control form-control-alternative" placeholder="Num. Exterior" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="inp_cli_num_int">Num. Interior</label>
                                                        <input id="inp_cli_num_int" class="form-control form-control-alternative" placeholder="Num. Interior" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="inp_cli_colonia">Colonia</label>
                                                        <input type="text" id="inp_cli_colonia" class="form-control form-control-alternative" placeholder="Colonia">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="inp_cli_delegacion">Municipio</label>
                                                        <input type="text" id="inp_cli_delegacion" class="form-control form-control-alternative" placeholder="Municipio">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="inp_cli_cp">Codigo Postal</label>
                                                        <input type="number" id="inp_cli_cp" class="form-control form-control-alternative" placeholder="Codigo Postal">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="inp_cli_estado">Estado</label>
                                                        <input type="text" id="inp_cli_estado" class="form-control form-control-alternative" placeholder="estado">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="inp_cli_pais">País</label>
                                                        <input type="text" id="inp_cli_pais" class="form-control form-control-alternative" placeholder="País">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                        <!-- Description -->
                                        <h6 class="heading-small text-muted mb-4">Información de contacto</h6>
                                        <div class="pl-lg-4">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="inp_cli_tel">Telefono</label>
                                                        <input type="tel" pattern="[0-9]{10}" id="inp_cli_tel" class="form-control form-control-alternative" placeholder="Telefono" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group focused">
                                                        <label class="form-control-label" for="inp_cli_cel">Celular</label>
                                                        <input type="tel" pattern="[0-9]{10}" id="inp_cli_cel" class="form-control form-control-alternative" placeholder="Celular" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pl-lg-4 my-3">
                                            <div class="row justify-content-end">
                                                <div class="col-lg-2">
                                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="task-1" role="tabpanel" aria-labelledby="task-1-tab">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Dirección</th>
                                            <th scope="col">Descripcion</th>
                                            <th scope="col">Celular</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl_direcciones"></tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pedidos" role="tabpanel" aria-labelledby="pedidos-1-tab">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No. Nota</th>
                                            <th scope="col">Producto</th>
                                            <th scope="col">Estatus</th>
                                            <th scope="col">Precio</th>
                                            <th scope="col">Proceso</th>
                                            <th scope="col">Detalle</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl_pedidos"></tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
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
    <script type="text/javascript" src="/assets/js/Usuario/cliente.js"></script>


</body>

</html>
