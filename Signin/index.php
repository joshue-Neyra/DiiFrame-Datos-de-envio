<!DOCTYPE html>
<html lang="en">

<head>
    <title>DiiFrame - SignIn</title>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/Principal/head.html'; ?>
    <link href="/assets/css/sb-admin.min.css" rel="stylesheet">
    <style>
        body {
            background: #F3C807;
            background: linear-gradient(to right, #F3DA69, #f1d246);
        }

        .avatar {
            width: 100px;
            height: 100px;
            border-right-style: 50%;
            position: absolute;
            top: -50px;
            left: calc(50% - 50px);

        }
    </style>
</head>

<body>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>
    <div class="container">
        <div class="card card-login mx-auto my-5">

            <div class="card-body">
                <img src="/assets/img/avatar.png" class="avatar mb-5 ">
                <h3 class="card-title text-center my-5 text-muted">Crear usuario</h3>
                <form>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <input type="text" id="inp_cli_nombre" class="form-control" placeholder="Precio" required="required" autofocus="true">
                                        <label for="inp_cli_nombre">Nombre</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <input type="text" id="inp_cli_apellido" class="form-control" placeholder="Precio" required="required">
                                        <label for="inp_cli_apellido">Apellido</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="email" id="inp_cli_email" class="form-control" placeholder="Correo Electronico" required="required">
                            <label for="inp_cli_email">Correo Electronico</label>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" class="form-control" placeholder="Contraseña" required="required" id="inp_cli_contrasena">
                            <label for="inp_cli_contrasena">Contraseña</label>
                        </div>
                    </div>
                     <a class="btn btn-primary btn-block text-white" onclick="CrearCliente();">Crear</a>
                </form>
                <hr class="my-4">
                <p class="text-muted text-center">¿Ya tienes una cuenta?</p>
                <a href="/login/" class="nav-link"><button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit">Iniciar Sesión</button></a>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/assets/js/signin.js"></script>

</body>

</html>
