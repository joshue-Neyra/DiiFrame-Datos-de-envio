function login() {

	var parametros = {
		"usuario": document.getElementById("inp_usuario").value,
		"contrasena": document.getElementById("inp_contrasena").value,
	}
	$.ajax({
		data: parametros,
		url: '/assets/tools/login/login.php',
		type: 'post',
		success: function (response) {
			if (response != "Usuario o contraseña incorrectos") {
				//console.log(response);
				window.history.back();
			} else {
				alert("Error! Usuario o contraseña incorrectos");
			}
		}
	});

}