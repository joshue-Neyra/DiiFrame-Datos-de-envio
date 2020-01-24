<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DiiFrame - Inicio</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
    <link href="/assets/css/hover.min.css" rel="stylesheet">
    <style>
        #subscribeModal .modal-content {
            overflow: hidden;
        }

        a.h2 {
            color: #f1d145;
            margin-bottom: 0;
            text-decoration: none;
        }

        #subscribeModal .form-control {
            height: 56px;
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
            padding-left: 30px;
        }

        #subscribeModal .btn {
            border-top-right-radius: 30px;
            border-bottom-right-radius: 30px;
            padding-right: 20px;
            background: #f1d145;
            border-color: #f1d145;
        }

        #subscribeModal .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #f1d145;
            outline: 0;
            box-shadow: none;
        }

        #subscribeModal .top-strip {
            height: 155px;
            background: #f1d145;
            transform: rotate(141deg);
            margin-top: -94px;
            margin-right: 190px;
            margin-left: -130px;
            border-bottom: 65px solid #33d3d9;
            border-top: 10px solid #33d3d9;
        }

        #subscribeModal .bottom-strip {
            height: 155px;
            background: #f1d145;
            transform: rotate(112deg);
            margin-top: -110px;
            margin-right: -215px;
            margin-left: 300px;
            border-bottom: 65px solid #33d3d9;
            border-top: 10px solid #33d3d9;
        }

        /**************************/
        /****** modal-lg stips *********/
        /**************************/
        #subscribeModal .modal-lg .top-strip {
            height: 155px;
            background: #f1d145;
            transform: rotate(141deg);
            margin-top: -106px;
            margin-right: 457px;
            margin-left: -130px;
            border-bottom: 65px solid #33d3d9;
            border-top: 10px solid #33d3d9;
        }

        #subscribeModal .modal-lg .bottom-strip {
            height: 155px;
            background: #f1d145;
            transform: rotate(135deg);
            margin-top: -115px;
            margin-right: -339px;
            margin-left: 421px;
            border-bottom: 65px solid #33d3d9;
            border-top: 10px solid #33d3d9;
        }

    </style>

</head>

