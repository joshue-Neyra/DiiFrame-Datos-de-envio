<!DOCTYPE html>
<html lang="en">

<head>
	<title>DiiFrame - Inicio</title>
	<meta name="description" content="">
	<?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
	<style>
		//Section Vantagens

		#vantagens {
			background-color: #F9F9F9;
		}



		.lib-row {
			width: 100%;
		}

		.icon-round {
			width: 80px;
			line-height: 70px;
			text-align: center;
			padding-top: 8px;
			border-radius: 100%;
			display: inline-block;
			position: absolute;
			right: -38px;
			top: 20px;
			background-color: #2CAFFD;
		}

		.ozi-icon i {
			font-size: 28px;
			padding: 0px;
			font-weight: bold;
		}

		.card-text {
			position: initial;
		}

		.lib-panel {
			margin-bottom: 20Px;
		}

		.lib-panel img {
			width: 100%;
			background-color: transparent;
		}

		.lib-panel .row,
		.lib-panel .col-md-6 {
			margin: 0;
			padding: 0;
			background-color: #FFFFFF;
		}


		.lib-panel .lib-row {
			padding: 0 20px 0 20px;
		}

		.lib-panel .lib-row.lib-header {
			background-color: #FFFFFF;
			font-size: 20px;
			padding: 10px 20px 0 20px;
		}

		.lib-panel .lib-row.lib-header .lib-header-seperator {
			height: 2px;
			width: 26px;
			background-color: #2CAFFD;
			margin: 7px 0 7px 0;
		}

		.lib-panel .lib-row.lib-desc {
			position: relative;
			height: auto;
			display: block;
			font-size: 13px;
		}

		.lib-panel .lib-row.lib-desc a {
			position: absolute;
			width: 100%;
			bottom: 10px;
			left: 20px;
		}

		.row-margin-bottom {
			margin-bottom: 20px;
		}

		.box-shadow {
			-webkit-box-shadow: 0 0 10px 0 rgba(0, 0, 0, .10);
			box-shadow: 0 0 10px 0 rgba(0, 0, 0, .10);
		}

	</style>
</head>

