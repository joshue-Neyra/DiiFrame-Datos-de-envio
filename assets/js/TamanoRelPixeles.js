$(document).ready(function () {
	size();
});

function size() {

	var parametros = {
		"mp": document.getElementById("mp").value,
	}

	$.ajax({
		data: parametros,
		url: '/assets/tools/tamano/RelacionPixeles.php',
		type: 'post',
		dataType: 'json',
		success: function (response) {
			console.log(response);
			var DatosJson = JSON.parse(JSON.stringify(response));
			//console.log(DatosJson.length);
			for (i = 0; i < DatosJson.length; i++) {

				t1(DatosJson[i].t1);
				t2(DatosJson[i].t2);
				t3(DatosJson[i].t3);
				t4(DatosJson[i].t4);
				t5(DatosJson[i].t5);
				t6(DatosJson[i].t6);
				t7(DatosJson[i].t7);
				t8(DatosJson[i].t8);
				t9(DatosJson[i].t9);
				t10(DatosJson[i].t10);
				console.log("Algo");
			}
		}
	});
}

function t1(x) { //funcion para tamaño 2*3 centimetros
	if (x > 0) {
		var contenido = '2x3 cm <br>';
		for (var c = 0; c < x; c++) {
			contenido = contenido + '<i class="fas fa-star"></i>';
		}
		$("#botones").append('<button class="btn btn-primary m-1">' + contenido + ' </button>')
	}
}
function t2(x) { //funcion para tamaño 3x5 centimetros
	if (x > 0) {
		var contenido = '3x5 cm <br>';
		for (var c = 0; c < x; c++) {
			contenido = contenido + '<i class="fas fa-star"></i>';
		}
		$("#botones").append('<button class="btn btn-primary m-1">' + contenido + ' </button>')
	}
}
function t3(x) { //funcion para tamaño 3x5 centimetros
	if (x > 0) {
		var contenido = '4x6 cm <br>';
		for (var c = 0; c < x; c++) {
			contenido = contenido + '<i class="fas fa-star"></i>';
		}
		$("#botones").append('<button class="btn btn-primary m-1">' + contenido + ' </button>')
	}
}
function t4(x) { //funcion para tamaño 3x5 centimetros
	if (x > 0) {
		var contenido = '5x7 cm <br>';
		for (var c = 0; c < x; c++) {
			contenido = contenido + '<i class="fas fa-star"></i>';
		}
		$("#botones").append('<button class="btn btn-primary m-1">' + contenido + ' </button>')
	}
}
function t5(x) { //funcion para tamaño 3x5 centimetros
	if (x > 0) {
		var contenido = '6x8 cm <br>';
		for (var c = 0; c < x; c++) {
			contenido = contenido + '<i class="fas fa-star"></i>';
		}
		$("#botones").append('<button class="btn btn-primary m-1">' + contenido + ' </button>')
	}
}
function t6(x) { //funcion para tamaño 3x5 centimetros
	if (x > 0) {
		var contenido = '8x10 cm <br>';
		for (var c = 0; c < x; c++) {
			contenido = contenido + '<i class="fas fa-star"></i>';
		}
		$("#botones").append('<button class="btn btn-primary m-1">' + contenido + ' </button>')
	}
}
function t7(x) { //funcion para tamaño 3x5 centimetros
	if (x > 0) {
		var contenido = '11x14 cm <br>';
		for (var c = 0; c < x; c++) {
			contenido = contenido + '<i class="fas fa-star"></i>';
		}
		$("#botones").append('<button class="btn btn-primary m-1">' + contenido + ' </button>')
	}
}
function t8(x) { //funcion para tamaño 3x5 centimetros
	if (x > 0) {
		var contenido = '13x19 cm <br>';
		for (var c = 0; c < x; c++) {
			contenido = contenido + '<i class="fas fa-star"></i>';
		}
		$("#botones").append('<button class="btn btn-primary m-1">' + contenido + ' </button>')
	}
}
function t9(x) { //funcion para tamaño 3x5 centimetros
	if (x > 0) {
		var contenido = '16x20 cm <br>';
		for (var c = 0; c < x; c++) {
			contenido = contenido + '<i class="fas fa-star"></i>';
		}
		$("#botones").append('<button class="btn btn-primary m-1">' + contenido + ' </button>')
	}
}
function t10(x) { //funcion para tamaño 3x5 centimetros
	if (x > 0) {
		var contenido = '24x36 cm <br>';
		for (var c = 0; c < x; c++) {
			contenido = contenido + '<i class="fas fa-star"></i>';
		}
		$("#botones").append('<button class="btn btn-primary m-1">' + contenido + ' </button>')
	}
}