<body id="page-top">

    <!-- Navigation -->
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav.html'; ?>
    <header class="masthead" style="background-image: url('/assets/img/header.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Un marco es el toque final perfecto </h1>
                        <span class="subheading">Verdaderos Marcos persinalizados</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Navigation 
    <div class="container-fluid  bg-light">
        <div class="row no-gutter">
            <div id="carouselExampleIndicators" class="carousel slide col-lg-8" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active" style="background-image: url('/assets/img/header.jpg')">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item" style="background-image: url('/assets/img/header2.jpg')">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item" style="background-image: url('/assets/img/header3.jpg')">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="col-md-8 col-lg-4 align-self-center">
                <div class="py-5">
                    <div class="container text-center">
                        <h1 class=" mb-4 text-uppercase font-weight-bold">Un marco es el toque final perfecto </h1>
                        <h3 class="mb-5">Verdaderos marcos personalizados desde $39.</h3>
                        <button class="btn btn-warning btn-lg text-white">Iniciar Enmarcado</button>

                    </div>
                </div>
            </div>
        </div>
    </div>-->

    <div class="container-fluid" id="howitworks">
        <div class="row no-gutter">
            <div class="col-lg-6 my-auto showcase-text">

                <div class="row align-self-center">
                    <div class="col-lg-12 mb-5">
                        <h1 class="text-center text-uppercase font-weight-bold"><strong>Como trabajamos</strong></h1>
                    </div>
                    <div class="col-lg-12 ">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex">
                                <a class="fa-stack fa-2x m-auto " onmouseover="slide1()" id="slide1" data-target="#carouselExampleIndicators2" data-slide-to="0">
                                    <i class="fas fa-circle fa-stack-2x "></i>
                                    <i class="fas  fa-stack-1x fa-inverse text-white">1</i>
                                </a>
                            </div>
                            <h3 class="text-center">Subir foto o envíanos tu arte</h3>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex">
                                <a class="fa-stack fa-2x m-auto" onmouseover="slide2()" id="slide2" data-target="#carouselExampleIndicators2" data-slide-to="1">
                                    <i class="fas fa-circle fa-stack-2x "></i>
                                    <i class="fas  fa-stack-1x fa-inverse">2</i>
                                </a>
                            </div>
                            <h3 class="text-center">Selecciona tu marco favorito</h3>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex">
                                <a class="fa-stack fa-2x m-auto" onmouseover="slide3()" id="slide3" data-target="#carouselExampleIndicators2" data-slide-to="2">
                                    <i class="fas fa-circle fa-stack-2x "></i>
                                    <i class="fas  fa-stack-1x fa-inverse">3</i>
                                </a>
                            </div>
                            <h3 class="text-center">Construimos tu marco y enviamos a tu domicilio</h3>
                            <p class="lead mb-0 text-muted text-center">(Construimos y ensamblamos a mano y enviamos)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="carouselExampleIndicators2" class="carousel slide col-lg-6" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <!-- Slide One - Set the background image for this slide in the line below -->
                    <div class="carousel-item active" style="background-image: url('/assets/img/2-1.jpg')">
                    </div>
                    <!-- Slide Two - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('/assets/img/2-2.jpg')">
                    </div>
                    <!-- Slide Three - Set the background image for this slide in the line below -->
                    <div class="carousel-item" style="background-image: url('/assets/img/2-3.jpg')">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <section id="projects" class="projects-section bg-light">
        <div class="container">

            <!-- Featured Project Row -->
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-8 col-lg-7">
                    <img class="img-fluid mb-3 mb-lg-0" src="/assets/img/testimonial1.jpg" alt="Marco">
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>Ponlo en perspectiva</h4>
                        <p class="text-black-50 mb-0">Hay algo satisfactorio en enmarcar una imagen. En dii frame es rápido, fácil y es la mejor manera de hacer que sus
                            fotos se destaquen.</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">

                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>Potencial ilimitado</h4>
                        <p class="text-black-50 mb-0">Por que creemos en las opciones, ofrecemos una amplia gama de marcos para elegir. Ya sea que desee un marco
                            clásico o moderno, contamos con diferentes modelos para que elijas con el que más se identifique tu arte.</p>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 align-items-center">
                    <center><img class="img-fluid mb-3 mb-lg-0" src="/assets/img/testimonial2.jpg" alt="Ideas para utilizar tu marco"></center>
                </div>
            </div>

            <div class="row">
                <!-- Testimonial 1 -->
                <div class="col-xl-4 col-md-6 mb-4 hvr-float-shadow" data-toggle="modal" data-target="#Modal_T1">
                    <div class="card border-0 shadow">
                        <img src="/assets/img/testimonial3.jpg" class="card-img-top" alt="Ideas para utilizar tu marco">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">Ideas para utilizar un marco</h5>
                            <div class="card-text text-black-50">Los marcos no sólo sirven para enmarcar fotos bonitas sino que son un elemento mucho más versátil de lo que creemos</div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="Modal_T1" tabindex="-1" role="dialog" aria-labelledby="ModalArticulos" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <center>
                                    <h5 class="modal-title text-white text-center" id="exampleModalLabel">Ideas para utilizar un marco</h5>
                                </center>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-4 align-self-center"><img class="img-fluid" src="/assets/img/testimonial3.jpg"></div>
                                        <div class="col-md-8">
                                            <p>Con el propósito de mostrarte todo lo que puedes hacer con un marco, aquí te dejo estas ideas!
                                            </p>

                                            <p>Marcos para Fotos : El uso más común de un marco es enmarcar las fotos, pero para darle un toque diferente usa marcos de diferentes tamaños para crear una galería de marcos y se ven geniales en cualquier rincón de tu casa. Usa marcos para enmarcar fotos de pareja, de familia, de viajes, de estrellas del cine, o fotos vintage: el resultado nunca decepciona.
                                            </p>

                                            <p>Marcos para objetos: Una idea creativa por insólita que parezca es la de enmarcar objetos. Los objetos a enmarcar pueden ser muy variados, aunque generalmente se enmarcan para capturar recuerdos o colecciones. Pero hacerlo convierte al objeto en algo mágico.
                                            </p>

                                            <p>Marcos para letras o frases: Otra idea a la hora de usar marcos para decorar es utilizarlos para enmarcar letras y frases. Las letras pueden significar algo o haber sido escogidas al azar; pueden mostrarse todas juntas bajo un mismo marco o por separado; y pueden estar solas o acompañar a otros marcos con mensajes más largos. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="col-xl-4 col-md-6 mb-4 hvr-float-shadow" data-toggle="modal" data-target="#Modal_T2">
                    <div class="card border-0 shadow">
                        <img src="/assets/img/testimonial4.jpg" class="card-img-top" alt="Ideas para utilizar tu marco">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">Ideas para utilizar un marco</h5>
                            <div class="card-text text-black-50">Los marcos no sólo sirven para enmarcar fotos bonitas sino que son un elemento mucho más versátil de lo que creemos</div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="Modal_T2" tabindex="-1" role="dialog" aria-labelledby="ModalArticulos" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <center>
                                    <h5 class="modal-title text-white text-center" id="exampleModalLabel">Ideas para utilizar un marco</h5>
                                </center>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-4 align-self-center"><img class="img-fluid" src="/assets/img/testimonial4.jpg"></div>
                                        <div class="col-md-8">
                                            <p>Con el propósito de mostrarte todo lo que puedes hacer con un marco, aquí te dejo estas ideas!
                                            </p>

                                            <p>Marcos para Fotos : El uso más común de un marco es enmarcar las fotos, pero para darle un toque diferente usa marcos de diferentes tamaños para crear una galería de marcos y se ven geniales en cualquier rincón de tu casa. Usa marcos para enmarcar fotos de pareja, de familia, de viajes, de estrellas del cine, o fotos vintage: el resultado nunca decepciona.
                                            </p>

                                            <p>Marcos para objetos: Una idea creativa por insólita que parezca es la de enmarcar objetos. Los objetos a enmarcar pueden ser muy variados, aunque generalmente se enmarcan para capturar recuerdos o colecciones. Pero hacerlo convierte al objeto en algo mágico.
                                            </p>

                                            <p>Marcos para letras o frases: Otra idea a la hora de usar marcos para decorar es utilizarlos para enmarcar letras y frases. Las letras pueden significar algo o haber sido escogidas al azar; pueden mostrarse todas juntas bajo un mismo marco o por separado; y pueden estar solas o acompañar a otros marcos con mensajes más largos. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div class="col-xl-4 col-md-6 mb-4 hvr-float-shadow" data-toggle="modal" data-target="#Modal_T3">
                    <div class="card border-0 shadow">
                        <img src="/assets/img/testimonial5.jpg" class="card-img-top" alt="Como escoger tu marco">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">¿Como escoger tu marco?</h5>
                            <div class="card-text text-black-50">Aquí podrás encontrar algunos consejos para elegir el marco de acuerdo a tu foto o arte</div>

                        </div>
                    </div>
                </div>
                <div class="modal fade" id="Modal_T3" tabindex="-1" role="dialog" aria-labelledby="ModalArticulos" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <center>
                                    <h5 class="modal-title text-white text-center" id="exampleModalLabel">¿Como escoger tu marco?</h5>
                                </center>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-4 align-self-center"><img class="img-fluid" src="/assets/img/testimonial5.jpg"></div>
                                        <div class="col-md-8">
                                            <p>Existen muchas opciones de enmarcado por lo que te recomiendo lo siguiente:</p>

                                            <p>Utiliza un marco si tienes una pared grande y una foto pequeña que te gusta mucho, puedes jugar con los contrastes y elegir un marco mucho más grande que tu foto.
                                                En mi opinión, si tu foto o tu arte tiene mucho protagonismo, optaría por marcos finos y de colores sobrios como blanco, negro o madera clara.</p>

                                            <p>Marcos con o sin maría luisa, en general la maría luisa ayuda a resaltar más el cuadro.</p>

                                            <p>Optar por marcos iguales o marcos diferentes? Si quieres organizar un caos con cierto orden, utilizar marcos diferentes puede dar como resultado un conjunto muy original. Si lo contrario quieres optar por un resultado más sobrio o minimalista, opta por marcos del mismo color y ancho aunque puedan ser de distinto tamaño.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 4 
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-0 shadow">
                        <img src="/assets/img/testimonial6.jpg" class="card-img-top" alt="Marcos">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">Title</h5>
                            <div class="card-text text-black-50">Testimonial</div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 5 
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-0 shadow">
                        <img src="/assets/img/testimonial7.jpg" class="card-img-top" alt="Marcos">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">Title</h5>
                            <div class="card-text text-black-50">Testimonial</div>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 6 
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-0 shadow">
                        <img src="/assets/img/testimonial8.jpg" class="card-img-top" alt="Marcos">
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0">Title</h5>
                            <div class="card-text text-black-50">Testimonial</div>
                        </div>
                    </div>
                </div>-->
            </div>


        </div>
    </section>
    <!-- Old testimonial 
    <section class="bg-light">
        <div class="container">
            <div class="row ">
                <div class="col-md-4">
                    <div class="card mb-5">
                        <img class="card-img-top" src="/assets/img/testimonial1.jpg">
                        <div class="card-body">
                            <h5 class="card-title text-center">"Title"</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.
                            </p>
                        </div>
                    </div>
                    <div class="card mb-5">
                        <img class="card-img-top" src="/assets/img/testimonial5.jpg">
                        <div class="card-body">
                            <h5 class="card-title text-center">"Title"</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.
                            </p>
                        </div>
                    </div>
                    <div class="card mb-5">
                        <img class="card-img-top" src="/assets/img/testimonial4.jpg">
                        <div class="card-body">
                            <h5 class="card-title text-center">"Title"</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5">
                        <img class="card-img-top" src="/assets/img/testimonial2.jpg">
                        <div class="card-body">
                            <h5 class="card-title text-center">"Title"</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.
                            </p>
                        </div>
                    </div>
                    <div class="card mb-5">
                        <img class="card-img-top" src="https://images.pexels.com/photos/1893536/pexels-photo-1893536.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
                        <div class="card-body">
                            <h5 class="card-title text-center">"Title"</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.
                            </p>
                        </div>
                    </div>
                    <div class="card mb-5">
                        <img class="card-img-top" src="/assets/img/testimonial3.jpg">
                        <div class="card-body">
                            <h5 class="card-title text-center">"Title"</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5">
                        <img class="card-img-top" src="/assets/img/testimonial6.jpg">
                        <div class="card-body">
                            <h5 class="card-title text-center">"Title"</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.
                            </p>
                        </div>
                    </div>
                    <div class="card mb-5">
                        <img class="card-img-top" src="/assets/img/testimonial7.jpg">
                        <div class="card-body">
                            <h5 class="card-title text-center">"Title"</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.
                            </p>
                        </div>
                    </div>
                    <div class="card mb-5">
                        <img class="card-img-top" src="/assets/img/testimonial8.jpg">
                        <div class="card-body">
                            <h5 class="card-title text-center">"Title"</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->
    <section class="page-section mb-0">
        <div class="ha-bg-parallax text-center block-marginb-none" data-type="background" data-speed="20">
            <div class="ha-parallax-body ">

                <div class="container bg-light py-5">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 class="section-heading text-uppercase">Nuestra Promesa</h2>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-8 mx-auto text-center">
                            <p class="large text-muted">Tu felicidad es nuestra principal prioridad. Si no está 100% satisfecho con su pedido por cualquier motivo, avísenos y lo corregiremos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/scripts.html'; ?>
    <script>
        $(window).on('load', function() {
            setTimeout(function() {
                $('#subscribeModal').modal('show');
            }, 5000);
        });
        $(document).ready(function() {
            hideall(), slide1();
        });

        function hideall() {
            $('#slide1').removeClass(' text-primary');
            $('#slide2').removeClass(' text-primary');
            $('#slide3').removeClass(' text-primary');
            $('#slide1').addClass('text-warning');
            $('#slide2').addClass('text-warning');
            $('#slide3').addClass('text-warning');
        }

        function slide1() {
            $("#carouselExampleIndicators2").carousel();
            $("#carouselExampleIndicators2").carousel(0);
            hideall();
            $('#slide1').removeClass('text-warning ');
            $('#slide1').addClass('text-primary');

        }

        function slide2() {
            $("#carouselExampleIndicators2").carousel();
            $("#carouselExampleIndicators2").carousel(1);
            hideall();
            $('#slide2').removeClass('text-warning ');
            $('#slide2').addClass('text-primary');
        }

        function slide3() {
            $("#carouselExampleIndicators2").carousel();
            $("#carouselExampleIndicators2").carousel(2);
            hideall();
            $('#slide3').removeClass('text-warning ');
            $('#slide3').addClass('text-primary');
        }

    </script>
    <div class="modal fade text-center py-5 subscribeModal-lg" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="top-strip"></div>
                    <img class="img-fluid" src="/assets/img/logo.png">
                    <h3 class="pt-5 mb-0 text-secondary">Newsletter</h3>
                    <p class="pb-1 text-muted"><small>Regístrese para enterarte de nuestras últimas noticias y productos.</small></p>
                    <form id="inp_newsletter">
                        <div class="input-group mb-3 w-75 mx-auto">
                            <input type="email" class="form-control" placeholder="Email" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>
                    <p class="pb-1 text-muted"><small>
                            Su correo electrónico está seguro con nosotros. No haremos spam.</small></p>
                    <div class="bottom-strip"></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
