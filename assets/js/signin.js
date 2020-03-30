function CrearCliente() {
    var d = new Date();
    var dia = d.getDate();
    var mes = d.getMonth() + 1;
    var año = d.getFullYear();
    var hora = d.getHours();
    var minuto = d.getMinutes();
    var segundos = d.getSeconds();
    if (mes.toString().length < 2) {
        mes = "0" + mes.toString();
    } else {
        mes = mes.toString();
    }
    if (dia.toString().length < 2) {
        dia = "0" + dia.toString();
    } else {
        dia = dia.toString();
    }
    var fecha = dia + "-" + mes + "-" + año.toString() + " " + hora.toString() + ":" + minuto.toString() + ":" + segundos.toString();

    var parametros = {
        "nombre": document.getElementById("inp_cli_nombre").value,
        "apellido": document.getElementById("inp_cli_apellido").value,
        "email": document.getElementById("inp_cli_email").value,
        "contrasena": document.getElementById("inp_cli_contrasena").value,
        "fecha": fecha
    }
    $.ajax({
        data: parametros,
        url: '/assets/tools/signin/crearcliente.php',
        type: 'post',
        success: function (response) {
            if (response == "Registro exitoso") {
                alert(response);
				location.href = "/Cart/";
            } else {
                alert(response);
            }
        }
    });

}
