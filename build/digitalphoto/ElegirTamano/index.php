<!DOCTYPE html>
<html lang="en">

<head>
	<title>DiiFrame - Inicio</title>
	<meta name="description" content="">
	<?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>
</head>

<body id="page-top">
<?php require $_SERVER['DOCUMENT_ROOT'].'/assets/tools/connection.php'; ?>

	<!-- Navigation -->
	<!-- Navigation -->
	<?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/nav2.html'; ?>

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
				<h2>Elige el tamaño de impresión</h2>
				<h3 class="text-warning">Tamaño de imagen = <?php echo $nombre=$_GET['Mp'];?> MP</h3>
				<input id="mp" class="d-none" value=" <?php echo $nombre=$_GET['Mp'];?>">
			</div>
			<div class="row text-center justify-content-md-center">
				<div class="col-lg-6 col-sm-6 mb-4">
					
				</div>

				<div class="col-lg-6 col-sm-6 mb-4">
					<div class="card h-100">
						<a><img width="50%" class=""
								src="/assets/tools/imageupload/<?php echo $nombre=$_GET['Nombre'];?>" alt="build"></a>

					</div>
				</div>

			</div>
		</div>
	</section>
	<?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/footer.html'; ?>
	<script type="text/javascript" src="/assets/js/TamanoRelPixeles.js" ></script>

</body>

</html>