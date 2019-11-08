<!DOCTYPE html5>
<html lang="en">

<head>
    <title>DiiFrame - Login</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
    <link href="/assets/css/login.min.css" rel="stylesheet">
    <link href="/assets/css/sb-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; ?>
    <!-- Navigation -->
    <!-- Navigation -->
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body ">
                        <img src="http://www.vijayyadav.tk/images/avatar.png" class="avatar mb-5">
                        <input id="inp_pedido" class="d-none" value=" <?php echo $size=$_GET['Pedido'];?>">
                        <h5 class="card-title text-center my-5">Iniciar sesión</h5>
                        <form class="form-signin" onsubmit="login();" autocomplete="on">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="email" id="inp_usuario" class="form-control" placeholder="Correo Electronico" required="required" autofocus="autofocus" autocomplete="current-username">
                                    <label for="inp_usuario">Correo Electronico</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="password" id="inp_contraseña" class="form-control" placeholder="Contraseña" required="required" autocomplete="current-password">
                                    <label for="inp_contraseña">Contraseña</label>
                                </div>
                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Recordar contraseña</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>

                        </form>
                        <hr class="my-4">
                        <p class="text-muted text-center">¿Aún no tienes una cuenta?</p>
                        <button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit">Crear Cuenta</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/scripts.html'; ?>
    <script type="text/javascript" src="/assets/js/login.js" async></script>

</body>

</html>
