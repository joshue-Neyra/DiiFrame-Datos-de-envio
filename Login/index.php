
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DiiFrame - Login</title>
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
                <img src="http://www.vijayyadav.tk/images/avatar.png" class="avatar mb-5 ">
                <h3 class="card-title text-center my-5 text-muted">Iniciar sesión</h3>
                <form>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="email" id="inp_usuario" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                            <label for="inp_usuario">Usuario</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="inp_contrasena" class="form-control" placeholder="Password" required="required">
                            <label for="inp_contrasena">Contraseña</label>
                        </div>
                    </div>
                    <a class="btn btn-primary btn-block text-white" onclick="login();">Iniciar</a>
                </form>

                <hr class="my-4">
                <p class="text-muted text-center">¿Aún no tienes una cuenta?</p>
                <a class="nav-link" href="/Signin/"><button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit">Crear Cuenta</button></a>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/assets/js/login.js"></script>

</body>

</html>
