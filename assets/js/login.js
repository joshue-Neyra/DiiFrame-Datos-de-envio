function login() {
	var parametros = {
		"usuario": document.getElementById("inp_usuario").value,
		"contrasena": document.getElementById("inp_contraseña").value,
		"Pedido": document.getElementById("inp_pedido").value,
	}
	$.ajax({
		data: parametros,
		url: '/assets/tools/login/login.php',
		type: 'post',
		success: function (response) {
            //alert(response);
			if (response != "Usuario o contraseña incorrectos") {
				//console.log(response);
				location.href = "/Cart/";
			} else {
				alert("Error! Usuario o contraseña incorrectos");
			}
		}
	});

}