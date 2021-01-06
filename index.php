<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ED2F2ZSZ7B"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-ED2F2ZSZ7B');
    </script>

    <title>DiiFrame - JOSHUE</title>
    <meta name="description" content="">
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
    <link href="/assets/css/hover.min.css" rel="stylesheet">
    <link href="/assets/css/newsletter.min.css" rel="stylesheet">
    <style>
        .scroll-top-wrapper {
            position: fixed;
            opacity: 0;
            visibility: hidden;
            overflow: hidden;
            text-align: center;
            z-index: 99999999;
            color: #eeeeee;
            width: 200px;
            height: 50px;

            line-height: 50px;
            right: 30px;
            bottom: 30px;

            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -ms-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
        }

        .scroll-top-wrapper.show {
            visibility: visible;
            cursor: pointer;
            opacity: 1.0;
        }

        .scroll-top-wrapper i.fa {
            line-height: inherit;
        }

        .carousel-item {
            height: 80vh;
            min-height: 350px;
            background: no-repeat center center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

    </style>
</head>

<body id="page-top">
    <input class="d-none" id="news" value="
    <?php session_start(); 
    try {
       $News=$_SESSION['News'];
        echo $News;
    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    } ?>">
    <!-- Navigation -->
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav.html'; ?>
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url('/assets/img/header.jpg')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="display-3">Un marco es el toque final perfecto</h3>
                        <p class="lead">Verdaderos Marcos personalizados</p>
                    </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('/assets/img/navidad2020/bannernavidad1.png')"></div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('/assets/img/navidad2020/bannernavidad2.png')">
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
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
    </header>

    <a  target="_blank" href="https://api.whatsapp.com/send?phone=525518467498&text=Buen%20d%C3%ADa,%20quiero%20recibir%20m%C3%A1s%20informaci%C3%B3n%20acerca%20de%20DiiFrame.com" class="scroll-top-wrapper text-decoration-none rounded-pill bg-success">
        <p class="d-inline text-white">Contactanos<span class="fa-stack">
                <i class="fa fa-circle fa-stack-2x text-white"></i>
                <i class="fab fa-whatsapp fa-stack-1x text-success fa-inverse"></i>
            </span></p>

    </a>

    <div class="container-fluid" id="howitworks">
        <div class="no-gutter">
            <div class="row ">
                <div class="col-lg-6 my-auto showcase-text">
                    <div class="row align-self-center justify-content-md-center">
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
                                <h3 class="text-center">Sube tu foto o envíanos tu arte</h3>
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
                                <h3 class="text-center">Fabricamos tu marco y lo enviamos a tu domicilio
                                </h3>

                            </div>
                        </div>
                        <div class="col-sm-2 d-flex justify-content-center">
                            <center><a href="/build/" class="text-center btn btn-primary my-5">Iniciemos</a></center>
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
                        <p class="text-black-50 mb-0">Hay algo satisfactorio en enmarcar una imagen. En dii frame es rápido, fácil y es la mejor manera de hacer que tus fotos destaquen.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">

                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>Potencial ilimitado</h4>
                        <p class="text-black-50 mb-0">Por que creemos en las opciones, ofrecemos una amplia gama de marcos para elegir. Ya sea que desees un marco clásico o moderno, contamos con diferentes modelos para que elijas con el que más se identifique tu arte.
                        </p>
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

                                            <p>Marcos para Fotos : El uso más común de un marco es enmarcar las fotos, pero para darle un toque diferente usa marcos de diferentes tamaños para crear una galería de marcos y se ven geniales en cualquier rincón de tu casa. Usa marcos para enmarcar fotos de pareja, familia, viajes, estrellas de cine o fotos vintage: el resultado nunca decepciona.
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
                            <h5 class="card-title mb-0">Ventajas de tener un cuadro en casa </h5>
                            <div class="card-text text-black-50">Los cuadros son el centro de atención cuando se entra a una habitación</div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="Modal_T2" tabindex="-1" role="dialog" aria-labelledby="ModalArticulos" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <center>
                                    <h5 class="modal-title text-white text-center" id="exampleModalLabel">Ventajas de tener un cuadro en casa</h5>
                                </center>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-4 align-self-center"><img class="img-fluid" src="/assets/img/testimonial4.jpg"></div>
                                        <div class="col-md-8">
                                            Los cuadros generan armonía en la decoración de nuestro hogar. Es por eso, que queremos que conozcas todo lo que un buen cuadro puede hacer por el ambiente de tu hogar, una de las cosas que pueden lograr son:

                                            <li>Dar color a la habitación</li>
                                            <li>Lograr sensación de amplitud de espacio</li>
                                            <li>Funciona como recurso visual de amplitud para cubrir un espacio con pequeños cuadros y lograr un efecto aleatorio</li>
                                            <li>Mantiene un estilo personal</li>

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
                            <h5 class="card-title mb-0">¿Cómo escoger tu marco?</h5>
                            <div class="card-text text-black-50">Aquí podrás encontrar algunos consejos para elegir el marco de acuerdo a tu foto o arte</div>

                        </div>
                    </div>
                </div>
                <div class="modal fade" id="Modal_T3" tabindex="-1" role="dialog" aria-labelledby="ModalArticulos" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <center>
                                    <h5 class="modal-title text-white text-center" id="exampleModalLabel">¿Cómo escoger tu marco?</h5>
                                </center>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-4 align-self-center"><img class="img-fluid" src="/assets/img/testimonial5.jpg"></div>
                                        <div class="col-md-8">
                                            <p>Existen muchas opciones de enmarcado por lo que te recomiendo lo siguiente:</p>

                                            <p>Utiliza un marco si tienes una pared grande y una foto pequeña que te guste mucho, puedes jugar con los contrastes y elegir un marco mucho más grande que tu foto. En mi opinión, si tu foto o tu arte tiene mucho protagonismo, optaría por marcos finos y de colores sobrios como blanco, negro o madera clara.
                                            </p>

                                            <p>Marcos con o sin maría luisa, en general la maría luisa ayuda a resaltar más el cuadro.</p>
                                            <p>¿Optar por marcos iguales o marcos diferentes? Si quieres organizar un caos con cierto orden, utilizar marcos diferentes puede dar como resultado un conjunto muy original. Si de lo contrario quieres optar por un resultado más sobrio o minimalista, opta por marcos del mismo color y ancho aunque puedan ser de distinto tamaño.
                                            </p>
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

    <!-- <div class="modal fade text-center py-5 subscribeModal-lg" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="top-strip"></div>
                    <img class="img-fluid" src="/assets/img/logo.png">
                    <h3 class="pt-5 mb-0 text-secondary">Newsletter</h3>
                    <p class="pb-1 text-muted"><small>Regístrese para enterarte de nuestras últimas noticias y productos.</small></p>
                    <form id="inp_newsletter">
                        <div class="input-group mb-3 w-75 mx-auto">
                            <input type="email" id="clie_news" class="form-control" placeholder="Email" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>

                    </form>
                    <p class="pb-1 text-muted"><small>
                            Su correo electrónico está seguro con nosotros. No haremos spam.</small></p>
                    <div class="bottom-strip"></div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="modal fade text-center py-5 subscribeModal-lg" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                <div class="top-strip"></div>
                    <img class="img-fluid" src="/assets/img/logo_buenfin.png" width="500" height="600">
                    <h3 class="pt-5 mb-0 text-secondary">Código promocional</h3>
                    <h1 class="pt-5 mb-0 text-secondary">Buenfin2020</h1>
                    <h3 class="pt-5 mb-0 text-secondary">Aprovecha nuestros grandes descuentos este gran fin</h3>
                    <p class="pb-1 text-muted"><large>No te los pierdas del 9 al 20 de Noviembre</large></p>
                    <form id="inp_newsletter">
                        <div class="input-group mb-3 w-75 mx-auto">
                            <input type="email" id="clie_news" class="form-control" placeholder="Email" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>

                    </form>
                    <p class="pb-1 text-muted"><small>Su correo electrónico está seguro con nosotros. No haremos spam.</small></p>
                    <div class="bottom-strip"></div>
                </div>
            </div>
        </div>
    </div>
    <?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
    <script src="/assets/js/Principal/main.js"></script>
</body>

</html>