<body id="page-top">

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-white  text-dark" id="mainNav">
		<div class="col-sm-4 visible-sm-block visible-md-block align-left">

			<div class="collapse navbar-collapse navbar-brand text-dark" id="navbarResponsive2">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger text-dark" href="#download">Comprar</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger text-dark" href="#howitworks">Como Funciona</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger text-dark" href="#contact">Servicios / Productos</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-sm-4 visible-sm-block visible-md-block">
			<center><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive2" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

					<i class="fas fa-bars"></i>
				</button><img src="/assets/img/logo.png" alt="Logo" style="width:200px;"><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

					<i class="fas fa-bars"></i>
				</button></center>
		</div>
		<div class="col-sm-4 visible-sm-block visible-md-block">

			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger text-warning" href="#download">
							<p><i class="far fa-user"></i></p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger text-warning" href="#download">
							<p><i class="fas fa-shopping-bag"></i></p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger text-warning" href="#features">
							<p><i class="fas fa-comment-alt "></i></p>
						</a>
					</li>
					<li class="nav-item">
						<a href="/build/"><button class="btn btn-warning text-dark">Iniciar Enmarcado</button></a>
					</li>
				</ul>
			</div>
		</div>
		<div class="container">
		</div>
	</nav>

	<div class="row container align-self-center">
		<div class="col-sm-2 bg-dark align-self-center">
			<p class="text-white">a)</p>
		</div>
	</div>

	<section class="features" id="features">
		<div class="container">
			<div class="section-heading text-center">
				<h2>¿Qué vamos a enmarcar?</h2>
				<p class="text-muted">¿No estas seguro? Revisa <a href="/#howitworks">¿Como funciona?</a></p>
				<hr>
			</div>
			<div class="row text-center">
				<a>
					<div class="col-lg-4 col-sm-6 mb-4">
						<div class="card h-100">
							<a href="/build/digitalphoto/" ><img class="card-img-top" src="/assets/img/build1.jpg" alt="build"></a>
							<div class="card-body">
								<h4 class="card-title">
									<a href="/build/digitalphoto/">Foto Digital</a>
								</h4>
								<p class="card-text">Sube tu foto o arte digital</p>
							</div>
						</div>
					</div>
				</a>
				<a>
					<div class="col-lg-4 col-sm-6 mb-4">
						<div class="card h-100">
							<a href="#"><img class="card-img-top" src="/assets/img/build2.jpg" alt="build"></a>
							<div class="card-body">
								<h4 class="card-title">
									<a href="#">Impresion / Poster</a>
								</h4>
								<p class="card-text">Impresiones artisticas, musicales o vacaciones y posters.</p>
							</div>
						</div>
					</div>
				</a>
				<a>
					<div class="col-lg-4 col-sm-6 mb-4">
						<div class="card h-100">
							<a href="#"><img class="card-img-top" src="/assets/img/build3.jpg" alt="build"></a>
							<div class="card-body">
								<h4 class="card-title">
									<a href="#">Arte Original</a>
								</h4>
								<p class="card-text">Pinturas, dibujos y pasteles en papel</p>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</section>
	<div id="vantagens">
		<div class="container ">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="row row-margin-bottom ">
						<div class="col-md-6 no-padding lib-item" data-category="view">
							<div class="lib-panel">
								<div class="row box-shadow w-100">
									<div class="col-md-6 image-row">
										<img src="/assets/img/instagram.jpg">
										<div class="icon-round bg-success-gradiant text-white display-5">
											<div class="ozi-icon">
												<i aria-hidden="true" class="fab fa-instagram"></i>
											</div>
										</div>
									</div>
									<div class="col-md-6 card-text align-self-center">
										<div class="lib-row lib-header text-left pl-5">
											<span class="blue">Instagram<br>
											</span>
											<div class="lib-header-seperator"></div>
										</div>
										<div class="lib-row lib-desc pl-5">
											Foto desde tu perfil o computadora impresa en 5x5
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 no-padding lib-item" data-category="view">
							<div class="lib-panel">
								<div class="row box-shadow w-100">
									<div class="col-md-6 image-row">
										<img src="/assets/img/foto.jpg">
										<div class="icon-round bg-success-gradiant text-white display-5">
											<div class="ozi-icon">
												<i aria-hidden="true" class="fas fa-piggy-bank" style=""></i>
											</div>
										</div>
									</div>
									<div class="col-md-6 card-text  align-self-center">
										<div class="lib-row lib-header text-left pl-5">
											<span class="blue">Fotografia (Mail)<br>
											</span>
											<div class="lib-header-seperator"></div>
										</div>
										<div class="lib-row lib-desc pl-5">
											Fotografias impresas, fotos vintage
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 no-padding lib-item" data-category="view">
							<div class="lib-panel">
								<div class="row box-shadow w-100">
									<div class="col-md-6 image-row">
										<img src="/assets/img/certificado.png">
										<div class="icon-round bg-success-gradiant text-white display-5">
											<div class="ozi-icon">
												<i aria-hidden="true" class="fas fa-piggy-bank" style=""></i>
											</div>
										</div>
									</div>
									<div class="col-md-6 card-text">
										<div class="lib-row lib-header text-left pl-5">
											<span class="blue">Certificados o Documentos<br>
											</span>
											<div class="lib-header-seperator"></div>
										</div>
										<div class="lib-row lib-desc pl-5">
											Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 no-padding lib-item" data-category="view">
							<div class="lib-panel">
								<div class="row box-shadow w-100">
									<div class="col-md-6 image-row">
										<img src="/assets/img/canva.jpg">
										<div class="icon-round bg-success-gradiant text-white display-5">
											<div class="ozi-icon">
												<i aria-hidden="true" class="fas fa-piggy-bank" style=""></i>
											</div>
										</div>
									</div>
									<div class="col-md-6 card-text">
										<div class="lib-row lib-header text-left pl-5">
											<span class="blue">Lienzo / Madera<br>
											</span>
											<div class="lib-header-seperator"></div>
										</div>
										<div class="lib-row lib-desc pl-5">
											Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 no-padding lib-item" data-category="view">
							<div class="lib-panel">
								<div class="row box-shadow w-100">
									<div class="col-md-6 image-row">
										<img src="/assets/img/textil.jpg">
										<div class="icon-round bg-success-gradiant text-white display-5">
											<div class="ozi-icon">
												<i aria-hidden="true" class="fas fa-piggy-bank" style=""></i>
											</div>
										</div>
									</div>
									<div class="col-md-6 card-text">
										<div class="lib-row lib-header text-left pl-5">
											<span class="blue">Lienzo / Madera<br>
											</span>
											<div class="lib-header-seperator"></div>
										</div>
										<div class="lib-row lib-desc pl-5">
											Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 no-padding lib-item" data-category="view">
							<div class="lib-panel">
								<div class="row box-shadow w-100">
									<div class="col-md-6 image-row">
										<img src="/assets/img/periodico.jpg">
										<div class="icon-round bg-success-gradiant text-white display-5">
											<div class="ozi-icon">
												<i aria-hidden="true" class="fas fa-piggy-bank" style=""></i>
											</div>
										</div>
									</div>
									<div class="col-md-6 card-text">
										<div class="lib-row lib-header text-left pl-5">
											<span class="blue">Periodico / Revista<br>
											</span>
											<div class="lib-header-seperator"></div>
										</div>
										<div class="lib-row lib-desc pl-5">
											Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 no-padding lib-item" data-category="view">
							<div class="lib-panel">
								<div class="row box-shadow w-100">
									<div class="col-md-6 image-row">
										<img src="/assets/img/objetos.jpg">
										<div class="icon-round bg-success-gradiant text-white display-5">
											<div class="ozi-icon">
												<i aria-hidden="true" class="fas fa-piggy-bank" style=""></i>
											</div>
										</div>
									</div>
									<div class="col-md-6 card-text">
										<div class="lib-row lib-header text-left pl-5">
											<span class="blue">Objetos<br>
											</span>
											<div class="lib-header-seperator"></div>
										</div>
										<div class="lib-row lib-desc pl-5">
											Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 no-padding lib-item" data-category="view">
							<div class="lib-panel">
								<div class="row box-shadow w-100">
									<div class="col-md-6 image-row">
										<img src="/assets/img/playera.jpg">
										<div class="icon-round bg-success-gradiant text-white display-5">
											<div class="ozi-icon">
												<i aria-hidden="true" class="fas fa-piggy-bank" style=""></i>
											</div>
										</div>
									</div>
									<div class="col-md-6 card-text">
										<div class="lib-row lib-header text-left pl-5">
											<span class="blue">Playeras / Jersey<br>
											</span>
											<div class="lib-header-seperator"></div>
										</div>
										<div class="lib-row lib-desc pl-5">
											Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 no-padding lib-item" data-category="view">
							<div class="lib-panel">
								<div class="row box-shadow w-100">
									<div class="col-md-6 image-row">
										<img src="/assets/img/otros.jpg">
										<div class="icon-round bg-success-gradiant text-white display-5">
											<div class="ozi-icon">
												<i aria-hidden="true" class="fas fa-piggy-bank" style=""></i>
											</div>
										</div>
									</div>
									<div class="col-md-6 card-text">
										<div class="lib-row lib-header text-left pl-5">
											<span class="blue">Otros<br>
											</span>
											<div class="lib-header-seperator"></div>
										</div>
										<div class="lib-row lib-desc pl-5">
											Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
	<?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/scripts.html'; ?>

</body>

</html>
