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
                <img src="/assets/img/avatar.png" class="avatar mb-5 ">
                <h3 class="card-title text-center my-5 text-muted">Recuperar Contraseña</h3>
                <p class="text-muted text-center">Ingresa el correo con el que registraste tu cuenta</p>
                <form id="form_recuperar">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="email" id="inp_correo" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                            <label for="inp_correo">Correo</label>
                        </div>
                    </div>
                    <center><button class="btn btn-primary" type="submit">Enviar</button></center>
                </form>

            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/assets/js/recuperar.js"></script>

</body>

</html>