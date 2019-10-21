<!DOCTYPE html>
<html lang="en">

<head>
	<title>DiiFrame - Inicio</title>
	<meta name="description" content="">
	<?php require $_SERVER['DOCUMENT_ROOT'].'/assets/components/principal/head.html'; ?>


	<link rel="stylesheet" type="text/css" href="/assets/crop/cropper.css">
</head>

<body id="page-top">

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
							<a id="preview"><img class="card-img-top" id="target" src="/assets/img/upload.jpg" alt="build"></a>
							<div class="card-body container">
								<div class="custom-file mb-3">
									<input type="file" class="custom-file-input" id="imagen" value="Buscar" accept="image/*">
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
	<script src="/assets/crop/jquery-3.3.1.min.js"></script>
	<script src="/assets/crop/cropper.js"></script>
	<script type="text/javascript">
		$("#imagen").on("change", function() {
			var fileName = $(this).val().split("\\").pop();
			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});
		(function() {
			function filePreview(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function(e) {
						$('#preview').text("");
						$('#preview').append('<img id="target" class="card-img-top" src="' + e.target.result + '" alt="build">');
						$('#btn_submit').removeClass("d-none");
						$('#btn_instagram').hide();

						/////
						$(function() {
							$("#target").cropper({
								zoomable: false
							});
						});

						///////
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
			$('#imagen').change(function() {
				$('#preview').text("");
				$('#preview').append('<img class="card-img-top" src="/assets/img/loading.gif" style=""-webkit-filter: grayscale(100%);filter: grayscale(100%);  alt="build">');
				filePreview(this);
			});
		})();

		function crop() {
			$("#target").cropper("getCroppedCanvas").toBlob(function(blob) {
				var formData = new FormData();
				formData.append("croppedImage", blob);
				var medidas = $('#target').cropper('getData', true);
				var fileName = $('#imagen').val().split("\\").pop();
				var alto = medidas.height
				var ancho = medidas.width
				alert(ancho+"x"+alto+"-"+fileName);
				
				formData.append("croppedImage", blob,fileName);
				$.ajax({
					url: "/assets/tools/imageupload/upload.php",
					method: "POST",
					data: formData,
					processData: false,
					contentType: false,
					success: function(response) {
						if (response != "Image has been uploaded") {
							console.log(response);
							alert("La imagen excede el limite de 8 MB");
						}
						else{
							location.href = "/build/digitalphoto/ElegirMarco/index.php?Nombre="+fileName;
						}

					},
					error: function(xhr, status, error) {
						console.log(status, error);
					}
				});
			});
		}

	</script>
	<style>
		.cropper-crop {
			display: none;
		}

		.cropper-bg {
			background: none;
		}

	</style>
</body>

</html>
