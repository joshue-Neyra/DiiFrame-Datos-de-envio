<!DOCTYPE html>
<html lang="en">

<head>
    <title>DiiFrame - Elegir Marco</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
    <?php session_start();
    $imagen = $_SESSION['Nombre']; 
    $Orientacion = $_SESSION['Orientacion'];
    ?>
    <link href="/assets/css/cajasmarcos.min.css" rel="stylesheet">
    <link href="/assets/device-mockups/device-mockups.min.css" rel="stylesheet">
    <style>
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

        .brillo {
            filter: brightness(110%);
        }

        #link { color:FF0000; }

    </style>
</head>

<body id="page-top">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>

    <input class="d-none" id="Imagen_Usuario" value="/assets/tools/imageupload/<?php echo $imagen;?>">
    <input class="d-none" id="Imagen_Orientacion" value="<?php echo $Orientacion;?>">
    <section class="features bg-light mb-5" id="features">
        <div class="container pb-5">

            <div class="card">
                <div class="card-header text-center bg-primary">
                    <h3>Personaliza tu marco</h3>
                </div>
                <div class="card-body row justify-content-md-center">
                    <div class=" col-md-6">
                        <div class="form-group">
                            <h4 class="text-primary text-center">1) Tamaño marialuisa <i class="far fa-question-circle" data-toggle="popover" data-img="/assets/img/marialuisa.png" title="Marialuisa o paspartú es el pequeño espacio que rodea las fotografías o arte antes del marco, en caso de que existan"></i> :</h4>


                            <select class="form-control" id="Tamano_Marialuisa">  //select de marialuisa
                            </select>
                        </div>
                    </div>
                    <div class="swatch-selector col-md-6" id="form_marialuisa2">
                        <h4 class="text-primary text-left">2) Elegir tipo de marialuisa</h4>
                        <div class="form-group ">

                            <div class="row justify-content-md-center my-3">
                                <div class="col-md-4">
                                    <h5 class="text-warning">a)Color cartulina:</h5>
                                </div>
                                <div class="col-md-8" id="form_marialuisa"></div>
                            </div>
                            <div class="row justify-content-md-center my-3">
                                <div class="col-md-4">
                                    <h5 class="text-warning">b)Entre vidrios:</h5>
                                </div>
                                <div class="col-md-8" id="form_entrevidrios"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4 class="text-primary text-center">3) Vidrio Frontal:</h4>
                        <div class="row justify-content-md-center" id="form_vidrios">
                        </div>
                    </div>

                </div>
                <label class="d-none">Tamaño impresion</label><input id="Tamano_ID" class="d-none" value=" <?php echo $size=$_GET['Tamano_ID'];?>">
                <label class="d-none">Marialuisa</label><input id="Color" class="d-none">
                <label class="d-none">Vidrio Atras</label><input id="input_vidrio_t" class="d-none" value="false">
                <label class="d-none">Vidrio Frontal</label><input id="input_vidrio_f" class="d-none">
            </div>


        </div>
        <div class="loader"></div>
        <div class="container">
            <ol class="breadcrumb justify-content-center" id="Filtro_Familia">
                <li class="breadcrumb-item active" onclick="Marialuisa(1);">¿Un cuadro para tu casa?</li>
                <li class="breadcrumb-item active" onclick="Marialuisa(2);">¿Un cuadro para tu oficina?</li>
                <li class="breadcrumb-item active" onclick="Marialuisa(3);">¿Un regalo?</li>
            </ol>
            <p class="text-muted"><small>*Tu imagen es unicamente ilustrativa, esta puede variar al momento que la recibas</small></p>
            <div class="row justify-content-md-center" id="Productos">
                <!-- aqui se imprimen los marcos con fotos -->
            </div>
        </div>
    </section>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>  <!-- cargar el footer -->
    <script type="text/javascript" src="/assets/js/ImpresionDigital/Productos.js"></script>
    <script>
        $('[data-toggle="popover"]').popover({
            //trigger: 'focus',
            trigger: 'hover',
            html: true,
            content: function() {
                return '<img class="img-fluid" src="' + $(this).data('img') + '" />';
            },
            title: 'Toolbox'
        })

    </script>

</body>

</html>
