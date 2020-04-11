<!DOCTYPE html>
<html lang="en">

<head>
    <title>DiiFrame - Generar Envio</title>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/Principal/head.html'; ?>
    <link href="/assets/css/sb-admin.min.css" rel="stylesheet">
    <style>
        body {
            background: #F3C807;
            background: linear-gradient(to right, #F3DA69, #f1d246);
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

<body>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>
    <div class="loader"></div>
    <div class="container">
        <div class="card card-login mx-auto my-5">

            <div class="card-body">
                <h3 class="card-title text-center my-5 text-muted">Generar Envio</h3>
                <form>
                    <div class="form-group ">
                        <label class="form-label">Nota_ID</label>
                        <input type="text" id="inp_Nota_ID" class="form-control" placeholder="Nota_ID" required="required" value="<?php echo $_GET['Nota_ID']; ?>">
                        <label class="form-label">Orden Ivoy ID</label>
                        <input type="text" id="OrdenID" class="form-control"required="required">
                    </div>
                    <div class="form-group d-none">
                        
                        <label class="form-label">Indicaciones Cliente</label>
                        <input type="text" id="Cli_Indicaciones" class="form-control">
                        <label class="form-label">Nombre Cliente</label>
                        <input type="text" id="Cli_Nombre" class="form-control">
                        <label class="form-label">Celular Cliente</label>
                        <input type="text" id="Cli_Celular" class="form-control">
                        <label class="form-label">exterior Cliente</label>
                        <input type="text" id="Cli_Num_Exterior" class="form-control">
                        <label class="form-label">Interior Cliente</label>
                        <input type="text" id="Cli_Num_Interior" class="form-control">
                        <label class="form-label">Lat Cliente</label>
                        <input type="text" id="Cli_Lat" class="form-control">
                        <label class="form-label">Long Cliente</label>
                        <input type="text" id="Cli_Long" class="form-control">
                        <label class="form-label">Colonia Cliente</label>
                        <input type="text" id="Cli_Colonia" class="form-control">
                        <label class="form-label">Calle Cliente</label>
                        <input type="text" id="Cli_Calle" class="form-control">
                        <label class="form-label">CP Cliente</label>
                        <input type="text" id="Cli_CP" class="form-control">
                    </div>
                    <div class="form-group d-none">

                        <label class="form-label">Telefono Empresa</label>
                        <input type="text" id="Emp_Tel" class="form-control">
                        <label class="form-label">Exterior Empresa</label>
                        <input type="text" id="Emp_Num_Exterior" class="form-control">
                        <label class="form-label">Interior Empresa</label>
                        <input type="text" id="Emp_Num_Interior" class="form-control">
                        <label class="form-label">Lat Empresa</label>
                        <input type="text" id="Emp_Lat" class="form-control">
                        <label class="form-label">Long Empresa</label>
                        <input type="text" id="Emp_Long" class="form-control">
                        <label class="form-label">Colonia Empresa</label>
                        <input type="text" id="Emp_Colonia" class="form-control">
                        <label class="form-label">Calle Empresa</label>
                        <input type="text" id="Emp_Calle" class="form-control">
                        <label class="form-label">CP Empresa</label>
                        <input type="text" id="Emp_CP" class="form-control">
                    </div>
                </form>

            </div>
        </div>
    </div>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/scripts.html'; ?>
    <script type="text/javascript" src="/assets/js/envios/envio.js"></script>

</body>

</html>
