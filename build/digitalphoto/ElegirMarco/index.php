<!DOCTYPE html>
<html lang="en">

<head>
	<title>DiiFrame - Inicio</title>
	<meta name="description" content="">
	<?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
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
		<div class="col-sm-2 bg-dark align-self-center">
			<p class="text-white">b)</p>
		</div>
		<div class="col-sm-2 bg-dark align-self-center">
			<p class="text-white">c)</p>
		</div>
	</div>

	<section class="features" id="features">
		<div class="container">
			<div class="section-heading text-center">
				<h2>Elige una foto</h2>
			</div>
			<div class="row text-center justify-content-md-center">
				<a>
					<div class="col-lg-6 col-sm-6 mb-4">
						<div class="card h-100">
							<a id="preview"><img class="card-img-top" id="target" src="/build/digitalphoto/<?php echo $nombre=$_GET['Nombre'];?>" alt="build"></a>
							<div class="card-body container">
								<div class="custom-file mb-3">
									<input type="file" class="custom-file-input" id="imagen" value="Buscar">
									<label class="custom-file-label" for="imagen">Buscar desde Ordenador</label>
								</div>

								<button id="btn_instagram" class="btn btn-warning">Cargar imagen desde instagram</button>
							</div>
							<div class="card-footer container">
								<button id="btn_submit" data-setclass="jcrop-light" onclick="crop();" class="btn btn-warning d-none">Elegir</button>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</section>
	<?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
	
</body>

</html>
