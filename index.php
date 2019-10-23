<!DOCTYPE html>
<html lang="en">

<head>
	<title>DiiFrame - Inicio</title>
	<meta name="description" content="">
	<?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
</head>

<body id="page-top">

	<!-- Navigation -->
	<?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav.html'; ?>
	
	<div class="container-fluid">
		<div class="row no-gutter">
			<div id="carouselExampleIndicators" class="carousel slide col-lg-8" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<!-- Slide One - Set the background image for this slide in the line below -->
					<div class="carousel-item active" style="background-image: url('/assets/img/header.jpg')">
						<div class="carousel-caption d-none d-md-block">
						</div>
					</div>
					<!-- Slide Two - Set the background image for this slide in the line below -->
					<div class="carousel-item" style="background-image: url('/assets/img/header2.jpg')">
						<div class="carousel-caption d-none d-md-block">
						</div>
					</div>
					<!-- Slide Three - Set the background image for this slide in the line below -->
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
						<h1 class=" mb-4 text-uppercase font-weight-bold">Vive la vida, enmarca más!</h1>
						<h3 class="mb-5">Verdaderos marcos personalizados desde $39.</h3>
						<button class="btn btn-warning btn-lg text-white">Iniciar Enmarcado</button>

					</div>
				</div>
			</div>
		</div>
	</div>

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
							<h3 class="text-center">Seleccionar Marco</h3>
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
							<h3 class="text-center">Subir foto o envíanos tu foto o arte</h3>
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
					<div class="carousel-item active" style="background-image: url('/assets/img/2-2.jpg')">
					</div>
					<!-- Slide Two - Set the background image for this slide in the line below -->
					<div class="carousel-item" style="background-image: url('/assets/img/2-1.jpg')">
					</div>
					<!-- Slide Three - Set the background image for this slide in the line below -->
					<div class="carousel-item" style="background-image: url('/assets/img/2-3.jpg')">
					</div>
				</div>
			</div>

		</div>
	</div>



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
	
</body>

</html>
